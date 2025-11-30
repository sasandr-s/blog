<?php

require __DIR__.'/auth.php';

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CreatorController;
use Illuminate\Support\Facades\Route;

// Standalone welcome page
Route::get('/', function () {
    return view('welcome');
});

//About and Contact pages
Route::get('/blogs/about', [CreatorController::class, 'about'])->name('blogs.about');
Route::get('/blogs/contact', [CreatorController::class, 'contact'])->name('blogs.contact');

// Optional: redirect default dashboard to blogs
Route::get('/dashboard', function () {
    return redirect()->route('blogs.home');
})->middleware(['auth', 'verified']);

// Profile routes (authenticated users only)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Blog routes

// Public route: list all blogs
Route::get('/blogs', [CreatorController::class, 'home'])->name('blogs.home');

// Search route (must come before {creator} route to avoid conflicts)
Route::get('/blogs/search', [CreatorController::class, 'search'])->name('blogs.search');

// Protected routes: create, store, delete (authenticated users only)
Route::middleware('auth')->group(function () {
    Route::get('/blogs/create', [CreatorController::class, 'create'])->name('blogs.create');
    Route::post('/blogs', [CreatorController::class, 'store'])->name('blogs.store');
    Route::delete('/blogs/{creator}', [CreatorController::class, 'destroy'])->name('blogs.destroy');
});

// Public route: show a single blog (must come **after** /create and /search to avoid conflicts)
Route::get('/blogs/{creator}', [CreatorController::class, 'show'])->name('blogs.show');

// Comment routes
Route::middleware('auth')->group(function () {
    Route::post('/blogs/{creator}/comments', [App\Http\Controllers\CommentController::class, 'store'])->name('comments.store');
    Route::delete('/comments/{comment}', [App\Http\Controllers\CommentController::class, 'destroy'])->name('comments.destroy');
});

// Search route
Route::get('/blogs/search', [CreatorController::class, 'search'])->name('blogs.search');

Route::get('/blogs/search', [CreatorController::class, 'search'])->name('blogs.search');

// API Routes for creators
Route::get('/api/creators', [CreatorController::class, 'apiIndex']);
Route::get('/api/creators/{id}', [CreatorController::class, 'apiShow']);

//About and Contact pages
Route::get('/blogs/about', [CreatorController::class, 'about'])->name('blogs.about');
Route::get('/blogs/contact', [CreatorController::class, 'contact'])->name('blogs.contact');
 