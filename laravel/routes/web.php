<?php

use App\Http\Controllers\Posts\CommentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Posts\PostController;
use App\Http\Controllers\Users\UserController;
use App\Models\Post\Comment;
Route::get('/', function () {
    return view('layouts.app');
});

Route::resource('users', UserController::class);

Route::resource('posts', PostController::class);

Route::group(['prefix' => 'comments', 'as' => 'comments.'], function () {
    Route::get('/{post}/create', [CommentController::class, 'create'])->name('create');
    Route::post('/{post}/store', [CommentController::class, 'store'])->name('store');
});
