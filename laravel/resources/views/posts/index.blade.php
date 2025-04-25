@extends('layouts.app')
@section('content')
<h1>Posts</h1>
<a href="{{route('posts.create')}}" class="btn btn-success">+</a>

<div class="container mt-5">
    @foreach ($allPosts as $post)
    <div class="d-flex justify-content-center">
        <div class="card w-50 mb-5">
            <div class="card-header">
                <h2>{{$post->name}}</h2> <h4>by {{$post->user->name}}</h4>
            </div>
            <div class="card-body">
                <p class="card-text">{{$post->content}}</p>
                <a href="{{route('posts.show', $post->id)}}" class="btn btn-primary">View</a>
            </div>
        </div>
    </div>
        @endforeach
</div>

@endsection