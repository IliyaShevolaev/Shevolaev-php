<?php

namespace App\Http\Controllers\Posts;

use App\Models\Post\Post;
use App\Http\Controllers\Controller;
use App\Http\Requests\Comment\StoreRequest;
use App\Services\Posts\CommentService;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class CommentController extends Controller
{

    private $commentService;

    public function __construct(CommentService $commentService)
    {
        $this->commentService = $commentService;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Post $post): View
    {
        return view('comments.create', compact('post'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $storeRequest, Post $post): RedirectResponse
    {
        $commentData = $storeRequest->validated();

        $this->commentService->store($commentData, $post);

        return redirect()->route('posts.show', $post->id);
    }
}
