<?php

namespace App\Http\Controllers;

use App\Models\ToolCategory;
use Illuminate\Http\Request;

class DevToolsController extends Controller
{
    public function index()
    {
        $categories = ToolCategory::where('is_active', true)
            ->with('links')
            ->orderBy('order')
            ->get();

        return view('devtools.index', compact('categories'));
    }
}
