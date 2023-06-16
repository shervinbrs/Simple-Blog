<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class Blog_Post extends Controller
{
    //
    public function showPost(Post $post)
    {
        return view('single-post')->with([
            'post'=>$post
        ]);
    }
}
