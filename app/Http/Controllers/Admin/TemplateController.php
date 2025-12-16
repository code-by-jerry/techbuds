<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Template;
use App\Models\TemplateCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TemplateController extends Controller
{
    public function index(Request $request)
    {
        $admin = auth()->guard('admin')->user();
        if ($admin->email !== 'admin@techbuds.online' && !$admin->can('templates.list')) {
            abort(403, 'You do not have permission to view templates.');
        }

        $query = Template::with('category');

        if ($request->filled('category')) {
            $query->where('template_category_id', $request->category);
        }

        if ($request->filled('search')) {
            $query->where('title', 'like', '%' . $request->search . '%');
        }

        $templates = $query->orderBy('created_at', 'desc')->paginate(15);
        $categories = TemplateCategory::orderBy('name')->get();

        return view('admin.templates.index', compact('templates', 'categories'));
    }

    public function create()
    {
        $admin = auth()->guard('admin')->user();
        if ($admin->email !== 'admin@techbuds.online' && !$admin->can('templates.create')) {
            abort(403, 'You do not have permission to create templates.');
        }

        $categories = TemplateCategory::where('is_active', true)->orderBy('name')->get();
        return view('admin.templates.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $admin = auth()->guard('admin')->user();
        if ($admin->email !== 'admin@techbuds.online' && !$admin->can('templates.create')) {
            abort(403, 'You do not have permission to create templates.');
        }

        $validated = $request->validate([
            'template_category_id' => ['required', 'exists:template_categories,id'],
            'title' => ['required', 'string', 'max:255'],
            'type' => ['required', 'in:document,image,link,other'],
            'description' => ['nullable', 'string'],
            'file' => ['nullable', 'file', 'max:10240'],
            'external_url' => ['nullable', 'url', 'max:255'],
            'is_active' => ['required', 'boolean'],
        ]);

        $filePath = null;
        if ($request->hasFile('file')) {
            $filePath = $request->file('file')->store('templates', 'public');
        }

        Template::create([
            'template_category_id' => $validated['template_category_id'],
            'title' => $validated['title'],
            'type' => $validated['type'],
            'description' => $validated['description'],
            'file_path' => $filePath,
            'external_url' => $validated['external_url'],
            'is_active' => $validated['is_active'],
            'created_by' => $admin->id,
        ]);

        return redirect()->route('admin.templates.index')
            ->with('success', 'Template created successfully.');
    }

    public function edit(Template $template)
    {
        $admin = auth()->guard('admin')->user();
        if ($admin->email !== 'admin@techbuds.online' && !$admin->can('templates.update')) {
            abort(403, 'You do not have permission to edit templates.');
        }

        $categories = TemplateCategory::where('is_active', true)->orderBy('name')->get();
        return view('admin.templates.edit', compact('template', 'categories'));
    }

    public function update(Request $request, Template $template)
    {
        $admin = auth()->guard('admin')->user();
        if ($admin->email !== 'admin@techbuds.online' && !$admin->can('templates.update')) {
            abort(403, 'You do not have permission to update templates.');
        }

        $validated = $request->validate([
            'template_category_id' => ['required', 'exists:template_categories,id'],
            'title' => ['required', 'string', 'max:255'],
            'type' => ['required', 'in:document,image,link,other'],
            'description' => ['nullable', 'string'],
            'file' => ['nullable', 'file', 'max:10240'],
            'external_url' => ['nullable', 'url', 'max:255'],
            'is_active' => ['required', 'boolean'],
        ]);

        if ($request->hasFile('file')) {
            if ($template->file_path && Storage::disk('public')->exists($template->file_path)) {
                Storage::disk('public')->delete($template->file_path);
            }
            $template->file_path = $request->file('file')->store('templates', 'public');
        }

        $template->update([
            'template_category_id' => $validated['template_category_id'],
            'title' => $validated['title'],
            'type' => $validated['type'],
            'description' => $validated['description'],
            'external_url' => $validated['external_url'],
            'is_active' => $validated['is_active'],
        ]);

        return redirect()->route('admin.templates.index')
            ->with('success', 'Template updated successfully.');
    }

    public function destroy(Template $template)
    {
        $admin = auth()->guard('admin')->user();
        if ($admin->email !== 'admin@techbuds.online' && !$admin->can('templates.delete')) {
            abort(403, 'You do not have permission to delete templates.');
        }

        if ($template->file_path && Storage::disk('public')->exists($template->file_path)) {
            Storage::disk('public')->delete($template->file_path);
        }

        $template->delete();

        return redirect()->route('admin.templates.index')
            ->with('success', 'Template deleted successfully.');
    }

    public function download(Template $template)
    {
        $admin = auth()->guard('admin')->user();
        if ($admin->email !== 'admin@techbuds.online' && !$admin->can('templates.list')) {
            abort(403, 'You do not have permission to download templates.');
        }

        if (!$template->file_path || !Storage::disk('public')->exists($template->file_path)) {
            abort(404);
        }

        return Storage::disk('public')->download($template->file_path, $template->title);
    }
}

