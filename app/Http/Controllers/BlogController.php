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
            ->orderBy('is_featured', 'desc')
            ->orderBy('published_date', 'desc');

        if ($category) {
            $query->where('category', $category);
        }

        $blogs = $query->paginate(12);
        $featured = Blog::where('is_featured', true)
            ->where('is_published', true)
            ->first();
        
        $categories = Blog::where('is_published', true)
            ->distinct()
            ->pluck('category')
            ->toArray();

        return view('blog.index', compact('blogs', 'featured', 'categories', 'category'));
    }

    public function show(string $slug)
    {
        $blog = Blog::where('slug', $slug)
            ->where('is_published', true)
            ->firstOrFail();

        $related = Blog::where('is_published', true)
            ->where('id', '!=', $blog->id)
            ->where('category', $blog->category)
            ->limit(3)
            ->get();

        return view('blog.show', compact('blog', 'related'));
    }
}
