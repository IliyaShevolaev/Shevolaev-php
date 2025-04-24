<?php

use App\Models\Post\Post;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', function () {
    Post::create(['name' => 'test', 'content' => 'content', 'user_id' => 1]);
});

