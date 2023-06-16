<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Models\post;
use App\Models\category;
use App\Models\User;
use App\Models\message;
use Illuminate\Http\Request;

class Dashboard extends Controller
{
    public function index()
    {
        return view('panel.index')->with([
            'information'=>[
                'posts'=>Post::count(),
                'users'=>User::count(),
                'categories'=>Category::count(),
                'messages'=>message::count()
            ]
        ]);
    }
}
