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
        @foreach ($users as $user)
        <tr>
            <th scope="row">{{$user['id']}}</th>
            <td>{{$user['name']}}</td>
            <td>{{$user['email']}}</td>
            <td>{{$user['role']}}</td>
            <td>
                @can('edit users')
                <a href="{{route('users.edit', $user['id'])}}" class="btn btn-warning">Edit</a>
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