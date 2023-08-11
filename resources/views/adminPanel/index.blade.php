@extends('adminPanel.layout.app')

@section('style')
@endsection

@section('content')
    <div class="col">
        <form action="{{route('post.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <h1>Post Gönder</h1>

            <!--Validation https://laravel.com/docs/10.x/validation-->
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $e)
                            <li>{{$e}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <!--Validation https://laravel.com/docs/10.x/validation-->


            <div class="form-group">
                Baslik : <input type="text" name="title" id="title" class="form-control w-25">
            </div>
            <div class="form-group">
                Blog:
                <textarea name="content" id="content" class="form-control w-25 h-25"></textarea>
            </div>
            <div class="form-group">
                Img : <input type="file" name="img" id="img" class="form-control w-25">
            </div>
            <input class="btn btn-primary" type="submit" name="gonder">
        </form>
    </div>

    <div class="col mt-4">
        <ol>
            @foreach($posts as $post)
                <li>
                    {{$post->title}} : {{$post->content}} : <img src="{{asset("front/images/".$post->image)}}" alt="" width="50"><a href="{{route('post.update',$post->id)}}" class="alert-primary mx-2">Düzenle</a> <a href="{{route('post.delete.action',$post->id)}}" class="alert-warning mx-2">Sil</a>
                </li>
            @endforeach
        </ol>
    </div>
@endsection

@section('script')
@endsection
