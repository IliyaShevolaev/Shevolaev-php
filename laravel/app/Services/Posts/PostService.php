<?php

namespace App\Services\Posts;

use App\Models\Post\Post;
use Illuminate\Support\Collection;

class PostService
{
    public function all(): Collection
    {
        return Post::with('user')->get();
    }

    public function comments(Post $post): Collection
    {
        return $post->comments()->with('user')->get();
    }

    public function store(array $postData): Post
    {
        return Post::create($postData);
    }

    public function update(array $newPostData, Post $post): Post
    {
        $post->update($newPostData);

        return $post;
    }
}
