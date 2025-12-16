<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TemplateCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TemplateCategoryController extends Controller
{
    public function index()
    {
        $admin = auth()->guard('admin')->user();
        if ($admin->email !== 'admin@techbuds.online' && !$admin->can('template-categories.list')) {
            abort(403, 'You do not have permission to view template categories.');
        }

        $categories = TemplateCategory::orderBy('name')->paginate(15);
        return view('admin.templates.categories.index', compact('categories'));
    }

    public function create()
    {
        $admin = auth()->guard('admin')->user();
        if ($admin->email !== 'admin@techbuds.online' && !$admin->can('template-categories.create')) {
            abort(403, 'You do not have permission to create categories.');
        }

        return view('admin.templates.categories.create');
    }

    public function store(Request $request)
    {
        $admin = auth()->guard('admin')->user();
        if ($admin->email !== 'admin@techbuds.online' && !$admin->can('template-categories.create')) {
            abort(403, 'You do not have permission to create categories.');
        }

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255', 'unique:template_categories,name'],
            'description' => ['nullable', 'string', 'max:500'],
            'is_active' => ['required', 'boolean'],
        ]);

        TemplateCategory::create([
            'name' => $validated['name'],
            'slug' => Str::slug($validated['name']),
            'description' => $validated['description'],
            'is_active' => $validated['is_active'],
            'created_by' => $admin->id,
        ]);

        return redirect()->route('admin.template-categories.index')
            ->with('success', 'Template category created successfully.');
    }

    public function edit(TemplateCategory $template_category)
    {
        $admin = auth()->guard('admin')->user();
        if ($admin->email !== 'admin@techbuds.online' && !$admin->can('template-categories.update')) {
            abort(403, 'You do not have permission to edit categories.');
        }

        return view('admin.templates.categories.edit', ['category' => $template_category]);
    }

    public function update(Request $request, TemplateCategory $template_category)
    {
        $admin = auth()->guard('admin')->user();
        if ($admin->email !== 'admin@techbuds.online' && !$admin->can('template-categories.update')) {
            abort(403, 'You do not have permission to update categories.');
        }

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255', 'unique:template_categories,name,' . $template_category->id],
            'description' => ['nullable', 'string', 'max:500'],
            'is_active' => ['required', 'boolean'],
        ]);

        $template_category->update([
            'name' => $validated['name'],
            'slug' => Str::slug($validated['name']),
            'description' => $validated['description'],
            'is_active' => $validated['is_active'],
        ]);

        return redirect()->route('admin.template-categories.index')
            ->with('success', 'Template category updated successfully.');
    }

    public function destroy(TemplateCategory $template_category)
    {
        $admin = auth()->guard('admin')->user();
        if ($admin->email !== 'admin@techbuds.online' && !$admin->can('template-categories.delete')) {
            abort(403, 'You do not have permission to delete categories.');
        }

        if ($template_category->templates()->exists()) {
            return redirect()->route('admin.template-categories.index')
                ->withErrors(['error' => 'Cannot delete category with templates assigned.']);
        }

        $template_category->delete();

        return redirect()->route('admin.template-categories.index')
            ->with('success', 'Template category deleted successfully.');
    }
}

