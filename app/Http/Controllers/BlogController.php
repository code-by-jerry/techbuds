<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        $category = $request->get('category');
        
        $query = Blog::where('is_published', true)
            ->select(['id', 'title', 'slug', 'excerpt', 'featured_image', 'category', 'reading_time', 'signals', 'is_featured', 'published_date', 'created_at', 'updated_at'])
            ->orderBy('is_featured', 'desc')
            ->orderBy('published_date', 'desc');

        if ($category) {
            $query->where('category', $category);
        }

        $blogs = $query->paginate(12);
        
        // Optimize featured query - only select needed fields
        $featured = Blog::where('is_featured', true)
            ->where('is_published', true)
            ->select(['id', 'title', 'slug', 'excerpt', 'featured_image', 'category', 'reading_time', 'signals', 'published_date', 'created_at'])
            ->first();
        
        // Cache categories query (they don't change often)
        $categories = cache()->remember('blog_categories', 3600, function () {
            return Blog::where('is_published', true)
                ->distinct()
                ->pluck('category')
                ->toArray();
        });

        return view('blog.index', compact('blogs', 'featured', 'categories', 'category'));
    }

    public function show(string $slug)
    {
        $blog = Blog::where('slug', $slug)
            ->where('is_published', true)
            ->firstOrFail();

        // Optimize related posts query - only select needed fields
        $related = Blog::where('is_published', true)
            ->where('id', '!=', $blog->id)
            ->where('category', $blog->category)
            ->select(['id', 'title', 'slug', 'excerpt', 'featured_image', 'category', 'reading_time', 'published_date'])
            ->orderBy('published_date', 'desc')
            ->limit(3)
            ->get();

        return view('blog.show', compact('blog', 'related'));
    }
}
