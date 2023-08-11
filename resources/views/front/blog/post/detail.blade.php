@extends('front.layout.app')

@section('content')


    <h2>
        {{$postDetail->title}}
    </h2>


    <br><br><br>


    <img src="{{asset('front/images/'.$postDetail->image)}}" class="w-50" alt="...">


    <br><br><br><br>
    <p>{{$postDetail->content}}</p>

@endsection





