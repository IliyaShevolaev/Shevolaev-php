<?php

namespace App\Services\Posts;

use App\Jobs\CreatePostEmailSendJob;
use App\Models\Post\Post;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

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
        $postData['user_id'] = Auth::id();

        $image = $postData['image'];
        unset($postData['image']);

        $post = Post::create($postData);

        $post->addMedia($image)->toMediaCollection('posts-images');

        CreatePostEmailSendJob::dispatch($post, Auth::user());

        Log::channel('model-changing')->info('New post was created with data:' . json_encode($postData));

        return $post;
    }

    public function update(array $newPostData, Post $post): Post
    {
        Log::channel('model-changing')->info('Post was updated: ' . json_encode($post->toArray()) . ' to new data: ' . json_encode($newPostData));

        if (isset($newPostData['image'])) {
            $image = $newPostData['image'];
            unset($newPostData['image']);

            $post->getMedia('posts-images')->last()->delete();
            $post->addMedia($image)->toMediaCollection('posts-images');
        }

        $post->update($newPostData);

        return $post;
    }
}
