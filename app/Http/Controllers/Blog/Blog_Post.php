<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Widget;
use Illuminate\Http\Request;

class Blog_Post extends Controller
{
    //
    public function showPost(Post $post)
    {
        if($post['publish_date'] > \Morilog\Jalali\Jalalian::forge('today')->format('%Y-%m-%d') || $post['publish'] == false)
        {
            return abort(404);
        }
        return view('single-post')->with([
            'post'=>$post
        ]);
    }
    public function showSiteMap()
    {
        return response()->view('sitemap',[
            'posts'=>Post::where(['publish'=>true,['publish_date','<=',\Morilog\Jalali\Jalalian::forge('today')->format('%Y-%m-%d')]])->get(),
            'widgets'=>Widget::where('active',true)->get()
            ])->header('Content-Type','text/xml');
    }
}
