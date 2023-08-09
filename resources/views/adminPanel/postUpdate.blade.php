@extends('adminPanel.layout.app')

@section('style')
@endsection

@section('content')
    <div class="col">
        <form action="{{route('post.update.action',$post->id)}}" method="post">
            @csrf
            <h1>Post Güncelle</h1>

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
                Baslik : <input type="text" value="{{$post->title}}" name="title" id="title" class="form-control w-25">
            </div>
            <div class="form-group">
                Blog:
                <textarea name="content" id="content" class="form-control w-25 h-25">{{$post->content}}</textarea>
            </div>
            <input class="btn btn-primary" type="submit" name="Düzenle">
        </form>
    </div>
@endsection

@section('script')
@endsection
