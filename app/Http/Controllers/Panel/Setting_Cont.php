<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Models\setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class Setting_Cont extends Controller
{
    public function showSetting()
    {
        return view('panel.setting')->with([
            'setting'=>[
                'title'=>Setting::where('option','title')->first(['value'])['value']
            ]
        ]);
    }
    public function saveSetting(Request $req)
    {
        $req->validate([
            'title'=>'required|string|max:30',
            'logo'=>'file|mimes:jpeg,png,jpg|max:2048',
            'favicon'=>'file|mimes:ico|max:2048'
        ]);
        if(!empty($req->logo))
        {
            $filename = 'logo.'.$req->file('logo')->getClientOriginalExtension();
            $logo = Setting::where('option','logo')->first(['value'])['value'];
            Storage::disk('public')->delete($logo);
            Storage::putFileAs('public',$req->file('logo'),'logo.'.$req->file('logo')->getClientOriginalExtension());
            Setting::where('option','logo')->update(['value'=>$filename]);
        }
        if(!empty($req->favicon))
        {
            Storage::disk('public')->delete('favicon.ico');
            Storage::putFileAs('public',$req->file('favicon'),'favicon.ico');
        }
        Setting::where('option','title')->update(['value'=>$req->title]);
        return redirect()->route('setting')->withSuccess(__('panel.settingSaved'));
    }
}
