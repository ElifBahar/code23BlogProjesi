@extends('auth.layout.app')
@section('title')
    Admin Login
@endsection
@section('form')
    <form action="{{route('admin.login.action')}}" method="post">
        @csrf
        <h1>Admin Login</h1>
        @if($errors->any())
            <div class="alert alert-danger">{{$errors->first()}}</div>
        @endif
        <div class="form-group">
            <label for="exampleInputEmail1">username</label>
            <input type="text" class="form-control" id="username" name="username">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>
        <button type="submit" class="btn btn-primary mt-3">Submit</button>
    </form>
@endsection
