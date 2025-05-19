<?php

namespace App\Services\Posts;

use App\Jobs\CommentStoreJob;
use App\Models\Post\Post;
use App\Models\Post\Comment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class CommentService
{
    public function store(array $commentData, Post $post): void
    {
        $commentData['user_id'] = Auth::id();
        $commentData['post_id'] = $post->id;

        CommentStoreJob::dispatch($commentData);

        Log::channel('model-changing')->info('New comment was created with data:' . json_encode($commentData));
    }
}
