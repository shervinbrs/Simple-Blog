<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Setting;
use App\Models\Widget;

class navbar extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $option = Setting::where([['id','<=','2']])->get(['value']);
        $widgets = Widget::where('active',true)->get(['icon','name','slug']);
        return view('components.navbar')->with([
            'logo'=>$option[1]['value'],
            'title'=>$option[0]['value'],
            'widgets'=>$widgets
        ]);
    }
}
