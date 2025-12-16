<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ToolCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ToolCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Check permission
        $admin = auth()->guard('admin')->user();
        if ($admin->email !== 'admin@techbuds.online' && !$admin->can('tool-categories.list')) {
            abort(403, 'You do not have permission to view tool categories.');
        }

        $categories = ToolCategory::orderBy('order')->orderBy('created_at', 'desc')->paginate(15);
        return view('admin.tool-categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Check permission
        $admin = auth()->guard('admin')->user();
        if ($admin->email !== 'admin@techbuds.online' && !$admin->can('tool-categories.create')) {
            abort(403, 'You do not have permission to create tool categories.');
        }

        return view('admin.tool-categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Check permission
        $admin = auth()->guard('admin')->user();
        if ($admin->email !== 'admin@techbuds.online' && !$admin->can('tool-categories.create')) {
            abort(403, 'You do not have permission to create tool categories.');
        }

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:tool_categories,slug',
            'description' => 'nullable|string',
            'order' => 'nullable|integer|min:0',
            'is_active' => 'boolean',
        ]);

        if (empty($validated['slug'])) {
            $validated['slug'] = Str::slug($validated['name']);
            $count = ToolCategory::where('slug', $validated['slug'])->count();
            if ($count > 0) {
                $validated['slug'] = $validated['slug'] . '-' . ($count + 1);
            }
        }

        ToolCategory::create($validated);

        return redirect()->route('admin.tool-categories.index')
            ->with('success', 'Category created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(ToolCategory $toolCategory)
    {
        // Check permission
        $admin = auth()->guard('admin')->user();
        if ($admin->email !== 'admin@techbuds.online' && !$admin->can('tool-categories.list')) {
            abort(403, 'You do not have permission to view tool categories.');
        }

        $toolCategory->load('allLinks');
        return view('admin.tool-categories.show', compact('toolCategory'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ToolCategory $toolCategory)
    {
        // Check permission
        $admin = auth()->guard('admin')->user();
        if ($admin->email !== 'admin@techbuds.online' && !$admin->can('tool-categories.update')) {
            abort(403, 'You do not have permission to edit tool categories.');
        }

        return view('admin.tool-categories.edit', compact('toolCategory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ToolCategory $toolCategory)
    {
        // Check permission
        $admin = auth()->guard('admin')->user();
        if ($admin->email !== 'admin@techbuds.online' && !$admin->can('tool-categories.update')) {
            abort(403, 'You do not have permission to update tool categories.');
        }

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:tool_categories,slug,' . $toolCategory->id,
            'description' => 'nullable|string',
            'order' => 'nullable|integer|min:0',
            'is_active' => 'boolean',
        ]);

        if (empty($validated['slug'])) {
            $validated['slug'] = Str::slug($validated['name']);
            $count = ToolCategory::where('slug', $validated['slug'])
                ->where('id', '!=', $toolCategory->id)
                ->count();
            if ($count > 0) {
                $validated['slug'] = $validated['slug'] . '-' . ($count + 1);
            }
        }

        $toolCategory->update($validated);

        return redirect()->route('admin.tool-categories.index')
            ->with('success', 'Category updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ToolCategory $toolCategory)
    {
        // Check permission
        $admin = auth()->guard('admin')->user();
        if ($admin->email !== 'admin@techbuds.online' && !$admin->can('tool-categories.delete')) {
            abort(403, 'You do not have permission to delete tool categories.');
        }

        $toolCategory->delete();

        return redirect()->route('admin.tool-categories.index')
            ->with('success', 'Category deleted successfully.');
    }
}
