<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AdminController;

// Public blog routes
Route::get('/', [BlogController::class, 'index'])->name('blog.index');
Route::get('/post/{slug}', [BlogController::class, 'show'])->name('blog.show');

// Authentication routes (excluding registration)
Auth::routes(['register' => false]);

// Admin routes (protected by auth middleware)
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    
    // Post management routes
    Route::resource('posts', PostController::class);
});

// Redirect /home to admin dashboard for authenticated users
Route::get('/home', function () {
    return redirect()->route('admin.dashboard');
})->middleware('auth')->name('home');
