<?php

namespace App\Services\Posts;

use App\Models\Post\Post;
use App\Models\Post\Comment;

class CommentService
{
    public function store(array $commentData, Post $post): Comment
    {
        return Comment::create([
            'content' => $commentData['content'],
            'user_id' => $commentData['user_id'],
            'post_id' => $post->id,
        ]);
    }
}
