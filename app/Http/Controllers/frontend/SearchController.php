<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Brand;


class SearchController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->input('query');

        // Tìm kiếm sản phẩm
        $products = Product::where('name', 'LIKE', "%$query%")
                            ->orWhere('description', 'LIKE', "%$query%")
                            ->get();

        // Tìm kiếm thương hiệu
        $brands = Brand::where('name', 'LIKE', "%$query%")->get();

        return view('frontend.search', compact('products', 'brands', 'query'));
    }
    public function searchproduct(Request $request)
    {
        $query = $request->input('searchproduct');
        $sort_by = $request->input('sort_by');
        $brand = $request->input('brand');
        $price_min = $request->input('price_min');
        $price_max = $request->input('price_max');

        $products = Product::query();

        if ($query) {
            $products = $products->where('name', 'LIKE', "%$query%");
        }

        if ($brand) {
            $products = $products->where('brand_id', $brand);
        }

        if ($price_min) {
            $products = $products->where('price', '>=', $price_min);
        }

        if ($price_max) {
            $products = $products->where('price', '<=', $price_max);
        }

        if ($sort_by) {
            switch ($sort_by) {
                case 'price_asc':
                    $products = $products->orderBy('price', 'asc');
                    break;
                case 'price_desc':
                    $products = $products->orderBy('price', 'desc');
                    break;
                case 'name_asc':
                    $products = $products->orderBy('name', 'asc');
                    break;
                case 'name_desc':
                    $products = $products->orderBy('name', 'desc');
                    break;
            }
        }

        $products = $products->get();

        $brands = Brand::all(); // Lấy tất cả các thương hiệu để hiển thị trong phần lọc

        return view('frontend.searchproduct', compact('products', 'brands', 'query', 'sort_by', 'brand', 'price_min', 'price_max'));
    }
}
