<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\Menu;

class MainMenuMobileItem extends Component
{
    public $item_menumobi = null;
    public function __construct($itemmenumobi)
    {
        $this->item_menumobi = $itemmenumobi;
    }

    public function render(): View|Closure|string
    {
        $menumobi = $this->item_menumobi;
        $args_menumobi_sub = [
            ['status','!=',0],
            ['position','=','mainmenu'],
            ['parent_id','=',$menumobi->id]
        ];
        $listmenumobi_sub = Menu::where($args_menumobi_sub)
            ->orderBy('sort_order','ASC')
            ->get();
        return view('components.main-menu-mobile-item',compact('menumobi','listmenumobi_sub'));
    }
}
