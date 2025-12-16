<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ToolCategory;
use App\Models\ToolLink;
use Illuminate\Http\Request;

class ToolLinkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Check permission
        $admin = auth()->guard('admin')->user();
        if ($admin->email !== 'admin@techbuds.online' && !$admin->can('tool-links.list')) {
            abort(403, 'You do not have permission to view tool links.');
        }

        $query = ToolLink::with('category');

        if ($request->has('category_id') && $request->category_id) {
            $query->where('tool_category_id', $request->category_id);
        }

        $links = $query->orderBy('order')->orderBy('created_at', 'desc')->paginate(15);
        $categories = ToolCategory::orderBy('name')->get();

        return view('admin.tool-links.index', compact('links', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Check permission
        $admin = auth()->guard('admin')->user();
        if ($admin->email !== 'admin@techbuds.online' && !$admin->can('tool-links.create')) {
            abort(403, 'You do not have permission to create tool links.');
        }

        $categories = ToolCategory::orderBy('name')->get();
        return view('admin.tool-links.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Check permission
        $admin = auth()->guard('admin')->user();
        if ($admin->email !== 'admin@techbuds.online' && !$admin->can('tool-links.create')) {
            abort(403, 'You do not have permission to create tool links.');
        }

        $validated = $request->validate([
            'tool_category_id' => 'required|exists:tool_categories,id',
            'title' => 'required|string|max:255',
            'url' => 'required|url|max:500',
            'description' => 'nullable|string',
            'order' => 'nullable|integer|min:0',
            'is_active' => 'boolean',
        ]);

        ToolLink::create($validated);

        return redirect()->route('admin.tool-links.index')
            ->with('success', 'Link created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(ToolLink $toolLink)
    {
        // Check permission
        $admin = auth()->guard('admin')->user();
        if ($admin->email !== 'admin@techbuds.online' && !$admin->can('tool-links.list')) {
            abort(403, 'You do not have permission to view tool links.');
        }

        $toolLink->load('category');
        return view('admin.tool-links.show', compact('toolLink'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ToolLink $toolLink)
    {
        // Check permission
        $admin = auth()->guard('admin')->user();
        if ($admin->email !== 'admin@techbuds.online' && !$admin->can('tool-links.update')) {
            abort(403, 'You do not have permission to edit tool links.');
        }

        $categories = ToolCategory::orderBy('name')->get();
        return view('admin.tool-links.edit', compact('toolLink', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ToolLink $toolLink)
    {
        // Check permission
        $admin = auth()->guard('admin')->user();
        if ($admin->email !== 'admin@techbuds.online' && !$admin->can('tool-links.update')) {
            abort(403, 'You do not have permission to update tool links.');
        }

        $validated = $request->validate([
            'tool_category_id' => 'required|exists:tool_categories,id',
            'title' => 'required|string|max:255',
            'url' => 'required|url|max:500',
            'description' => 'nullable|string',
            'order' => 'nullable|integer|min:0',
            'is_active' => 'boolean',
        ]);

        $toolLink->update($validated);

        return redirect()->route('admin.tool-links.index')
            ->with('success', 'Link updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ToolLink $toolLink)
    {
        // Check permission
        $admin = auth()->guard('admin')->user();
        if ($admin->email !== 'admin@techbuds.online' && !$admin->can('tool-links.delete')) {
            abort(403, 'You do not have permission to delete tool links.');
        }

        $toolLink->delete();

        return redirect()->route('admin.tool-links.index')
            ->with('success', 'Link deleted successfully.');
    }
}
