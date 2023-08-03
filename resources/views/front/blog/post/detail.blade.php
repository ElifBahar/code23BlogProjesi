@extends('front.layout.app')

@section('content')
    <div class="container">

        <h2 class="text-center mt-4 mb-4">Blog Detay</h2>

    </div>


    <h2>
        {{$postDetail->title}}
    </h2>


    <br><br><br>


    <p>{{$postDetail->content}}</p>


    <br><br><br><br>




@endsection




@section('js')



@endsection





