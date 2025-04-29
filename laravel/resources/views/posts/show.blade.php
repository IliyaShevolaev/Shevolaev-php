@extends('layouts.app')
@section('content')
<h1>Post</h1>

<div class="container mt-5">
    <div class="d-flex justify-content-center">
        <div class="card w-50 mb-5">
            <img src="{{ $post->getImageUrl() }}" class="card-img-top">
            <div class="card-header">
                <h2>{{$post->name}}</h2>
            </div>
            <div class="card-body">
                <p class="card-text">{{$post->content}}</p>
                <a href="{{route('posts.edit', $post->id)}}" class="btn btn-warning">Edit post</a>

                <p class="card-text">Comments:</p>
                <ul class="list-group list-group-flush">
                    @foreach ($postComments as $comment)
                    <li class="list-group-item">{{$comment->user->name}}: {{$comment->content}}</li>
                    @endforeach
                </ul>
                <a href="{{route('comments.create', $post->id)}}" class="btn btn-success">+</a>
            </div>
        </div>
    </div>
</div>

@endsection