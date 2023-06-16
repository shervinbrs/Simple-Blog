<?php
use App\Http\Controllers\Panel\Post_Cont;
use App\Http\Controllers\Panel\Category_Cont;
use App\Http\Controllers\Panel\User_Cont;
use App\Http\Controllers\Panel\Message_Cont;
use App\Http\Controllers\Panel\Setting_Cont;
use App\Http\Controllers\Panel\Widget_Cont;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;


Route::middleware(['auth'])->group(function()
{
    //create post
    Route::get('/admin/post/create',[Post_Cont::class,'showCreate'])->name('add_post');
    Route::post('/admin/post/create',[Post_Cont::class,'create']);
    //show posts
    Route::get('/admin/post/list',[Post_Cont::class,'list'])->name('list_post');
    // edit post
    Route::get('/admin/post/edit/{post:id}',[Post_Cont::class,'showEdit'])->name('edit_post');
    Route::post('/admin/post/edit/{post:id}',[Post_Cont::class,'edit']);
    //delete post
    Route::get('/admin/post/delete/{post:id}',[Post_Cont::class,'delete']);


    //show categories
    Route::get('/admin/category/list',[Category_Cont::class,'list'])->name('list_category');
    //create category
    Route::get('/admin/category/create',[Category_Cont::class,'showCreate'])->name('add_category');
    Route::post('/admin/category/create',[Category_Cont::class,'create']);
    //edit category
    Route::get('/admin/category/edit/{category:id}',[Category_Cont::class,'showEdit'])->name('edit_category');
    Route::post('/admin/category/edit/{category:id}',[Category_Cont::class,'edit']);
    //delete category
    Route::get('/admin/category/delete/{category:id}',[Category_Cont::class,'delete']);

    
    // show users
    Route::get('/admin/user/list',[User_Cont::class,'list'])->name('list_user');
    // create user
    Route::get('/admin/user/create',[User_Cont::class,'showCreate'])->name('create_user');
    Route::post('/admin/user/create',[User_Cont::class,'create']);
    //edit user
    Route::get('/admin/user/edit/{user:id}',[User_Cont::Class,'showEdit'])->name('edit_user');
    Route::post('/admin/user/edit/{user:id}',[User_Cont::class,'edit']);
    //delete user
    Route::get('/admin/user/delete/{user:id}',[User_Cont::class,'delete']);


    // show messages
    Route::get('/admin/message/list',[Message_Cont::class,'list'])->name('list_message');
    //delete message
    Route::get('/admin/message/delete/{message:id}',[Message_Cont::class,'delete']);
    //show single message
    Route::get('/admin/message/show/{message:id}',[Message_Cont::class,'showMessage']);


    // show setting
    Route::get('/admin/setting',[Setting_Cont::class,'showSetting'])->name('setting');
    // save setting
    Route::post('/admin/setting',[Setting_Cont::class,'saveSetting']);

    // show widgets
    Route::get('/admin/widget/list',[Widget_Cont::class,'list'])->name('list_widget');
    //create widget
    Route::get('/admin/widget/create',[Widget_Cont::class,'showCreate'])->name('create_widget');
    Route::post('/admin/widget/create',[Widget_Cont::class,'create']);
    // edit widget
    Route::get('/admin/widget/edit/{widget:id}',[Widget_Cont::class,'showEdit'])->name('edit_widget');
    Route::post('/admin/widget/edit/{widget:id}',[Widget_Cont::class,'edit']);
    // delete widget
    Route::get('/admin/widget/delete/{widget:id}',[Widget_Cont::class,'delete']);
});