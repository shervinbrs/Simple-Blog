<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Models\widget;
use Illuminate\Http\Request;

class Widget_Cont extends Controller
{
    public function list()
    {
        return view('panel.widgetList')->with([
            'widgets'=>Widget::all()
        ]);
    }
    public function showWidget(Widget $widget)
    {
        return view('widget')->with([
            'widget'=>$widget
        ]);

    }
    public function showCreate()
    {
        return view('panel.createWidget');
    }
    public function create(Request $req)
    {
        $widget = $req->validate([
            'name'=>'required|string|max:30',
            'slug'=>'required|string|max:30|unique:widgets,slug',
            'icon'=>'required|string|max:30',
            'content'=>'required|string'
        ]);
        if(!empty($req->publish))
        {
            $post['active'] = true;
        } else $post['active'] = false;
        widget::create($widget);
        return redirect()->route('create_widget')->withSuccess(__('panel.widgetCreated'));
    }
    public function showEdit(Widget $widget)
    {
        return view('panel.editWidget')->with([
            'widget'=>$widget
        ]);
    }
    public function edit(Widget $widget,Request $req)
    {
        $widget_info = $req->validate([
            'name'=>'required|string|max:30',
            'slug'=>'required|string|max:30|unique:widgets,slug,'.$widget->id,
            'icon'=>'required|string|max:30',
            'content'=>'required|string'
        ]);
        if(!empty($req->publish))
        {
            $widget_info['active'] = true;
        } else $widget_info['active'] = false;
        $widget->update($widget_info);
        return redirect()->route('edit_widget',$widget->id)->withSuccess(__('panel.widgetEdited'));
    }
    public function delete(Widget $widget)
    {
        $widget->delete();
        return redirect()->route('list_widget')->withSuccess(__('panel.widgetDeleted'));
    }
}
