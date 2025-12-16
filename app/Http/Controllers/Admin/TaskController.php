<?php

namespace App\Http\Controllers\Admin;

use App\Events\TaskAssigned;
use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Milestone;
use App\Models\Project;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the tasks for a project.
     */
    public function index(Project $project)
    {
        // Check permission
        $admin = auth()->guard('admin')->user();
        if ($admin->email !== 'admin@techbuds.online' && !$admin->can('tasks.list')) {
            abort(403, 'You do not have permission to view tasks.');
        }

        $tasks = $project->tasks()
            ->with(['assignedTo', 'milestone'])
            ->orderBy('order')
            ->orderBy('created_at')
            ->get();

        return view('admin.projects.tasks.index', compact('project', 'tasks'));
    }

    /**
     * Show the form for creating a new task.
     */
    public function create(Project $project)
    {
        // Check permission
        $admin = auth()->guard('admin')->user();
        if ($admin->email !== 'admin@techbuds.online' && !$admin->can('tasks.create')) {
            abort(403, 'You do not have permission to create tasks.');
        }

        $admins = Admin::where('status', true)->orderBy('name')->get();
        $milestones = $project->milestones()->orderBy('order')->get();
        $maxOrder = $project->tasks()->max('order') ?? 0;

        return view('admin.projects.tasks.create', compact('project', 'admins', 'milestones', 'maxOrder'));
    }

    /**
     * Store a newly created task in storage.
     */
    public function store(Request $request, Project $project)
    {
        // Check permission
        $admin = auth()->guard('admin')->user();
        if ($admin->email !== 'admin@techbuds.online' && !$admin->can('tasks.create')) {
            abort(403, 'You do not have permission to create tasks.');
        }

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|in:todo,in_progress,review,completed,blocked,overdue',
            'assigned_to' => 'nullable|exists:admins,id',
            'due_date' => 'nullable|date',
            'priority' => 'required|integer|min:0|max:3',
            'progress_percentage' => 'nullable|integer|min:0|max:100',
            'internal_comments' => 'nullable|string',
            'milestone_id' => 'nullable|exists:milestones,id',
            'order' => 'nullable|integer|min:0',
        ]);

        $validated['project_id'] = $project->id;
        if (!isset($validated['order'])) {
            $validated['order'] = ($project->tasks()->max('order') ?? 0) + 1;
        }

        $task = Task::create($validated);

        // Log activity
        $this->logActivity($project, 'task_created', "Task '{$task->title}' created");

        if ($task->assigned_to) {
            $assignee = Admin::find($task->assigned_to);
            if ($assignee) {
                $task->loadMissing('project');
                event(new TaskAssigned($task, $assignee));
            }
        }

        return redirect()->route('admin.projects.show', $project)
            ->with('success', 'Task created successfully.');
    }

    /**
     * Display the specified task.
     */
    public function show(Task $task)
    {
        // Check permission
        $admin = auth()->guard('admin')->user();
        if ($admin->email !== 'admin@techbuds.online' && !$admin->can('tasks.list')) {
            abort(403, 'You do not have permission to view tasks.');
        }

        $task->load(['assignedTo', 'milestone', 'project']);
        $project = $task->project;

        return view('admin.projects.tasks.show', compact('project', 'task'));
    }

    /**
     * Show the form for editing the specified task.
     */
    public function edit(Task $task)
    {
        // Check permission
        $admin = auth()->guard('admin')->user();
        if ($admin->email !== 'admin@techbuds.online' && !$admin->can('tasks.update')) {
            abort(403, 'You do not have permission to edit tasks.');
        }

        $task->load('project');
        $project = $task->project;
        $admins = Admin::where('status', true)->orderBy('name')->get();
        $milestones = $project->milestones()->orderBy('order')->get();

        return view('admin.projects.tasks.edit', compact('project', 'task', 'admins', 'milestones'));
    }

    /**
     * Update the specified task in storage.
     */
    public function update(Request $request, Task $task)
    {
        // Check permission
        $admin = auth()->guard('admin')->user();
        if ($admin->email !== 'admin@techbuds.online' && !$admin->can('tasks.update')) {
            abort(403, 'You do not have permission to update tasks.');
        }

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|in:todo,in_progress,review,completed,blocked,overdue',
            'assigned_to' => 'nullable|exists:admins,id',
            'due_date' => 'nullable|date',
            'priority' => 'required|integer|min:0|max:3',
            'progress_percentage' => 'nullable|integer|min:0|max:100',
            'internal_comments' => 'nullable|string',
            'milestone_id' => 'nullable|exists:milestones,id',
            'order' => 'nullable|integer|min:0',
        ]);

        $task->load('project');
        $project = $task->project;
        $oldStatus = $task->status;
        $oldAssignee = $task->assigned_to;
        $task->update($validated);

        // Log activity if status changed
        if ($oldStatus !== $task->status) {
            $this->logActivity($project, 'task_status_changed', "Task '{$task->title}' status changed from " . ucfirst(str_replace('_', ' ', $oldStatus)) . " to " . ucfirst(str_replace('_', ' ', $task->status)));
        } else {
            $this->logActivity($project, 'task_updated', "Task '{$task->title}' updated");
        }

        if ($task->assigned_to && $task->assigned_to !== $oldAssignee) {
            $assignee = Admin::find($task->assigned_to);
            if ($assignee) {
                $task->loadMissing('project');
                event(new TaskAssigned($task, $assignee, true));
            }
        }

        return redirect()->route('admin.projects.show', $project)
            ->with('success', 'Task updated successfully.');
    }

    /**
     * Remove the specified task from storage.
     */
    public function destroy(Task $task)
    {
        // Check permission
        $admin = auth()->guard('admin')->user();
        if ($admin->email !== 'admin@techbuds.online' && !$admin->can('tasks.delete')) {
            abort(403, 'You do not have permission to delete tasks.');
        }

        $task->load('project');
        $project = $task->project;
        $title = $task->title;
        $task->delete();

        // Log activity
        $this->logActivity($project, 'task_deleted', "Task '{$title}' deleted");

        return redirect()->route('admin.projects.show', $project)
            ->with('success', 'Task deleted successfully.');
    }

    /**
     * Log activity for the project.
     */
    private function logActivity(Project $project, string $action, string $description)
    {
        \App\Models\ActivityLog::create([
            'user_id' => auth()->guard('admin')->id(),
            'project_id' => $project->id,
            'client_id' => $project->client_id,
            'action' => $action,
            'description' => $description,
            'ip_address' => request()->ip(),
            'user_agent' => request()->userAgent(),
        ]);
    }
}
