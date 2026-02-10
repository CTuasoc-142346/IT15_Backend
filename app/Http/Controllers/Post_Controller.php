<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;

class Post_Controller extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::all();

        if ($request->has('category')) {
            $posts = Post::where('category_id', $request->category)
                        ->with('category')
                        ->get();
        } else {
            $posts = Post::with('category')->get();
        }

        return view('posts.index', compact('posts', 'categories'));
    }
}
