@extends('layouts.app')
@section('content')

<h1>Edit user</h1>
<div class="container w-50">
    <form action="{{route('users.update', $user['id'])}}" method="POST">
        @csrf
        @method('PATCH')
        <div class="form-group">
            <label>Username</label>
            <input name="name" value="{{$user['name']}}"  type="text" class="form-control" placeholder="Enter username">
        </div>
        <div class="form-group">
            <label>Email</label>
            <input name="email" value="{{$user['email']}}"  type="email" class="form-control" aria-describedby="emailHelp" placeholder="Enter email">
        </div>
        <div class="form-group">
            <label>Password</label>
            <input name="password" type="password" class="form-control" placeholder="Password">
        </div>
        <div class="form-group">
            <label>Confirm password</label>
            <input name="password_confirmation" type="password" class="form-control" placeholder="Password">
        </div>
        <div class="form-group">
            <label>Role:</label>
            <select name="role" class="form-select">
                @foreach (config('roles.roles') as $key => $role)
                    <option {{$key == $user['role'] ? 'selected' : ''}} value="{{$key}}">{{$key}}</option> 
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Edit</button>
    </form>
</div>
@endsection