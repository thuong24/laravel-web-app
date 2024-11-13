<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\Product;

class ProductSale extends Component
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
        $args_sale = [
            ['status','=',1],
            ['pricesale','>',0]
        ];
        $listproduct_sale = Product::where($args_sale)
            ->orderBy('created_at','desc')
            ->limit(20)
            ->get();
        return view('components.product-sale',compact('listproduct_sale'));
    }
}
