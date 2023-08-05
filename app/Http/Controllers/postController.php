<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

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
        $var->save();

        return Redirect::route('admin');
    }

    public function admin(){
        $posts = BlogPost::get();
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

        BlogPost::whereId($id)->update([
            'title'=>$request->title,
            'content'=>$request->content,
        ]);

        return Redirect::route('admin');
    }

    public function postDeleteAction($id){
        BlogPost::whereId($id)->delete();

        return Redirect::route('admin');
    }
}
