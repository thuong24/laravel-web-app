<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Pagination\Paginator;

class CategoryController extends Controller
{
    public function index()
    {
        $list_category = Category::where('status','!=',0)
            ->orderBy('created_at','DESC')
            ->select("id","name","slug","status","sort_order","parent_id","created_at")
            ->paginate(5);

        $sortorder = "";
        $parentid = "";
            foreach ($list_category as $item) {
                $sortorder .= "<option value='" . ($item->sort_order + 1) . "'>" . $item->name . "</option>";
                $parentid .= "<option value='" . $item->id . "'>" . $item->name . "</option>";
            }
        return view("backend.category.index",compact('list_category','sortorder','parentid'));
    }

    public function trash()
    {
        $list_category = Category::where('status','=',0)
            ->orderBy('created_at','DESC')
            ->select("id","name","slug","status","sort_order","parent_id","created_at")
            ->paginate(5);
        return view("backend.category.trash",compact('list_category'));
    }
    public function create()
    {
        //
    }

    public function store(StoreCategoryRequest $request)
    {
        $category = new Category();
        $category->name = $request->name;
        $category->slug = Str::of($request->name)->slug('-');
        $category->description = $request->description;
        $category->sort_order = $request->sort_order;
        $category->parent_id = $request->parent_id;
        $category->status = $request->status;
        $category->created_at = date('Y-m-d H:i:s');
        $category->created_by = Auth::id() ?? 1;
        $category->save();
        return redirect()->route('admin.category.index');
    }

    public function show(string $id)
    {
        $category = Category::find($id);
        if($category == null){
            return redirect()->route('admin.category.index');
        }
        return view("backend.category.show",compact('category'));
    }

    public function edit(string $id)
    {
        $category = Category::find($id);
        if($category == null){
            return redirect()->route('admin.category.index');
        }
        $list_category = Category::where('status','=',1)
            ->orderBy('created_at','DESC')
            ->select("id","name","sort_order")
            ->get();

        $sortorder = "";
        $parentid = "";
            foreach ($list_category as $item) {
                if($category->parent_id == $item->id){
                    $parentid .= "<option selected value='" . $item->id . "'>" . $item->name . "</option>";
                }else{
                    $parentid .= "<option value='" . $item->id . "'>" . $item->name . "</option>";
                }
                if($category->sort_order-1 == $item->sort_order){
                    $sortorder .= "<option selected value='" . ($item->sort_order + 1) . "'>" . $item->name . "</option>";
                }else{
                    $sortorder .= "<option value='" . ($item->sort_order + 1) . "'>" . $item->name . "</option>";
                }
            }
        return view("backend.category.edit",compact('sortorder','parentid','category'));
    }

    public function update(UpdateCategoryRequest $request, string $id)
    {
        $category = Category::find($id);
        if($category == null){
            return redirect()->route('admin.category.index');
        }
        $category->name = $request->name;
        $category->slug = Str::of($request->name)->slug('-');
        $category->description = $request->description;
        $category->sort_order = $request->sort_order;
        $category->parent_id = $request->parent_id;
        $category->status = $request->status;
        $category->updated_at = date('Y-m-d H:i:s');
        $category->updated_by = Auth::id() ?? 1;
        $category->save();
        return redirect()->route('admin.category.index');
    }

    public function destroy(string $id)
    {
        $category = Category::find($id);
        if($category == null){
            return redirect()->route('admin.category.index');
        }
        $category->delete();
        return redirect()->route('admin.category.trash');
    }

    public function status(string $id)
    {
        $category = Category::find($id);
        if($category == null){
            return redirect()->route('admin.category.index');
        }
        $category->status = ($category->status == 1) ? 2 : 1;
        $category->updated_at = date('Y-m-d H:i:s');
        $category->updated_by = Auth::id() ?? 1;
        $category->save();
        return redirect()->route('admin.category.index');
    }
    public function delete(string $id)
    {
        $category = Category::find($id);
        if($category == null){
            return redirect()->route('admin.category.index');
        }
        $category->status = 0;
        $category->updated_at = date('Y-m-d H:i:s');
        $category->updated_by = Auth::id() ?? 1;
        $category->save();
        return redirect()->route('admin.category.index');
    }
    public function restore(string $id)
    {
        $category = Category::find($id);
        if($category == null){
            return redirect()->route('admin.category.index');
        }
        $category->status = 2;
        $category->updated_at = date('Y-m-d H:i:s');
        $category->updated_by = Auth::id() ?? 1;
        $category->save();
        return redirect()->route('admin.category.trash');
    }
    // public function bulkAction(Request $request)
    // {
    //     $ids = $request->input('ids');
    //     $action = $request->input('bulk_action');

    //     if (empty($ids) || empty($action)) {
    //         return redirect()->route('admin.category.index')->with('error', 'Chưa chọn danh mục hoặc hành động.');
    //     }

    //     switch ($action) {
    //         case 'update':
    //             foreach ($ids as $id) {
    //                 $category = category::find($id);
    //                 if ($category != null) {
    //                     $category->status = ($category->status == 1) ? 2 : 1;
    //                     $category->updated_at = now();
    //                     $category->updated_by = Auth::id() ?? 1;
    //                     $category->save();
    //                 }
    //             }
    //             return redirect()->route('admin.category.index')->with('success', 'Cập nhật trạng thái thành công.');

    //         case 'delete':
    //             foreach ($ids as $id) {
    //                 $category = category::find($id);
    //                 if ($category != null) {
    //                     $category->status = 0;
    //                     $category->updated_at = now();
    //                     $category->updated_by = Auth::id() ?? 1;
    //                     $category->save();
    //                 }
    //             }
    //             return redirect()->route('admin.category.index')->with('success', 'Xóa danh mục thành công.');

    //         default:
    //             return redirect()->route('admin.category.index')->with('error', 'Hành động không hợp lệ.');
    //     }
    // }

}
