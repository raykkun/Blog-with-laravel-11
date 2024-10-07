<?php

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('home', ['title' => 'Home Page']);
});

Route::get('/about', function () {
    return view('about', ['title' => 'About Page']);
});

Route::get('/posts', function () {
    // $posts = Post::with(['author', 'category'])->latest()->get();
    //dump(request('search'));
    // $posts = Post::latest();
    // if (request('search')) {
    //     $posts->where('title', 'like', '%' . request('search') . '%');
    // }
    // $posts = Post::latest()->get();

    return view('posts', ['title' => 'Blog Page', 'posts' => Post::filter(request(['search', 'category', 'author']))->latest()->paginate(5)->withQueryString()]);
});

Route::get('/posts/{post:slug}', function (Post $post) {

    //$post = Post::find($slug);

    return view('post', ['title' => 'Single Post', 'post' => $post]);
});

Route::get('/authors/{user:username}', function (User $user) {
    // $posts = $user->posts->load(['author', 'category']);

    return view('posts', ['title' => count($user->posts) . 'Articles by ' . $user->name, 'posts' => $user->posts]);
});

Route::get('/categories/{category:slug}', function (Category $category) {
    // $posts = $category->posts->load(['author', 'category']);

    return view('posts', ['title' => 'Articles in: ' . $category->name, 'posts' => $category->posts]);
});

Route::get('/contact', function () {
    return view('contact', ['name' => 'Ray', 'title' => 'Contact Page']);
});
