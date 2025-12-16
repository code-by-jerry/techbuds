<?php

namespace App\Http\Controllers\Admin;

use App\Events\ProjectStatusChanged;
use App\Events\TaskAssigned;
use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Client;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the projects.
     */
    public function index(Request $request)
    {
        // Check permission
        $admin = auth()->guard('admin')->user();
        if ($admin->email !== 'admin@techbuds.online' && !$admin->can('projects.list')) {
            abort(403, 'You do not have permission to view projects.');
        }

        $query = Project::with(['client', 'assignedTo']);

        // Search functionality
        if ($request->has('search') && $request->search) {
            $query->where(function($q) use ($request) {
                $q->where('title', 'like', '%' . $request->search . '%')
                  ->orWhere('description', 'like', '%' . $request->search . '%')
                  ->orWhereHas('client', function($clientQuery) use ($request) {
                      $clientQuery->where('name', 'like', '%' . $request->search . '%')
                                  ->orWhere('email', 'like', '%' . $request->search . '%');
                  });
            });
        }

        // Filter by status
        if ($request->has('status') && $request->status !== '') {
            $query->where('status', $request->status);
        }

        // Filter by client
        if ($request->has('client_id') && $request->client_id !== '') {
            $query->where('client_id', $request->client_id);
        }

        $projects = $query->orderBy('created_at', 'desc')->paginate(15);
        
        $statuses = [
            'planning',
            'ui_ux',
            'development',
            'testing',
            'deployment',
            'handover',
            'maintenance',
            'completed',
            'cancelled'
        ];

        $clients = Client::orderBy('name')->get();

        return view('admin.projects.index', compact('projects', 'statuses', 'clients'));
    }

    /**
     * Show the form for creating a new project.
     */
    public function create()
    {
        // Check permission
        $admin = auth()->guard('admin')->user();
        if ($admin->email !== 'admin@techbuds.online' && !$admin->can('projects.create')) {
            abort(403, 'You do not have permission to create projects.');
        }

        $clients = Client::orderBy('name')->get();
        $admins = Admin::where('status', true)->orderBy('name')->get();

        return view('admin.projects.create', compact('clients', 'admins'));
    }

    /**
     * Store a newly created project in storage.
     */
    public function store(Request $request)
    {
        // Check permission
        $admin = auth()->guard('admin')->user();
        if ($admin->email !== 'admin@techbuds.online' && !$admin->can('projects.create')) {
            abort(403, 'You do not have permission to create projects.');
        }

        $validated = $request->validate([
            'client_id' => 'required|exists:clients,id',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|in:planning,ui_ux,development,testing,deployment,handover,maintenance,completed,cancelled',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'budget' => 'nullable|numeric|min:0',
            'payment_status' => 'required|in:pending,partial,paid,overdue',
            'payment_structure' => 'nullable|string|max:255',
            'assigned_to' => 'nullable|exists:admins,id',
            'progress_percentage' => 'nullable|integer|min:0|max:100',
            'internal_notes' => 'nullable|string',
        ]);

        $project = Project::create($validated);

        // Log activity
        $this->logActivity($project, 'project_created', "Project '{$project->title}' created");

        return redirect()->route('admin.projects.index')
            ->with('success', 'Project created successfully.');
    }

    /**
     * Display the specified project.
     */
    public function show(Project $project)
    {
        // Check permission
        $admin = auth()->guard('admin')->user();
        if ($admin->email !== 'admin@techbuds.online' && !$admin->can('projects.list')) {
            abort(403, 'You do not have permission to view projects.');
        }

        $admins = Admin::where('status', true)->orderBy('name')->get();
        
        $project->load([
            'client',
            'assignedTo',
            'requirements' => function($query) {
                $query->orderBy('order')->orderBy('created_at');
            },
            'tasks' => function($query) {
                $query->orderBy('order')->orderBy('created_at');
            },
            'milestones' => function($query) {
                $query->orderBy('order')->orderBy('due_date');
            },
            'documents' => function($query) {
                $query->orderBy('created_at', 'desc');
            },
            'invoices' => function($query) {
                $query->orderBy('created_at', 'desc');
            },
            'projectUpdates' => function($query) {
                $query->orderBy('created_at', 'desc')->limit(10);
            },
            'teamMembers',
            'activityLogs' => function($query) {
                $query->latest()->limit(20);
            }
        ]);

        return view('admin.projects.show', compact('project', 'admins'));
    }

    /**
     * Show the form for editing the specified project.
     */
    public function edit(Project $project)
    {
        // Check permission
        $admin = auth()->guard('admin')->user();
        if ($admin->email !== 'admin@techbuds.online' && !$admin->can('projects.update')) {
            abort(403, 'You do not have permission to edit projects.');
        }

        $clients = Client::orderBy('name')->get();
        $admins = Admin::where('status', true)->orderBy('name')->get();

        return view('admin.projects.edit', compact('project', 'clients', 'admins'));
    }

    /**
     * Update the specified project in storage.
     */
    public function update(Request $request, Project $project)
    {
        // Check permission
        $admin = auth()->guard('admin')->user();
        if ($admin->email !== 'admin@techbuds.online' && !$admin->can('projects.update')) {
            abort(403, 'You do not have permission to update projects.');
        }

        $validated = $request->validate([
            'client_id' => 'required|exists:clients,id',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|in:planning,ui_ux,development,testing,deployment,handover,maintenance,completed,cancelled',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'budget' => 'nullable|numeric|min:0',
            'payment_status' => 'required|in:pending,partial,paid,overdue',
            'payment_structure' => 'nullable|string|max:255',
            'assigned_to' => 'nullable|exists:admins,id',
            'progress_percentage' => 'nullable|integer|min:0|max:100',
            'internal_notes' => 'nullable|string',
        ]);

        $project->update($validated);

        // Log activity
        $this->logActivity($project, 'project_updated', "Project '{$project->title}' updated");

        return redirect()->route('admin.projects.index')
            ->with('success', 'Project updated successfully.');
    }

    /**
     * Remove the specified project from storage.
     */
    public function destroy(Project $project)
    {
        // Check permission
        $admin = auth()->guard('admin')->user();
        if ($admin->email !== 'admin@techbuds.online' && !$admin->can('projects.delete')) {
            abort(403, 'You do not have permission to delete projects.');
        }

        $title = $project->title;
        $projectId = $project->id;
        $clientId = $project->client_id;
        $project->delete();

        // Log activity
        \App\Models\ActivityLog::create([
            'user_id' => auth()->guard('admin')->id(),
            'project_id' => $projectId,
            'client_id' => $clientId,
            'action' => 'project_deleted',
            'description' => "Project '{$title}' deleted",
            'ip_address' => request()->ip(),
            'user_agent' => request()->userAgent(),
        ]);

        return redirect()->route('admin.projects.index')
            ->with('success', 'Project deleted successfully.');
    }

    /**
     * Update project status.
     */
    public function updateStatus(Request $request, Project $project)
    {
        // Check permission
        $admin = auth()->guard('admin')->user();
        if ($admin->email !== 'admin@techbuds.online' && !$admin->can('projects.update')) {
            abort(403, 'You do not have permission to update project status.');
        }

        $validated = $request->validate([
            'status' => 'required|in:planning,ui_ux,development,testing,deployment,handover,maintenance,completed,cancelled',
        ]);

        $oldStatus = $project->status;
        $project->update(['status' => $validated['status']]);

        // Log activity
        $this->logActivity($project, 'project_status_changed', "Project status changed from " . ucfirst(str_replace('_', ' ', $oldStatus)) . " to " . ucfirst(str_replace('_', ' ', $project->status)));

        if ($oldStatus !== $project->status) {
            $project->loadMissing('client', 'teamMembers');
            event(new ProjectStatusChanged($project, $oldStatus, $project->status));
        }

        return redirect()->back()
            ->with('success', 'Project status updated successfully.');
    }

    /**
     * Update project progress.
     */
    public function updateProgress(Request $request, Project $project)
    {
        // Check permission
        $admin = auth()->guard('admin')->user();
        if ($admin->email !== 'admin@techbuds.online' && !$admin->can('projects.update')) {
            abort(403, 'You do not have permission to update project progress.');
        }

        $validated = $request->validate([
            'progress_percentage' => 'required|integer|min:0|max:100',
        ]);

        $oldProgress = $project->progress_percentage;
        $project->update(['progress_percentage' => $validated['progress_percentage']]);

        // Log activity
        $this->logActivity($project, 'project_progress_updated', "Project progress updated from {$oldProgress}% to {$project->progress_percentage}%");

        return redirect()->back()
            ->with('success', 'Project progress updated successfully.');
    }

    /**
     * Assign team members to a project.
     */
    public function assignTeam(Request $request, Project $project)
    {
        // Check permission
        $admin = auth()->guard('admin')->user();
        if ($admin->email !== 'admin@techbuds.online' && !$admin->can('projects.update')) {
            abort(403, 'You do not have permission to assign team members.');
        }

        $validated = $request->validate([
            'team_members' => 'nullable|array',
            'team_members.*.admin_id' => 'required_with:team_members|exists:admins,id',
            'team_members.*.role' => 'required_with:team_members|in:lead,developer,designer,tester,manager',
        ]);

        // Sync team members
        $teamData = [];
        if (isset($validated['team_members']) && is_array($validated['team_members'])) {
            foreach ($validated['team_members'] as $member) {
                if (isset($member['admin_id']) && isset($member['role'])) {
                    $teamData[$member['admin_id']] = ['role' => $member['role']];
                }
            }
        }
        $project->teamMembers()->sync($teamData);

        // Log activity
        $memberCount = count($teamData);
        $this->logActivity($project, 'team_assigned', "{$memberCount} team member(s) assigned to project");

        return redirect()->back()
            ->with('success', 'Team members assigned successfully.');
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
