<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Posts\PostController;
use App\Http\Controllers\Users\UserController;
use App\Http\Controllers\Posts\CommentController;

Route::get('/', function () {
    return view('layouts.app');
});

Route::group(['prefix' => 'users', 'as' => 'users.'], function () {
    Route::middleware('can:view users')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('index');
    });

    Route::middleware('can:add users')->group(function () {
        Route::get('/create', [UserController::class, 'create'])->name('create');
        Route::post('/', [UserController::class, 'store'])->name('store');
    });

    Route::middleware('can:edit users')->group(function () {
        Route::get('/{user}/edit', [UserController::class, 'edit'])->name('edit');
        Route::patch('/{user}', [UserController::class, 'update'])->name('update');
    });
});

Route::group(['prefix' => 'posts', 'as' => 'posts.'], function () {
    Route::middleware('can:add posts')->group(function () {
        Route::get('/create', [PostController::class, 'create'])->name('create');
        Route::post('/', [PostController::class, 'store'])->name('store');
    });

    Route::middleware('can:view posts')->group(function () {
        Route::get('/', [PostController::class, 'index'])->name('index');
        Route::get('/{post}', [PostController::class, 'show'])->name('show');
    });

    Route::middleware('can:edit posts')->group(function () {
        Route::get('/{post}/edit', [PostController::class, 'edit'])->name('edit');
        Route::patch('/{post}', [PostController::class, 'update'])->name('update');
    });
});

Route::group(['prefix' => 'comments', 'as' => 'comments.', 'middleware' => 'can:add comments'], function () {
    Route::get('/{post}/create', [CommentController::class, 'create'])->name('create');
    Route::post('/{post}/store', [CommentController::class, 'store'])->name('store');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

