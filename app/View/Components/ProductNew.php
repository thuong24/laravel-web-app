<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\Product;

class ProductNew extends Component
{
    public function __construct()
    {
        //
    }

    public function render(): View|Closure|string
    {
        $listproduct_new = Product::where('status','=',1)
            ->orderBy('created_at','desc')
            ->limit(12)
            ->get();
        return view('components.product-new',compact('listproduct_new'));
    }
}
