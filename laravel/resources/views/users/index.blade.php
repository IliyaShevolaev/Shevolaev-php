@extends('layouts.app')
@section('content')
<table class="table">
    <thead>
        <tr>
            <th scope="col">id</th>
            <th scope="col">name</th>
            <th scope="col">email</th>
            <th scope="col">role</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($allUsersData as $userData)
        <tr>
            <th scope="row">{{$userData->id}}</th>
            <td>{{$userData->name}}</td>
            <td>{{$userData->email}}</td>
            <td>
                @foreach ($userData->roles as $role)
                <span>{{ $role->name }}</span>
                @endforeach
            </td>
            <td>
                @can('edit users')
                <a href="{{route('users.edit', $userData->id)}}" class="btn btn-warning">Edit</a>
                @endcan
            </td>
        </tr>
        @endforeach
        <tr>
            <th scope="row">
                <a href="{{route('users.create')}}" class="btn btn-success">+</a>
            </th>
        </tr>
    </tbody>
</table>
@endsection