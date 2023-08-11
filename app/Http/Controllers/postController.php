<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;

class postController extends Controller
{
    //
    public function store(Request $request){
        $validate = $request->validate([
            'title'=>'required',
            'content'=>'required',
        ]);
        $var = new BlogPost();
        $var->title = $request->title;
        $var->content = $request->content;
        if($request->hasFile('img')){
            $path = public_path('front/images');
            $name = Str::random(10);
            $file = $request->file('img');
            $name .=$name.$file->getClientOriginalName();
            $file -> move($path,$name);
            $var->image=$name;
        }
        $var->save();

        return Redirect::back();
    }

    public function admin(){
        $posts = BlogPost::orderBy('id')->get();
        return view('adminPanel.index',compact('posts'));
    }

    public function update($id){
        $post = BlogPost::whereId($id)->first();
        return view('adminPanel.postUpdate',compact('post'));
    }

    public function updateAction(Request $request, $id){
        $validate = $request->validate([
            'title'=>'required',
            'content'=>'required',
        ]);

        $var = BlogPost::find($id);
        $var->title = $request->title;
        $var->content = $request->content;
        if($request->hasFile('img')){
            $path = public_path('front/images');
            $name = Str::random(10);
            $file = $request->file('img');
            $name .=$name.$file->getClientOriginalName();
            $file -> move($path,$name);
            $var->image = $name;
        }
        $var->save();

        return Redirect::route('admin');
    }

    public function postDeleteAction($id){
        BlogPost::whereId($id)->delete();

        return Redirect::back();
    }
}
