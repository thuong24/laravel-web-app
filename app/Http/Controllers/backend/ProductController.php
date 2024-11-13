<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use App\Http\Requests\StoreProductRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Pagination\Paginator;

class ProductController extends Controller
{

    public function index()
    {
        $list_product = Product::where('product.status','!=',0)
            ->leftJoin('category','product.category_id','=','category.id')
            ->leftJoin('brand','product.brand_id','=','brand.id')
            ->select("product.id","product.image","product.name","product.price","product.status","category.name as categoryname","brand.name as brandname","product.created_at")
            ->orderBy('product.created_at','DESC')
            ->paginate(5);
        return view("backend.product.index", compact('list_product'));
    }
    public function trash()
    {
        $list_product = Product::where('product.status','=',0)
            ->leftJoin('category','product.category_id','=','category.id')
            ->leftJoin('brand','product.brand_id','=','brand.id')
            ->select("product.id","product.image","product.name","product.price","product.status","category.name as categoryname","brand.name as brandname","product.created_at")
            ->orderBy('product.created_at','DESC')
            ->paginate(5);
        return view("backend.product.trash",compact('list_product'));
    }

    public function create()
    {
        $category = Category::where('status','!=',0);
        $band = Brand::where('status','!=',0);
        $categoryid = "";
        $brandid = "";
        foreach ($category as $item_cate) {
            $categoryid .= "<option value='" . $item_cate->id . "'>" . $item_cate->name . "</option>";
        }
        foreach ($band as $item_brands) {
            $brandid .= "<option value='" . $item_brands->id . "'>" . $item_brands->name . "</option>";
        }
        return view("backend.product.create", compact('categoryid','brandid'));
    }

    public function store(StoreProductRequest $request)
    {
        $product = new Product();
        $product->name = $request->name;
        $product->detail = $request->detail;
        $product->slug = Str::of($request->name)->slug('-');
        $product->description = $request->description;
        $product->category_id = $request->category_id;
        $product->brand_id = $request->brand_id;

        if($request->image){
            $exten = $request->file("image")->extension();
            if(in_array($exten,["png", "jpg", "gif", "webp", "jfif"]))
            {
                $filename = $product->slug . "." . $exten;
                $request->image->move(public_path("images/products"), $filename);
                $product->image = $filename;
            }
        }

        $product->status = $request->status;
        $product->price = $request->price;
        $product->pricesale = $request->pricesale;
        $product->qty = $request->qty;
        $product->created_at = date('Y-m-d H:i:s');
        $product->created_by = Auth::id() ?? 1;
        $product->save();
        return redirect()->route('admin.product.index');
    }


    public function show(string $id)
    {
        $product = Product::find($id);
        if ($product == null) {
            return redirect()->route('admin.product.index');
        }
        $list_category = Category::where('status','!=',0)
            ->orderBy('created_at','DESC')
            ->select("id","name")
            ->get();
        $list_brand = Brand::where('status','!=',0)
            ->orderBy('created_at','DESC')
            ->select("id","name")
            ->get();
        return view("backend.product.show",compact('product','list_category','list_brand'));
    }

    public function edit(string $id)
    {
        $product = Product::find($id);
        if ($product == null) {
            return redirect()->route('admin.product.index');
        }

        $categorys = Category::where('status', '!=', 0)->orderBy('created_at', 'DESC')->get();
        $brands = Brand::where('status', '!=', 0)->orderBy('created_at', 'DESC')->get();

        return view('backend.product.edit', compact('product', 'categorys', 'brands'));
    }

    public function update(Request $request, string $id)
    {
        $product = Product::find($id);
        if ($product == null) {
            return redirect()->route('admin.product.index');
        }

        $product->name = $request->name;
        $product->detail = $request->detail;
        $product->slug = Str::of($request->name)->slug('-');
        $product->description = $request->description;
        $product->category_id = $request->category_id;
        $product->brand_id = $request->brand_id;

        if ($request->image) {
            $exten = $request->file("image")->extension();
            if (in_array($exten, ["png", "jpg", "gif", "webp", "jfif"])) {
                $filename = $product->slug . "." . $exten;
                $request->image->move(public_path("images/products"), $filename);
                $product->image = $filename;
            }
        }

        $product->status = $request->status;
        $product->price = $request->price;
        $product->pricesale = $request->pricesale;
        $product->qty = $request->qty;
        $product->updated_at = date('Y-m-d H:i:s');
        $product->updated_by = Auth::id() ?? 1;
        $product->save();

        return redirect()->route('admin.product.index');
    }

    public function destroy(string $id)
    {
        $product = Product::find($id);
        if ($product == null) {
            return redirect()->route('admin.product.index');
        }
        $product->delete();
        return redirect()->route('admin.product.trash');
    }
    public function status(string $id)
    {
        $product = Product::find($id);
        if ($product == null) {
            return redirect()->route('admin.product.index');
        }
        $product->status = ($product->status == 1) ? 2 : 1;
        $product->updated_at = date('Y-m-d H:i:s');
        $product->updated_by = Auth::id() ?? 1;
        $product->save();
        return redirect()->route('admin.product.index');
    }
    public function delete(string $id)
    {
        $product = Product::find($id);
        if ($product == null) {
            return redirect()->route('admin.product.index');
        }
        $product->status = 0;
        $product->updated_at = date('Y-m-d H:i:s');
        $product->updated_by = Auth::id() ?? 1;
        $product->save();
        return redirect()->route('admin.product.index');
    }
    public function restore(string $id)
    {
        $product = Product::find($id);
        if ($product == null) {
            return redirect()->route('admin.product.index');
        }
        $product->status = 2;
        $product->updated_at = date('Y-m-d H:i:s');
        $product->updated_by = Auth::id() ?? 1;
        $product->save();
        return redirect()->route('admin.product.trash');
    }
    // public function bulkAction(Request $request)
    // {
    //     $ids = $request->input('ids');
    //     $action = $request->input('bulk_action');

    //     if (empty($ids) || empty($action)) {
    //         return redirect()->route('admin.product.index')->with('error', 'Chưa chọn sản phẩm hoặc hành động.');
    //     }

    //     switch ($action) {
    //         case 'update':
    //             foreach ($ids as $id) {
    //                 $product = Product::find($id);
    //                 if ($product != null) {
    //                     $product->status = ($product->status == 1) ? 2 : 1;
    //                     $product->updated_at = now();
    //                     $product->updated_by = Auth::id() ?? 1;
    //                     $product->save();
    //                 }
    //             }
    //             return redirect()->route('admin.product.index')->with('success', 'Cập nhật trạng thái thành công.');

    //         case 'delete':
    //             foreach ($ids as $id) {
    //                 $product = Product::find($id);
    //                 if ($product != null) {
    //                     $product->status = 0;
    //                     $product->updated_at = now();
    //                     $product->updated_by = Auth::id() ?? 1;
    //                     $product->save();
    //                 }
    //             }
    //             return redirect()->route('admin.product.index')->with('success', 'Xóa sản phẩm thành công.');

    //         default:
    //             return redirect()->route('admin.product.index')->with('error', 'Hành động không hợp lệ.');
    //     }
    // }

}
