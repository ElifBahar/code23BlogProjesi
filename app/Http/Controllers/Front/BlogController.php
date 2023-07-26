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
}
