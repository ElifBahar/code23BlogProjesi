<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\BlogPost;

class BlogController extends Controller
{
    public function index(){
        $posts = BlogPost::get();
        return view('front.blog.post.index',compact('posts'));

    }

    public function detail($var){
        //where('veritabanındakiSütun',arayacağımDeğer)
        //where('haystack', 'needle')
        //where('sütunAdı', 'karşılaştırmaOperatorü' , 'arayacağımDeğer')
        //get() -> çuval -> collection
        //ELOQUENT RELATIONSHIP - ELOQUENT ORM

        $postDetail = BlogPost::where('title',$var)->first();


        return view('front.blog.post.detail',compact('postDetail'));
    }
    public function panel(){
        return view('panel.pages.index');
    }
}
