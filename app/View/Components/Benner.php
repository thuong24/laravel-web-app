<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\Banner;

class Benner extends Component
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
        $args_benner = [
            ['status','=',1],
            ['position','=','banner']
        ];
        $listbenner = Banner::where($args_benner)
            ->orderBy('created_at','DESC')
            ->limit(5)
            ->get();
        return view('components.benner',compact('listbenner'));
    }
}
