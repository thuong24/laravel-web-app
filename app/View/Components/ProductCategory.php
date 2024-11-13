<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\Category;
use App\Models\Product;


class ProductCategory extends Component
{
    public $item_row = null;
    public function __construct($itemrow)
    {
        $this->item_row = $itemrow;
    }

    public function render(): View|Closure|string
    {
        $item = $this->item_row;
        $listitemid = [];
        array_push($listitemid,$item->id);
        $listitem1 = Category::where([['parent_id','=',$item->id],['status','=',1]])
        ->select("id")->get();
        if(count($listitem1)>0)
        {
            foreach($listitem1 as $item1)
            {
                array_push($listitemid,$item1->id);
                $listitem2 = Category::where([['parent_id','=',$item1->id],['status','=',1]])
                ->select("id")->get();
                if(count($listitem2)>0)
                {
                    foreach($listitem2 as $item2)
                    {
                        array_push($listitemid,$item2->id);
                        $listitem3 = Category::where([['parent_id','=',$item2->id],['status','=',1]])
                        ->select("id")->get();
                        if(count($listitem3)>0)
                        {
                            foreach($listitem3 as $item3)
                            {
                                array_push($listitemid,$item3->id);
                            }
                        }
                    }
                }
            }
        }
        $list_product = Product::where('status','=',1)
        ->whereIn('category_id',$listitemid)
        ->orderBy('created_at','desc')
        ->limit(4)
        ->get();
        return view('components.product-category',compact('list_product'));
    }
}
