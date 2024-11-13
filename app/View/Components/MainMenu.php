<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\Menu;

class MainMenu extends Component
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
        $args_menu = [
            ['status','=',1],
            ['position','=','mainmenu'],
            ['parent_id','=',0]
        ];
        $listmenu = Menu::where($args_menu)
            ->orderBy('sort_order','ASC')
            ->get();
        return view('components.main-menu',compact('listmenu'));
    }
}
