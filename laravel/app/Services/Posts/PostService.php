<?php

namespace App\Services\Posts;

use App\Models\Post\Post;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;

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
        Log::channel('model-changing')->info('New post was created with data:' . json_encode($postData));
        
        return Post::create($postData);
    }

    public function update(array $newPostData, Post $post): Post
    {
        Log::channel('model-changing')->info('Post was updated: ' . json_encode($post->toArray()) . ' to new data: ' . json_encode($newPostData));

        $post->update($newPostData);

        return $post;
    }
}
