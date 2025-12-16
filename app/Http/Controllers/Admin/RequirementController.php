<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Requirement;
use App\Models\Project;
use App\Models\Admin;
use Illuminate\Http\Request;

class RequirementController extends Controller
{
    /**
     * Display a listing of the requirements for a project.
     */
    public function index(Project $project)
    {
        // Check permission
        $admin = auth()->guard('admin')->user();
        if ($admin->email !== 'admin@techbuds.online' && !$admin->can('requirements.list')) {
            abort(403, 'You do not have permission to view requirements.');
        }

        $requirements = $project->requirements()
            ->with('assignedTo')
            ->orderBy('order')
            ->orderBy('created_at')
            ->get();

        return view('admin.projects.requirements.index', compact('project', 'requirements'));
    }

    /**
     * Show the form for creating a new requirement.
     */
    public function create(Project $project)
    {
        // Check permission
        $admin = auth()->guard('admin')->user();
        if ($admin->email !== 'admin@techbuds.online' && !$admin->can('requirements.create')) {
            abort(403, 'You do not have permission to create requirements.');
        }

        $admins = Admin::where('status', true)->orderBy('name')->get();
        $maxOrder = $project->requirements()->max('order') ?? 0;

        return view('admin.projects.requirements.create', compact('project', 'admins', 'maxOrder'));
    }

    /**
     * Store a newly created requirement in storage.
     */
    public function store(Request $request, Project $project)
    {
        // Check permission
        $admin = auth()->guard('admin')->user();
        if ($admin->email !== 'admin@techbuds.online' && !$admin->can('requirements.create')) {
            abort(403, 'You do not have permission to create requirements.');
        }

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'priority' => 'required|in:low,medium,high,critical',
            'status' => 'required|in:pending,in_progress,completed,on_hold,cancelled',
            'estimated_hours' => 'nullable|integer|min:0',
            'actual_hours' => 'nullable|integer|min:0',
            'notes' => 'nullable|string',
            'assigned_to' => 'nullable|exists:admins,id',
            'due_date' => 'nullable|date',
            'order' => 'nullable|integer|min:0',
        ]);

        $validated['project_id'] = $project->id;
        if (!isset($validated['order'])) {
            $validated['order'] = ($project->requirements()->max('order') ?? 0) + 1;
        }

        $requirement = Requirement::create($validated);

        // Log activity
        $this->logActivity($project, 'requirement_created', "Requirement '{$requirement->title}' created");

        return redirect()->route('admin.projects.show', $project)
            ->with('success', 'Requirement created successfully.');
    }

    /**
     * Display the specified requirement.
     */
    public function show(Requirement $requirement)
    {
        // Check permission
        $admin = auth()->guard('admin')->user();
        if ($admin->email !== 'admin@techbuds.online' && !$admin->can('requirements.list')) {
            abort(403, 'You do not have permission to view requirements.');
        }

        $requirement->load('assignedTo', 'project');
        $project = $requirement->project;

        return view('admin.projects.requirements.show', compact('project', 'requirement'));
    }

    /**
     * Show the form for editing the specified requirement.
     */
    public function edit(Requirement $requirement)
    {
        // Check permission
        $admin = auth()->guard('admin')->user();
        if ($admin->email !== 'admin@techbuds.online' && !$admin->can('requirements.update')) {
            abort(403, 'You do not have permission to edit requirements.');
        }

        $requirement->load('project');
        $project = $requirement->project;
        $admins = Admin::where('status', true)->orderBy('name')->get();

        return view('admin.projects.requirements.edit', compact('project', 'requirement', 'admins'));
    }

    /**
     * Update the specified requirement in storage.
     */
    public function update(Request $request, Requirement $requirement)
    {
        // Check permission
        $admin = auth()->guard('admin')->user();
        if ($admin->email !== 'admin@techbuds.online' && !$admin->can('requirements.update')) {
            abort(403, 'You do not have permission to update requirements.');
        }

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'priority' => 'required|in:low,medium,high,critical',
            'status' => 'required|in:pending,in_progress,completed,on_hold,cancelled',
            'estimated_hours' => 'nullable|integer|min:0',
            'actual_hours' => 'nullable|integer|min:0',
            'notes' => 'nullable|string',
            'assigned_to' => 'nullable|exists:admins,id',
            'due_date' => 'nullable|date',
            'order' => 'nullable|integer|min:0',
        ]);

        $requirement->load('project');
        $project = $requirement->project;
        $oldStatus = $requirement->status;
        $requirement->update($validated);

        // Log activity if status changed
        if ($oldStatus !== $requirement->status) {
            $this->logActivity($project, 'requirement_status_changed', "Requirement '{$requirement->title}' status changed from " . ucfirst(str_replace('_', ' ', $oldStatus)) . " to " . ucfirst(str_replace('_', ' ', $requirement->status)));
        } else {
            $this->logActivity($project, 'requirement_updated', "Requirement '{$requirement->title}' updated");
        }

        return redirect()->route('admin.projects.show', $project)
            ->with('success', 'Requirement updated successfully.');
    }

    /**
     * Remove the specified requirement from storage.
     */
    public function destroy(Requirement $requirement)
    {
        // Check permission
        $admin = auth()->guard('admin')->user();
        if ($admin->email !== 'admin@techbuds.online' && !$admin->can('requirements.delete')) {
            abort(403, 'You do not have permission to delete requirements.');
        }

        $requirement->load('project');
        $project = $requirement->project;
        $title = $requirement->title;
        $requirement->delete();

        // Log activity
        $this->logActivity($project, 'requirement_deleted', "Requirement '{$title}' deleted");

        return redirect()->route('admin.projects.show', $project)
            ->with('success', 'Requirement deleted successfully.');
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
