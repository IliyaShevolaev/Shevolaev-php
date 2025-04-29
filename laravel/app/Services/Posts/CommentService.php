<?php

namespace App\Services\Posts;

use App\Models\Post\Post;
use App\Models\Post\Comment;
use Illuminate\Support\Facades\Log;

class CommentService
{
    public function store(array $commentData, Post $post): Comment
    {
        Log::channel('model-changing')->info('New comment was created with data:' . json_encode($commentData));

        return Comment::create([
            'content' => $commentData['content'],
            'user_id' => $commentData['user_id'],
            'post_id' => $post->id,
        ]);
    }
}
