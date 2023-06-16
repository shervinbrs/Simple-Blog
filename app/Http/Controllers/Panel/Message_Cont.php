<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Models\message;
use Illuminate\Http\Request;

class Message_Cont extends Controller
{
    public function list()
    {
        return view('panel.messageList')->with([
            'messages'=>message::orderBy('id','desc')->get(['id','name','email','date','seen'])
        ]);
    }
    public function delete(message $message)
    {
        $message->delete();
        return redirect()->route('list_message')->withSuccess(__('panel.messageDeleted'));
    }
    public function showMessage(message $message)
    {
    ($message->seen == false)? $message->update(['seen'=>true]):'';
        return view('panel.single-message')->with([
            'message'=>$message
        ]);
    }
}
