@extends('layouts.app')
@section('content')
<h1>Create comment</h1>

<div class="container w-50">
    <div class="container mt-5">
        <div class="d-flex justify-content-center">
            <div class="card w-50 mb-5">
                <img src="{{ $post->getImageUrl() }}" class="card-img-top">
                <div class="card-header">
                    <h2>{{$post->name}}</h2>
                </div>
                <div class="card-body">
                    <p class="card-text">{{$post->content}}</p>
                </div>
            </div>
        </div>
    </div>

    <form action="{{route('comments.store', $post->id)}}" method="POST">
        @csrf
        <div class="form-group">
            <label>Content</label>
            <textarea name="content" class="form-control" rows="3"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
</div>
@endsection