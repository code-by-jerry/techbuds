<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Document;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DocumentController extends Controller
{
    /**
     * Display a listing of the documents for a project.
     */
    public function index(Project $project)
    {
        // Check permission
        $admin = auth()->guard('admin')->user();
        if ($admin->email !== 'admin@techbuds.online' && !$admin->can('documents.list')) {
            abort(403, 'You do not have permission to view documents.');
        }

        $documents = $project->documents()
            ->with('uploadedBy')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('admin.projects.documents.index', compact('project', 'documents'));
    }

    /**
     * Show the form for creating a new document.
     */
    public function create(Project $project)
    {
        // Check permission
        $admin = auth()->guard('admin')->user();
        if ($admin->email !== 'admin@techbuds.online' && !$admin->can('documents.create')) {
            abort(403, 'You do not have permission to create documents.');
        }

        return view('admin.projects.documents.create', compact('project'));
    }

    /**
     * Store a newly created document in storage.
     */
    public function store(Request $request, Project $project)
    {
        // Check permission
        $admin = auth()->guard('admin')->user();
        if ($admin->email !== 'admin@techbuds.online' && !$admin->can('documents.create')) {
            abort(403, 'You do not have permission to create documents.');
        }

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|in:nda,proposal,quote,invoice,contract,final_delivery,offboarding,other',
            'description' => 'nullable|string',
            'file' => 'required|file|max:10240', // 10MB max
        ]);

        $file = $request->file('file');
        $fileName = $file->getClientOriginalName();
        $fileSize = $file->getSize();
        $mimeType = $file->getMimeType();
        
        // Store file in public disk
        $filePath = $file->store('documents', 'public');

        $document = Document::create([
            'project_id' => $project->id,
            'name' => $validated['name'],
            'category' => $validated['category'],
            'description' => $validated['description'] ?? null,
            'file_path' => $filePath,
            'file_name' => $fileName,
            'file_size' => $this->formatFileSize($fileSize),
            'mime_type' => $mimeType,
            'uploaded_by' => $admin->id,
        ]);

        // Log activity
        $this->logActivity($project, 'document_uploaded', "Document '{$document->name}' uploaded");

        return redirect()->route('admin.projects.show', $project)
            ->with('success', 'Document uploaded successfully.');
    }

    /**
     * Display the specified document.
     */
    public function show(Document $document)
    {
        // Check permission
        $admin = auth()->guard('admin')->user();
        if ($admin->email !== 'admin@techbuds.online' && !$admin->can('documents.list')) {
            abort(403, 'You do not have permission to view documents.');
        }

        $document->load(['uploadedBy', 'project']);
        $project = $document->project;

        return view('admin.projects.documents.show', compact('project', 'document'));
    }

    /**
     * Show the form for editing the specified document.
     */
    public function edit(Document $document)
    {
        // Check permission
        $admin = auth()->guard('admin')->user();
        if ($admin->email !== 'admin@techbuds.online' && !$admin->can('documents.update')) {
            abort(403, 'You do not have permission to edit documents.');
        }

        $document->load('project');
        $project = $document->project;

        return view('admin.projects.documents.edit', compact('project', 'document'));
    }

    /**
     * Update the specified document in storage.
     */
    public function update(Request $request, Document $document)
    {
        // Check permission
        $admin = auth()->guard('admin')->user();
        if ($admin->email !== 'admin@techbuds.online' && !$admin->can('documents.update')) {
            abort(403, 'You do not have permission to update documents.');
        }

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|in:nda,proposal,quote,invoice,contract,final_delivery,offboarding,other',
            'description' => 'nullable|string',
        ]);

        $document->load('project');
        $project = $document->project;
        $document->update($validated);

        // Log activity
        $this->logActivity($project, 'document_updated', "Document '{$document->name}' updated");

        return redirect()->route('admin.projects.show', $project)
            ->with('success', 'Document updated successfully.');
    }

    /**
     * Remove the specified document from storage.
     */
    public function destroy(Document $document)
    {
        // Check permission
        $admin = auth()->guard('admin')->user();
        if ($admin->email !== 'admin@techbuds.online' && !$admin->can('documents.delete')) {
            abort(403, 'You do not have permission to delete documents.');
        }

        $document->load('project');
        $project = $document->project;
        $name = $document->name;
        $filePath = $document->file_path;

        // Delete file from storage
        if ($filePath && Storage::disk('public')->exists($filePath)) {
            Storage::disk('public')->delete($filePath);
        }

        $document->delete();

        // Log activity
        $this->logActivity($project, 'document_deleted', "Document '{$name}' deleted");

        return redirect()->route('admin.projects.show', $project)
            ->with('success', 'Document deleted successfully.');
    }

    /**
     * Download the document file.
     */
    public function download(Document $document)
    {
        // Check permission
        $admin = auth()->guard('admin')->user();
        if ($admin->email !== 'admin@techbuds.online' && !$admin->can('documents.list')) {
            abort(403, 'You do not have permission to download documents.');
        }

        $filePath = $document->file_path;

        if (!$filePath || !Storage::disk('public')->exists($filePath)) {
            abort(404, 'File not found.');
        }

        return Storage::disk('public')->download($filePath, $document->file_name);
    }

    /**
     * Format file size to human readable format.
     */
    private function formatFileSize($bytes)
    {
        if ($bytes >= 1073741824) {
            return number_format($bytes / 1073741824, 2) . ' GB';
        } elseif ($bytes >= 1048576) {
            return number_format($bytes / 1048576, 2) . ' MB';
        } elseif ($bytes >= 1024) {
            return number_format($bytes / 1024, 2) . ' KB';
        } else {
            return $bytes . ' bytes';
        }
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
