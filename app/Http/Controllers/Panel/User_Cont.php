<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class User_Cont extends Controller
{
    public function showCreate()
    {
        return view('panel.createUser');
    }
    public function showEdit(User $user)
    {
        return view('panel.editUser')->with([
            'user'=>$user
        ]);
    }
    public function list()
    {
        return view('panel.userList')->with([
            'users'=>User::get(['id','name','email'])
        ]);
    }
    public function delete(User $user)
    {
        if($user->id == Auth::user()['id'])
        {
            return redirect()->route('list_user')->withErrors([__('panel.selfDelete')]);
        }
        $user->delete();
        Post::where('user_id',$user->id)->update([
            'publish'=>false
        ]
        );
        return redirect()->route('list_user')->withSuccess(__('panel.userDeleted'));
    }
    public function create(Request $req)
    {
        $user_information = $req->validate([
            'name'=>'required|string|max:50',
            'email'=>'required|string|max:100',
            'password'=>'required|string'
        ]);
        $user_information['password'] =  Hash::make($user_information['password']);
        User::create($user_information);
        return redirect()->route('create_user')->withSuccess(__('panel.userCreated'));
    }
    public function edit(User $user,Request $req)
    {
        $user_information = $req->validate([
            'name'=>'required|string|max:50',
            'email'=>'required|string|max:100',
        ]);
        if(!empty($req->password))
        $user_information['password'] =  Hash::make($req->password);
        $user->update($user_information);
        return redirect()->route('edit_user',$user->id)->withSuccess(__('panel.userEdited'));
    }
}
