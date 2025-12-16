<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Milestone;
use App\Models\Project;
use Illuminate\Http\Request;

class MilestoneController extends Controller
{
    /**
     * Display a listing of the milestones for a project.
     */
    public function index(Project $project)
    {
        // Check permission
        $admin = auth()->guard('admin')->user();
        if ($admin->email !== 'admin@techbuds.online' && !$admin->can('milestones.list')) {
            abort(403, 'You do not have permission to view milestones.');
        }

        $milestones = $project->milestones()
            ->with('tasks')
            ->orderBy('order')
            ->orderBy('due_date')
            ->get();

        return view('admin.projects.milestones.index', compact('project', 'milestones'));
    }

    /**
     * Show the form for creating a new milestone.
     */
    public function create(Project $project)
    {
        // Check permission
        $admin = auth()->guard('admin')->user();
        if ($admin->email !== 'admin@techbuds.online' && !$admin->can('milestones.create')) {
            abort(403, 'You do not have permission to create milestones.');
        }

        $maxOrder = $project->milestones()->max('order') ?? 0;

        return view('admin.projects.milestones.create', compact('project', 'maxOrder'));
    }

    /**
     * Store a newly created milestone in storage.
     */
    public function store(Request $request, Project $project)
    {
        // Check permission
        $admin = auth()->guard('admin')->user();
        if ($admin->email !== 'admin@techbuds.online' && !$admin->can('milestones.create')) {
            abort(403, 'You do not have permission to create milestones.');
        }

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'due_date' => 'nullable|date',
            'status' => 'required|in:pending,in_progress,completed,overdue,cancelled',
            'progress_percentage' => 'nullable|integer|min:0|max:100',
            'order' => 'nullable|integer|min:0',
        ]);

        $validated['project_id'] = $project->id;
        if (!isset($validated['order'])) {
            $validated['order'] = ($project->milestones()->max('order') ?? 0) + 1;
        }

        $milestone = Milestone::create($validated);

        // Log activity
        $this->logActivity($project, 'milestone_created', "Milestone '{$milestone->title}' created");

        return redirect()->route('admin.projects.show', $project)
            ->with('success', 'Milestone created successfully.');
    }

    /**
     * Display the specified milestone.
     */
    public function show(Milestone $milestone)
    {
        // Check permission
        $admin = auth()->guard('admin')->user();
        if ($admin->email !== 'admin@techbuds.online' && !$admin->can('milestones.list')) {
            abort(403, 'You do not have permission to view milestones.');
        }

        $milestone->load(['tasks.assignedTo', 'project']);
        $project = $milestone->project;

        return view('admin.projects.milestones.show', compact('project', 'milestone'));
    }

    /**
     * Show the form for editing the specified milestone.
     */
    public function edit(Milestone $milestone)
    {
        // Check permission
        $admin = auth()->guard('admin')->user();
        if ($admin->email !== 'admin@techbuds.online' && !$admin->can('milestones.update')) {
            abort(403, 'You do not have permission to edit milestones.');
        }

        $milestone->load('project');
        $project = $milestone->project;

        return view('admin.projects.milestones.edit', compact('project', 'milestone'));
    }

    /**
     * Update the specified milestone in storage.
     */
    public function update(Request $request, Milestone $milestone)
    {
        // Check permission
        $admin = auth()->guard('admin')->user();
        if ($admin->email !== 'admin@techbuds.online' && !$admin->can('milestones.update')) {
            abort(403, 'You do not have permission to update milestones.');
        }

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'due_date' => 'nullable|date',
            'status' => 'required|in:pending,in_progress,completed,overdue,cancelled',
            'progress_percentage' => 'nullable|integer|min:0|max:100',
            'order' => 'nullable|integer|min:0',
        ]);

        $milestone->load('project');
        $project = $milestone->project;
        $oldStatus = $milestone->status;
        $milestone->update($validated);

        // Auto-update completed_date based on status
        if ($milestone->status === 'completed' && !$milestone->completed_date) {
            $milestone->update(['completed_date' => now()]);
        } elseif ($milestone->status !== 'completed' && $milestone->completed_date) {
            $milestone->update(['completed_date' => null]);
        }

        // Log activity if status changed
        if ($oldStatus !== $milestone->status) {
            $this->logActivity($project, 'milestone_status_changed', "Milestone '{$milestone->title}' status changed from " . ucfirst(str_replace('_', ' ', $oldStatus)) . " to " . ucfirst(str_replace('_', ' ', $milestone->status)));
        } else {
            $this->logActivity($project, 'milestone_updated', "Milestone '{$milestone->title}' updated");
        }

        return redirect()->route('admin.projects.show', $project)
            ->with('success', 'Milestone updated successfully.');
    }

    /**
     * Remove the specified milestone from storage.
     */
    public function destroy(Milestone $milestone)
    {
        // Check permission
        $admin = auth()->guard('admin')->user();
        if ($admin->email !== 'admin@techbuds.online' && !$admin->can('milestones.delete')) {
            abort(403, 'You do not have permission to delete milestones.');
        }

        $milestone->load('project');
        $project = $milestone->project;
        $title = $milestone->title;
        $milestone->delete();

        // Log activity
        $this->logActivity($project, 'milestone_deleted', "Milestone '{$title}' deleted");

        return redirect()->route('admin.projects.show', $project)
            ->with('success', 'Milestone deleted successfully.');
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
