<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\post;
use App\Models\category;

class Post_Cont extends Controller
{
    public function showCreate()
    {
        return view('panel.createPost')->with([
            'categories'=>category::get(['id','name'])
        ]);
    }
    public function showEdit(post $post)
    {
        return view('panel.editPost')->with([
            'post'=>$post,
            'categories'=>category::get(['id','name']),
        ]);
    }
    public function edit(post $post,Request $req)
    {
        $post_information = $req->validate([
            'title'=>'required|string|max:50',
            'slug'=>'required|string|max:50|unique:posts,slug,'.$post->id,
            'publish_date'=>'required',
            'content'=>'required|string',
            'category_id'=>'required|integer',
            'thumbnail'=>'file|mimes:jpeg,png,jpg,gif|max:2048',
            'meta_desc'=>'required|string|max:200'
        ]);
        if(!empty($req->thumbnail))
        {
            if($post->thumbnail != 'default.png')
            {
                Storage::delete('public/'.$post->thumbnail);
                $file_name = uniqid().'.'.$req->file('thumbnail')->getClientOriginalExtension();
                Storage::putFileAs('public',$req->file('thumbnail'),$file_name);
                $post_information['thumbnail'] = $file_name;
            }

        }
        if(!empty($req->publish))
        {
            $post['publish'] = true;
        } else $post['publish'] = false;
        $post->update($post_information);
        return redirect()->route('edit_post',$post['id'])->withSuccess(__('panel.postEdited'));
    }
    public function list()
    {
        return view('panel.postList')->with([
            'posts'=>post::get(['id','title','slug','user_id','category_id','publish','publish_date'])
        ]);
    }
    public function create(Request $req)
    {
        $post = $req->validate([
            'title'=>'required|string|max:50',
            'slug'=>'required|string|max:50|unique:posts,slug',
            'publish_date'=>'required',
            'content'=>'required|string',
            'category_id'=>'required|integer',
            'thumbnail'=>'file|mimes:jpeg,png,jpg,gif|max:2048',
            'meta_desc'=>'required|string|max:200'
        ]);
        if(!empty($req->thumbnail))
        {
            $file_name = uniqid().'.'.$req->file('thumbnail')->getClientOriginalExtension();
            Storage::putFileAs('public',$req->file('thumbnail'),$file_name);
            $post['thumbnail'] = $file_name;
        }
        if(!empty($req->publish))
        {
            $post['publish'] = true;
        } else $post['publish'] = false;
        $post['user_id'] = Auth::user()['id'];
        post::create($post);
        return redirect()->route('add_post')->withSuccess(__('panel.postCreated'));
    }
    public function delete(post $post)
    {
        $post->delete();
        return redirect()->route('list_post')->withSuccess(__('panel.postDeleted'));
    }
}
