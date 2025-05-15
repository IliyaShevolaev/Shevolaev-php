<?php

namespace App\Http\Controllers\Posts;

use App\Models\Post\Post;
use App\Services\Posts\PostService;
use App\Http\Controllers\Controller;
use App\Http\Requests\Posts\StoreRequest;
use App\Http\Requests\Posts\UpdateRequest;
use App\Http\Resources\Post\PostResource;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class PostController extends Controller
{
    use AuthorizesRequests;

    private $postService;

    public function __construct(PostService $postService)
    {
        $this->postService = $postService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $this->authorize('view posts');

        $allPosts = $this->postService->all();

        return view('posts.index', [
            'posts' => PostResource::collection($allPosts)->resolve(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $this->authorize('add posts');

        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $storeRequest): RedirectResponse
    {
        $this->authorize('add posts');

        $postData = $storeRequest->validated();

        $createdPost = $this->postService->store($postData);

        return redirect()->route('posts.show', $createdPost->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post): View
    {
        $this->authorize('view posts');

        return view('posts.show', [
            'post' => (new PostResource($post))->resolve(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post): View
    {
        $this->authorize('edit posts');

        return view('posts.edit', [
            'post' => (new PostResource($post))->resolve(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $updateRequest, Post $post): RedirectResponse
    {
        $this->authorize('edit posts');

        $postData = $updateRequest->validated();

        $this->postService->update($postData, $post);

        return redirect()->route('posts.show', $post->id);
    }
}
