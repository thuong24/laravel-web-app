<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;

class ProductController extends Controller
{
    public function index()
    {
        $product_list = Product::where('status','=',1)
            ->orderBy('created_at','DESC')
            ->paginate(12);
        $list_category = Category::where('status','=',1)
            ->orderBy('created_at','DESC')
            ->select("id","name","slug")
            ->get();
        $list_brand = Brand::where('status','=',1)
            ->orderBy('created_at','DESC')
            ->select("id","name","slug")
            ->get();
        return view('frontend.product',compact('product_list','list_category', 'list_brand'));
    }
    private function buildTree($elements, $parentId = 0) {
        $branch = array();

        foreach ($elements as $element) {
            if ($element->parent_id == $parentId) {
                $children = $this->buildTree($elements, $element->id);
                if ($children) {
                    $element->children = $children;
                }
                $branch[] = $element;
            }
        }

        return $branch;
    }

    public function getlistcategoryid($rowid)
    {
        $listcatid = [];
            array_push($listcatid,$rowid);
            $list1 = Category::where([['parent_id','=',$rowid],['status','=',1]])
                ->select("id")
                ->get();
            if(count($list1)>0){
                foreach($list1 as $row1)
                {
                    array_push($listcatid,$row1->id);
                    $list2 = Category::where([['parent_id','=',$row1->id],['status','=',1]])
                        ->select("id")
                        ->get();
                        if(count($list2)>0){
                            foreach($list2 as $row2)
                            {
                                array_push($listcatid,$row2->id);
                            }
                        }
                }
            }
        return $listcatid;
    }
    public function category($slug)
    {
        $row = Category::where([['slug','=',$slug],['status','=',1]])->select("id","slug")->first();
        $listcatid = [];
        if($row != null)
        {
            $listcatid = $this->getlistcategoryid($row->id);
        }
        $product_list = Product::where('status','=',1)
            ->whereIn('category_id',$listcatid)
            ->orderBy('created_at','DESC')
            ->paginate(12);
        $list_category = Category::where('status','=',1)
            ->orderBy('created_at','DESC')
            ->select("id","name","slug")
            ->get();
        return view('frontend.product_category',compact('product_list','row','list_category'));
    }

    public function product_detail($slug)
    {
        $product = Product::where([['slug','=',$slug],['status','=',1]])->first();
        $listcatid = $this->getlistcategoryid($product->category_id);
        $product_list = Product::where([['status','=',1],['id','!=',$product->id]])
            ->whereIn('category_id',$listcatid)
            ->orderBy('created_at','DESC')
            ->limit(8)
            ->get();
        return view('frontend.product_detail',compact('product','product_list'));
    }

    public function brand($slug)
    {
        $row_brand = Brand::where([['slug','=',$slug],['status','=',1]])->select("id","slug")->first();
        $product_list = Product::where([['status','=',1],['brand_id','=',$row_brand->id]])
            ->orderBy('created_at','DESC')
            ->paginate(12);
        $list_brand = Brand::where('status','=',1)
            ->orderBy('created_at','DESC')
            ->select("id","name","slug")
            ->get();
        return view('frontend.product_brand',compact('product_list','row_brand','list_brand'));
    }
}
