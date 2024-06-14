<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Livewire\Posts\PostCreate;
use App\Livewire\Posts\PostEdit;
use App\Livewire\Posts\PostIndex;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');


    Route::get('/posts', PostIndex::class)->name('posts.index');
    Route::get('/posts/create', PostCreate::class)->name('posts.create');
    Route::get('/posts/{post}', PostEdit::class)->name('posts.edit');




    // Route::get('/categories', [PostController::class, 'index'])->name('categories.index');
});
