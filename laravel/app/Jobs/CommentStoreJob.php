<?php

namespace App\Jobs;

use App\Models\Post\Comment;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;

class CommentStoreJob implements ShouldQueue
{
    use Queueable;

    protected $commentData;

    /**
     * Create a new job instance.
     */
    public function __construct(array $commentData)
    {
        $this->commentData = $commentData;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Comment::create($this->commentData);
    }
}
