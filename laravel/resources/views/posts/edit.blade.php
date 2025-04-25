@extends('layouts.app')
@section('content')
<h1>Edit post</h1>

<div class="container w-50">
    <form action="{{route('posts.update', $post->id)}}" method="POST">
        @csrf
        @method('PATCH')
        <div class="form-group">
            <label>Name</label>
            <input name="name" value="{{$post->name}}" type="text" class="form-control" placeholder="Enter name">
        </div>
        <div class="form-group">
            <label>Content</label>
            <textarea name="content" class="form-control" rows="3">{{$post->content}}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Edit</button>
    </form>
</div>
@endsection