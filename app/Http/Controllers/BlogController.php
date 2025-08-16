<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display the blog homepage with list of published posts.
     */
    public function index()
    {
        $posts = Post::published()->latest('published_at')->paginate(6);
        return view('blog.index', compact('posts'));
    }

    /**
     * Display the specified blog post.
     */
    public function show($slug)
    {
        $post = Post::published()->where('slug', $slug)->firstOrFail();
        return view('blog.show', compact('post'));
    }
}
