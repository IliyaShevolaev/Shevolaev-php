@extends('layouts.app')
@section('content')
<h1>Create post</h1>

<div class="container w-50">
    <form action="{{route('posts.store')}}" method="POST">
        @csrf
        <div class="form-group">
            <label>Name</label>
            <input name="name" type="text" class="form-control" placeholder="Enter name">
        </div>
        <div class="form-group">
            <label>Content</label>
            <textarea name="content" class="form-control" rows="3"></textarea>
        </div>
        <div class="form-group">
            <label>user_id</label>
            <input name="user_id" type="number" class="form-control" placeholder="Enter id">
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
</div>
@endsection