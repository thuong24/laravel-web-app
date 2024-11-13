<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\Menu;

class MainMenuItem extends Component
{
    public $item_menu = null;
    public function __construct($itemmenu)
    {
        $this->item_menu = $itemmenu;
    }

    public function render(): View|Closure|string
    {
        $menu = $this->item_menu;
        $args_menu_sub = [
            ['status','!=',0],
            ['position','=','mainmenu'],
            ['parent_id','=',$menu->id]
        ];
        $listmenu_sub = Menu::where($args_menu_sub)
            ->orderBy('sort_order','ASC')
            ->get();
        return view('components.main-menu-item',compact('menu','listmenu_sub'));
    }
}
