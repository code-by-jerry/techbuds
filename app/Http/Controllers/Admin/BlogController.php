<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class BlogController extends Controller
{
    /**
     * Display a listing of the blogs.
     */
    public function index(Request $request)
    {
        // Check permission
        $admin = auth()->guard('admin')->user();
        if ($admin->email !== 'admin@techbuds.online' && !$admin->can('blogs.list')) {
            abort(403, 'You do not have permission to view blogs.');
        }

        $query = Blog::query();

        // Search functionality
        if ($request->has('search') && $request->search) {
            $query->where(function($q) use ($request) {
                $q->where('title', 'like', '%' . $request->search . '%')
                  ->orWhere('category', 'like', '%' . $request->search . '%')
                  ->orWhere('excerpt', 'like', '%' . $request->search . '%');
            });
        }

        // Filter by status
        if ($request->has('status') && $request->status !== '') {
            if ($request->status === 'published') {
                $query->where('is_published', true);
            } elseif ($request->status === 'draft') {
                $query->where('is_published', false);
            }
        }

        // Filter by category
        if ($request->has('category') && $request->category) {
            $query->where('category', $request->category);
        }

        $blogs = $query->orderBy('created_at', 'desc')->paginate(15);
        $categories = Blog::distinct()->pluck('category')->filter()->sort()->values();

        return view('admin.blogs.index', compact('blogs', 'categories'));
    }

    /**
     * Show the form for creating a new blog.
     */
    public function create()
    {
        // Check permission
        $admin = auth()->guard('admin')->user();
        if ($admin->email !== 'admin@techbuds.online' && !$admin->can('blogs.create')) {
            abort(403, 'You do not have permission to create blogs.');
        }

        return view('admin.blogs.create');
    }

    /**
     * Store a newly created blog in storage.
     */
    public function store(Request $request)
    {
        // Check permission
        $admin = auth()->guard('admin')->user();
        if ($admin->email !== 'admin@techbuds.online' && !$admin->can('blogs.create')) {
            abort(403, 'You do not have permission to create blogs.');
        }

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:blogs,slug',
            'meta_description' => 'nullable|string|max:500',
            'category' => 'required|string|max:100',
            'excerpt' => 'nullable|string|max:1000',
            'content' => 'required|string',
            'featured_image' => 'nullable|string|max:500',
            'published_date' => 'nullable|date',
            'reading_time' => 'nullable|integer|min:1',
            'is_featured' => 'boolean',
            'is_published' => 'boolean',
        ]);

        // Generate slug if not provided
        if (empty($validated['slug'])) {
            $validated['slug'] = Str::slug($validated['title']);
            
            // Ensure uniqueness
            $count = Blog::where('slug', $validated['slug'])->count();
            if ($count > 0) {
                $validated['slug'] = $validated['slug'] . '-' . ($count + 1);
            }
        }
        
        // Ensure slug is always lowercase for SEO consistency
        $validated['slug'] = strtolower($validated['slug']);

        // Set default published_date if not provided
        if (empty($validated['published_date'])) {
            $validated['published_date'] = now();
        }

        // Calculate reading time if not provided
        if (empty($validated['reading_time'])) {
            $wordCount = str_word_count(strip_tags($validated['content']));
            $validated['reading_time'] = max(1, ceil($wordCount / 200)); // Average reading speed: 200 words/min
        }

        Blog::create($validated);

        return redirect()->route('admin.blogs.index')
            ->with('success', 'Blog created successfully.');
    }

    /**
     * Show the form for editing the specified blog.
     */
    public function edit(Blog $blog)
    {
        // Check permission
        $admin = auth()->guard('admin')->user();
        if ($admin->email !== 'admin@techbuds.online' && !$admin->can('blogs.update')) {
            abort(403, 'You do not have permission to edit blogs.');
        }

        return view('admin.blogs.edit', compact('blog'));
    }

    /**
     * Update the specified blog in storage.
     */
    public function update(Request $request, Blog $blog)
    {
        // Check permission
        $admin = auth()->guard('admin')->user();
        if ($admin->email !== 'admin@techbuds.online' && !$admin->can('blogs.update')) {
            abort(403, 'You do not have permission to update blogs.');
        }

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => [
                'nullable',
                'string',
                'max:255',
                Rule::unique('blogs', 'slug')->ignore($blog->id),
            ],
            'meta_description' => 'nullable|string|max:500',
            'category' => 'required|string|max:100',
            'excerpt' => 'nullable|string|max:1000',
            'content' => 'required|string',
            'featured_image' => 'nullable|string|max:500',
            'published_date' => 'nullable|date',
            'reading_time' => 'nullable|integer|min:1',
            'is_featured' => 'boolean',
            'is_published' => 'boolean',
        ]);

        // Generate slug if not provided
        if (empty($validated['slug'])) {
            $validated['slug'] = Str::slug($validated['title']);
            
            // Ensure uniqueness
            $count = Blog::where('slug', $validated['slug'])
                ->where('id', '!=', $blog->id)
                ->count();
            if ($count > 0) {
                $validated['slug'] = $validated['slug'] . '-' . ($count + 1);
            }
        }
        
        // Ensure slug is always lowercase for SEO consistency
        $validated['slug'] = strtolower($validated['slug']);

        // Calculate reading time if not provided
        if (empty($validated['reading_time'])) {
            $wordCount = str_word_count(strip_tags($validated['content']));
            $validated['reading_time'] = max(1, ceil($wordCount / 200));
        }

        $blog->update($validated);

        return redirect()->route('admin.blogs.index')
            ->with('success', 'Blog updated successfully.');
    }

    /**
     * Remove the specified blog from storage.
     */
    public function destroy(Blog $blog)
    {
        // Check permission
        $admin = auth()->guard('admin')->user();
        if ($admin->email !== 'admin@techbuds.online' && !$admin->can('blogs.delete')) {
            abort(403, 'You do not have permission to delete blogs.');
        }

        $blog->delete();

        return redirect()->route('admin.blogs.index')
            ->with('success', 'Blog deleted successfully.');
    }
}

