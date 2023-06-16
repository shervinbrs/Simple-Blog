<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Models\message;
use Illuminate\Http\Request;

class Blog_Widget extends Controller
{
    public function showContact()
    {
        return view('contact');
    }
    public function saveMessage(Request $req)
    {
        $message = $req->validate(
            [
                'name'=>'required|string|max:30',
                'email'=>'required|email|max:100',
                'message'=>'required|string|max:1000'
            ]);
            $message['date'] = \Morilog\Jalali\Jalalian::forge('today')->format('Y/m/d');
        message::create($message);
        return redirect()->route('contact')->withSuccess(__('blog.messageSent'));
    }
}
