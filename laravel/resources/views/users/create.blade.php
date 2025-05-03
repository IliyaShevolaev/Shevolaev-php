@extends('layouts.app')
@section('content')
<h1>Create user</h1>

<div class="container w-50">
    <form action="{{route('users.store')}}" method="POST">
        @csrf
        <div class="form-group">
            <label>Username</label>
            <input name="name" type="text" class="form-control" placeholder="Enter username">
        </div>
        <div class="form-group">
            <label>Email</label>
            <input name="email" type="email" class="form-control" aria-describedby="emailHelp"
                placeholder="Enter email">
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
            <label>Role</label>
            <select name="role" class="form-select">
                @foreach (config('roles.roles') as $key => $role)
                    <option value="{{$key}}">{{$key}}</option> 
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Create</button>
    </form>
</div>
@endsection