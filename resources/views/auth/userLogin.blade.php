@extends('auth.layout.app')
@section('title')
    User Login
@endsection
@section('form')
    <form action="{{route('user.login.action')}}" method="post">
        @csrf
        <h1>User Login</h1>
        @if($errors->any())
            <div class="alert alert-danger">{{$errors->first()}}</div>
        @endif
        <div class="form-group">
            <label for="exampleInputEmail1">email</label>
            <input type="text" class="form-control" id="email" name="email">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>
        <button type="submit" class="btn btn-primary mt-3">Submit</button>
        <a class="mt-5" href="{{route('user.register')}}">Register</a>
    </form>
@endsection
