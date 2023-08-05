
@extends('front.layout.app')


@section('style')
    <style>
        h1{
            color: blue;
        }
    </style>
@endsection


@section('content')

    <div class="container">

        <h2 class="text-center mt-4 mb-4">Bloglar</h2>

    </div>



    <div class="col d-flex" style="gap: 30px">
        @foreach($posts as $post)
            <div class="card" style="width: 18rem;">
                <img src="{{asset('front/images/ddyoLogo.png')}}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">{{$post->title}}</h5>
                    <p class="card-text">{{$post->content}}</p>
                    <a href="{{ route('front.blogDetail',$post->title) }}" class="btn btn-primary">Detay</a>
                </div>
            </div>

        @endforeach
    </div>


@endsection





@section('js')



@endsection
