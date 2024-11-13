<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreBrandRequest;
use App\Http\Requests\UpdateBrandRequest;
use App\Models\Brand;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Pagination\Paginator;

class BrandController extends Controller
{
    public function index()
    {
        $list_brand = Brand::where('status','!=',0)
            ->select("id","image","name","slug","status","sort_order")
            ->orderBy('created_at','DESC')
            ->paginate(5);
        $sortorder = "";
        foreach ($list_brand as $item) {
            $sortorder .= "<option value='" . ($item->sort_order + 1) . "'>" . $item->name . "</option>";
        }
        return view("backend.brand.index",compact('list_brand','sortorder'));
    }

    public function trash()
    {
        $list_brand = Brand::where('status','=',0)
            ->select("id","image","name","slug","status","sort_order")
            ->orderBy('created_at','DESC')
            ->paginate(5);
        return view("backend.brand.trash",compact('list_brand'));
    }

    public function store(StoreBrandRequest $request)
    {
        $brand = new Brand();
        $brand->name = $request->name;
        $brand->slug = Str::of($request->name)->slug('-');
        $brand->description = $request->description;
        $brand->sort_order = $request->sort_order;

        if($request->image){
            $exten = $request->file("image")->extension();
            if(in_array($exten,["png", "jpg", "gif", "webp", "jfif"]))
            {
                $filename = $brand->slug . "." . $exten;
                $request->image->move(public_path("images/brands"), $filename);
                $brand->image = $filename;
            }
        }

        $brand->status = $request->status;
        $brand->created_at = date('Y-m-d H:i:s');
        $brand->created_by = Auth::id() ?? 1;
        $brand->save();
        return redirect()->route('admin.brand.index');
    }

    public function show(string $id)
    {
        $brand = Brand::find($id);
        if($brand == null){
            return redirect()->route('admin.brand.index');
        }
        return view("backend.brand.show",compact('brand'));
    }

    public function edit(string $id)
    {
        $brand = Brand::find($id);
        if($brand == null){
            return redirect()->route('admin.brand.index');
        }
        $list_brand = Brand::where('status','=',1)
            ->select("id","image","name","slug","status","sort_order")
            ->orderBy('created_at','DESC')
            ->get();
        $sortorder = "";
            foreach ($list_brand as $item) {
                if($brand->sort_order-1 == $item->sort_order){
                    $sortorder .= "<option selected value='" . ($item->sort_order + 1) . "'>" . $item->name . "</option>";
                }else{
                    $sortorder .= "<option value='" . ($item->sort_order + 1) . "'>" . $item->name . "</option>";
                }
            }
        return view("backend.brand.edit",compact('brand','sortorder'));
    }

    public function update(UpdateBrandRequest $request, string $id)
    {
        $brand = Brand::find($id);
        if($brand == null){
            return redirect()->route('admin.brand.index');
        }
        $brand->name = $request->name;
        $brand->slug = Str::of($request->name)->slug('-');
        $brand->description = $request->description;
        $brand->sort_order = $request->sort_order;

        if($request->image){
            $exten = $request->file("image")->extension();
            if(in_array($exten,["png", "jpg", "gif", "webp", "jfif"]))
            {
                $filename = $brand->slug . "." . $exten;
                $request->image->move(public_path("images/brands"), $filename);
                $brand->image = $filename;
            }
        }

        $brand->status = $request->status;
        $brand->updated_at = date('Y-m-d H:i:s');
        $brand->updated_by = Auth::id() ?? 1;
        $brand->save();
        return redirect()->route('admin.brand.index');
    }

    public function destroy(string $id)
    {
        $brand = Brand::find($id);
        if($brand == null){
            return redirect()->route('admin.brand.index');
        }
        $brand->delete();
        return redirect()->route('admin.brand.trash');
    }
    public function status(string $id)
    {
        $brand = Brand::find($id);
        if($brand == null){
            return redirect()->route('admin.brand.index');
        }
        $brand->status = ($brand->status == 1) ? 2 : 1;
        $brand->updated_at = date('Y-m-d H:i:s');
        $brand->updated_by = Auth::id() ?? 1;
        $brand->save();
        return redirect()->route('admin.brand.index');
    }
    public function delete(string $id)
    {
        $brand = Brand::find($id);
        if($brand == null){
            return redirect()->route('admin.brand.index');
        }
        $brand->status = 0;
        $brand->updated_at = date('Y-m-d H:i:s');
        $brand->updated_by = Auth::id() ?? 1;
        $brand->save();
        return redirect()->route('admin.brand.index');
    }
    public function restore(string $id)
    {
        $brand = Brand::find($id);
        if($brand == null){
            return redirect()->route('admin.brand.index');
        }
        $brand->status = 2;
        $brand->updated_at = date('Y-m-d H:i:s');
        $brand->updated_by = Auth::id() ?? 1;
        $brand->save();
        return redirect()->route('admin.brand.trash');
    }


}
