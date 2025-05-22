<?php

namespace App\Jobs;

use App\Models\User;
use App\Mail\PostMail;
use App\Models\Post\Post;
use Illuminate\Support\Facades\Mail;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;

class CreatePostEmailSendJob implements ShouldQueue
{
    use Queueable;

    protected $post;
    protected $user;

    /**
     * Create a new job instance.
     */
    public function __construct(Post $post, User $user)
    {
        $this->post = $post;
        $this->user = $user;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Mail::to($this->user->email)->send(new PostMail($this->post));
    }
}
