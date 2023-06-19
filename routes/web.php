<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Blog\Blog_Post;
use App\Http\Controllers\Blog\Blog_Widget;
use App\Http\Controllers\Panel\Widget_Cont;
use App\Http\Controllers\Panel\Dashboard;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',function()
{
    return view('home');
})->name('home');

Route::get('/post/{post:slug}',[Blog_Post::class,'showPost']);
Route::get('/contact',[Blog_Widget::class,'showContact']);
Route::post('/contact',[Blog_Widget::class,'saveMessage'])->name('contact');
Route::get('/w/{widget:slug}',[Widget_Cont::class,'showWidget']);
Route::get('/sitemap.xml',[Blog_Post::class,'showSiteMap']);

Route::get('/admin',[Dashboard::class,'index'])->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

//admin panel routes
require __DIR__.'/panel.php';