<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProjectUpdate;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProjectUpdateController extends Controller
{
    /**
     * Display a listing of the project updates.
     */
    public function index(Project $project)
    {
        // Check permission
        $admin = auth()->guard('admin')->user();
        if ($admin->email !== 'admin@techbuds.online' && !$admin->can('project-updates.list')) {
            abort(403, 'You do not have permission to view project updates.');
        }

        $updates = $project->projectUpdates()
            ->with('createdBy')
            ->orderBy('created_at', 'desc')
            ->paginate(20);

        return view('admin.projects.communication.index', compact('project', 'updates'));
    }

    /**
     * Show the form for creating a new project update.
     */
    public function create(Project $project)
    {
        // Check permission
        $admin = auth()->guard('admin')->user();
        if ($admin->email !== 'admin@techbuds.online' && !$admin->can('project-updates.create')) {
            abort(403, 'You do not have permission to create project updates.');
        }

        return view('admin.projects.communication.create', compact('project'));
    }

    /**
     * Store a newly created project update in storage.
     */
    public function store(Request $request, Project $project)
    {
        // Check permission
        $admin = auth()->guard('admin')->user();
        if ($admin->email !== 'admin@techbuds.online' && !$admin->can('project-updates.create')) {
            abort(403, 'You do not have permission to create project updates.');
        }

        $validated = $request->validate([
            'type' => 'required|in:client_message,internal_note,change_request,meeting_note,decision',
            'message' => 'required|string',
            'is_important' => 'boolean',
            'attachments' => 'nullable|array',
            'attachments.*' => 'file|max:10240', // 10MB max per file
        ]);

        $attachments = [];
        if ($request->hasFile('attachments')) {
            foreach ($request->file('attachments') as $file) {
                $path = $file->store('project-updates', 'public');
                $attachments[] = [
                    'name' => $file->getClientOriginalName(),
                    'path' => $path,
                    'size' => $file->getSize(),
                    'mime_type' => $file->getMimeType(),
                ];
            }
        }

        $validated['project_id'] = $project->id;
        $validated['created_by'] = $admin->id;
        $validated['attachments'] = $attachments;
        $validated['is_important'] = $request->has('is_important');

        $update = ProjectUpdate::create($validated);

        // Log activity
        $this->logActivity($project, 'project_update_created', "Project update ({$update->type}) created");

        return redirect()->route('admin.projects.show', $project)
            ->with('success', 'Project update created successfully.');
    }

    /**
     * Display the specified project update.
     */
    public function show(ProjectUpdate $projectUpdate)
    {
        // Check permission
        $admin = auth()->guard('admin')->user();
        if ($admin->email !== 'admin@techbuds.online' && !$admin->can('project-updates.list')) {
            abort(403, 'You do not have permission to view project updates.');
        }

        $projectUpdate->load('createdBy', 'project');
        $project = $projectUpdate->project;

        return view('admin.projects.communication.show', compact('project', 'projectUpdate'));
    }

    /**
     * Show the form for editing the specified project update.
     */
    public function edit(ProjectUpdate $projectUpdate)
    {
        // Check permission
        $admin = auth()->guard('admin')->user();
        if ($admin->email !== 'admin@techbuds.online' && !$admin->can('project-updates.update')) {
            abort(403, 'You do not have permission to edit project updates.');
        }

        $projectUpdate->load('project');
        $project = $projectUpdate->project;

        return view('admin.projects.communication.edit', compact('project', 'projectUpdate'));
    }

    /**
     * Update the specified project update in storage.
     */
    public function update(Request $request, ProjectUpdate $projectUpdate)
    {
        // Check permission
        $admin = auth()->guard('admin')->user();
        if ($admin->email !== 'admin@techbuds.online' && !$admin->can('project-updates.update')) {
            abort(403, 'You do not have permission to update project updates.');
        }

        $validated = $request->validate([
            'type' => 'required|in:client_message,internal_note,change_request,meeting_note,decision',
            'message' => 'required|string',
            'is_important' => 'boolean',
        ]);

        $projectUpdate->load('project');
        $project = $projectUpdate->project;
        $validated['is_important'] = $request->has('is_important');

        $projectUpdate->update($validated);

        // Log activity
        $this->logActivity($project, 'project_update_updated', "Project update updated");

        return redirect()->route('admin.projects.show', $project)
            ->with('success', 'Project update updated successfully.');
    }

    /**
     * Remove the specified project update from storage.
     */
    public function destroy(ProjectUpdate $projectUpdate)
    {
        // Check permission
        $admin = auth()->guard('admin')->user();
        if ($admin->email !== 'admin@techbuds.online' && !$admin->can('project-updates.delete')) {
            abort(403, 'You do not have permission to delete project updates.');
        }

        $projectUpdate->load('project');
        $project = $projectUpdate->project;

        // Delete attachments
        if ($projectUpdate->attachments) {
            foreach ($projectUpdate->attachments as $attachment) {
                if (isset($attachment['path'])) {
                    Storage::disk('public')->delete($attachment['path']);
                }
            }
        }

        $projectUpdate->delete();

        // Log activity
        $this->logActivity($project, 'project_update_deleted', "Project update deleted");

        return redirect()->route('admin.projects.show', $project)
            ->with('success', 'Project update deleted successfully.');
    }

    /**
     * Download an attachment.
     */
    public function downloadAttachment(ProjectUpdate $projectUpdate, $attachmentIndex)
    {
        // Check permission
        $admin = auth()->guard('admin')->user();
        if ($admin->email !== 'admin@techbuds.online' && !$admin->can('project-updates.list')) {
            abort(403, 'You do not have permission to download attachments.');
        }

        $attachments = $projectUpdate->attachments ?? [];
        if (!isset($attachments[$attachmentIndex])) {
            abort(404, 'Attachment not found.');
        }

        $attachment = $attachments[$attachmentIndex];
        $path = $attachment['path'] ?? null;

        if (!$path || !Storage::disk('public')->exists($path)) {
            abort(404, 'File not found.');
        }

        return Storage::disk('public')->download($path, $attachment['name'] ?? 'attachment');
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
