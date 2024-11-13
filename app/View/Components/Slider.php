<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\Banner;

class Slider extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $args_banner = [
            ['status','=',1],
            ['position','=','slideshow']
        ];
        $listslider = Banner::where($args_banner)
            ->orderBy('created_at','DESC')
            ->get();
        return view('components.slider',compact('listslider'));
    }
}
