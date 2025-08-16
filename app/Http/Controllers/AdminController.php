<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display the admin dashboard.
     */
    public function dashboard()
    {
        $totalPosts = Post::count();
        $publishedPosts = Post::published()->count();
        $draftPosts = Post::where('is_published', false)->count();
        $totalUsers = User::count();

        $recentPosts = Post::latest()->take(5)->get();

        return view('admin.dashboard', compact('totalPosts', 'publishedPosts', 'draftPosts', 'totalUsers', 'recentPosts'));
    }

    /**
     * Show the admin login form.
     */
    public function showLoginForm()
    {
        if (Auth::check()) {
            return redirect()->route('admin.dashboard');
        }
        return view('auth.login');
    }
}
