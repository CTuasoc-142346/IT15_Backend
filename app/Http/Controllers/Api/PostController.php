<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * GET /api/posts
     * Returns paginated posts with category + student (author) eagerly loaded.
     *
     * Query params:
     *   category_id  — filter by category
     *   search       — searches title and text
     *   per_page     — results per page (default 12, max 50)
     */
    public function index(Request $request)
    {
        $query = Post::with(['category', 'student'])
            ->orderByDesc('created_at');

        if ($categoryId = $request->input('category_id')) {
            $query->where('category_id', (int) $categoryId);
        }

        if ($search = $request->input('search')) {
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('text',  'like', "%{$search}%");
            });
        }

        $perPage = min((int) $request->input('per_page', 12), 50);

        $posts = $query->paginate($perPage);

        // Append computed author_name to every post item
        $posts->getCollection()->each(fn ($p) => $p->append('author_name'));

        return response()->json($posts);
    }

    /**
     * GET /api/posts/{id}
     * Returns a single post with category + student.
     */
    public function show(int $id)
    {
        $post = Post::with(['category', 'student'])->findOrFail($id);
        $post->append('author_name');
        return response()->json($post);
    }

    /**
     * GET /api/categories
     * Returns all categories with post counts.
     */
    public function categories()
    {
        $categories = Category::withCount('posts')
            ->orderBy('category_name')
            ->get();

        return response()->json($categories);
    }
}