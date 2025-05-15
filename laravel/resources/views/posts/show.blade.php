@extends('layouts.app')
@section('content')
<h1>Post</h1>

<div class="container mt-5">
    <div class="d-flex justify-content-center">
        <div class="card w-50 mb-5">
            <img src="{{ $post['imageUrl'] }}" class="card-img-top">
            <div class="card-header">
                <h2>{{$post['name']}}</h2>
            </div>
            <div class="card-body">
                <p class="card-text">{{$post['content']}}</p>

                @can('edit posts', $post)
                <a href="{{route('posts.edit', $post['id'])}}" class="btn btn-warning">Edit post</a>
                @endcan

                <p class="card-text">Comments:</p>
                <ul class="list-group list-group-flush">
                    @foreach ($post['comments'] as $comment)
                    <li class="list-group-item">{{$comment['userName']}}: {{$comment['content']}}</li>
                    @endforeach
                </ul>
                <a href="{{route('comments.create', $post['id'])}}" class="btn btn-success">+</a>
            </div>
        </div>
    </div>
</div>

@endsection