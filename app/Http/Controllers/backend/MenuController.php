<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Topic;
use App\Models\Post;
use App\Http\Requests\StoreMenuRequest;
use App\Http\Requests\UpdateMenuRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Pagination\Paginator;

class MenuController extends Controller
{
    public function index()
    {
        $list_menu = Menu::where('status','!=',0)
            ->orderBy('created_at','DESC')
            ->select("id","name","link","position","status","sort_order","parent_id")
            ->paginate(5);
        $list_category = Category::where('status','!=',0)
            ->orderBy('created_at','DESC')
            ->select("id","name","sort_order","parent_id")
            ->get();
        $list_brand = Brand::where('status','!=',0)
            ->orderBy('created_at','DESC')
            ->select("id","name","sort_order")
            ->get();
        $list_topic = Topic::where('status','!=',0)
            ->orderBy('created_at','DESC')
            ->select("id","name","sort_order")
            ->get();
        $list_page = Post::where([['status','!=',0],['type','=','page']])
            ->orderBy('created_at','DESC')
            ->select("id","title")
            ->get();
        return view("backend.menu.index", compact('list_menu','list_category','list_brand','list_topic','list_page'));
    }
    public function trash()
    {
        $list_menu = Menu::where('status','!=',0)
            ->orderBy('created_at','DESC')
            ->select("id","name","link","position","status","sort_order","parent_id")
            ->paginate(5);
        return view("backend.menu.trash",compact('list_menu'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        if(isset($request->createCategory)) {
            $listid = $request->categoryid;
            if($listid){
                foreach($listid as $id){
                    $category = Category::find($id);
                    if($category != null){
                        $menu = new Menu();
                        $menu->name = $category->name;
                        $menu->link = 'Laravel_phanngocthuong/public/danh-muc/' .$category->slug;
                        $menu->sort_order = $category->sort_order;
                        $menu->parent_id = $category->parent_id;
                        $menu->type = 'category';
                        $menu->position = $request->position;
                        $menu->table_id = $id;
                        $menu->created_at = date('Y-m-d H:i:s');
                        $menu->created_by = Auth::id() ?? 1;
                        $menu->status = $request->status;
                        $menu->save();
                    }
                }
                return redirect()->route('admin.menu.index');
            }else{
            echo "khong co";
        }
    }
        if(isset($request->createBrand)) {
            $listid = $request->brandid;
            if($listid){
                foreach($listid as $id){
                    $brand = Brand::find($id);
                    if($brand != null){
                        $menu = new Menu();
                        $menu->name = $brand->name;
                        $menu->link = 'Laravel_phanngocthuong/public/thuong-hieu/' .$brand->slug;
                        $menu->sort_order = 0;
                        $menu->parent_id = 0;
                        $menu->type = 'brand';
                        $menu->position = $request->position;
                        $menu->table_id = $id;
                        $menu->created_at = date('Y-m-d H:i:s');
                        $menu->created_by = Auth::id() ?? 1;
                        $menu->status = $request->status;
                        $menu->save();
                    }
                }
                return redirect()->route('admin.menu.index');
            }else {
            echo "khong co";
        }
    }
        if(isset($request->createTopic)) {
            $listid = $request->topicid;
            if($listid){
                foreach($listid as $id){
                    $topic = Topic::find($id);
                    if($topic != null){
                        $menu = new Menu();
                        $menu->name = $topic->name;
                        $menu->link = 'Laravel_phanngocthuong/public/chu-de/' .$topic->slug;
                        $menu->sort_order = 0;
                        $menu->parent_id = 0;
                        $menu->type = 'topic';
                        $menu->position = $request->position;
                        $menu->table_id = $id;
                        $menu->created_at = date('Y-m-d H:i:s');
                        $menu->created_by = Auth::id() ?? 1;
                        $menu->status = $request->status;
                        $menu->save();
                    }

                }
                return redirect()->route('admin.menu.index');
            }else {
            echo "khong co";
        }
    }
        if(isset($request->createPage)) {
            $listid = $request->pageid;
            if($listid){
                foreach($listid as $id){
                    $page = Post::where([['id','=',$id], ['type','=','page']])->first();
                    if($page != null){
                        $menu = new Menu();
                        $menu->name = $page->title;
                        $menu->link = 'trang-don/' .$page->slug;
                        $menu->sort_order = 0;
                        $menu->parent_id = 0;
                        $menu->type = 'page';
                        $menu->position = $request->position;
                        $menu->table_id = $id;
                        $menu->created_at = date('Y-m-d H:i:s');
                        $menu->created_by = Auth::id() ?? 1;
                        $menu->status = $request->status;
                        $menu->save();
                    }
                }
                return redirect()->route('admin.menu.index');
            }else {
            echo "khong co";
        }
    }
        if(isset($request->createCustom)) {
            if(isset($request->name, $request->link)){
                $menu = new Menu();
                        $menu->name = $request->name;
                        $menu->link = $request->link;
                        $menu->sort_order = 0;
                        $menu->parent_id = 0;
                        $menu->type = 'custom';
                        $menu->position = $request->position;
                        $menu->created_at = date('Y-m-d H:i:s');
                        $menu->created_by = Auth::id() ?? 1;
                        $menu->status = $request->status;
                        $menu->save();
            }

        }
        return redirect()->route('admin.menu.index');
    }

    public function show(string $id)
    {
        $menu = Menu::find($id);
        if($menu == null){
            return redirect()->route('admin.menu.index');
        }
        return view("backend.menu.show",compact('menu'));
    }

    public function edit(string $id)
    {
        $menu = Menu::find($id);
        if($menu == null){
            return redirect()->route('admin.menu.index');
        }
        $list_category = Category::where('status', '!=', 0)->orderBy('created_at', 'DESC')->select('id', 'name', 'sort_order', 'parent_id')->get();
        $list_brand = Brand::where('status', '!=', 0)->orderBy('created_at', 'DESC')->select('id', 'name')->get();
        $list_topic = Topic::where('status', '!=', 0)->orderBy('created_at', 'DESC')->select('id', 'name')->get();
        $list_page = Post::where('status', '!=', 0)->orderBy('created_at', 'DESC')->select('id', 'title')->get();
        $list_menu = Menu::where('status','=', 1)->orderBy('created_at', 'DESC')->select('id', 'name', 'link', 'position', 'status', 'sort_order', 'parent_id', 'table_id')->get();

        return view('backend.menu.edit', compact('menu', 'list_category', 'list_brand', 'list_topic', 'list_page', 'list_menu'));
    }

    public function update(UpdateMenuRequest $request, string $id)
    {
        $menu = Menu::find($id);
        if($menu == null){
            return redirect()->route('admin.menu.index');
        }
        if(isset($request->createCategory)) {
            $listid = $request->categoryid;
            if($listid){
                foreach($listid as $id){
                    $category = Category::find($id);
                        if($category != null){
                            $menu->name = $category->name;
                            $menu->link = 'Laravel_phanngocthuong/public/danh-muc/' .$category->slug;

                            $menu->position = $request->position;
                            $menu->table_id = $id;
                            $menu->updateted_at = date('Y-m-d H:i:s');
                            $menu->updateted_by = Auth::id() ?? 1;
                            $menu->status = $request->status;
                            $menu->save();
                        }
                    }
                    return redirect()->route('admin.menu.index');
                    }else{
                    echo "khong co";
                    }
        }
        if(isset($request->createBrand)) {
            $listid = $request->brandid;
            if($listid){
                foreach($listid as $id){
                    $brand = Brand::find($id);
                    if($brand != null){
                        $menu->name = $brand->name;
                        $menu->link = 'Laravel_phanngocthuong/public/thuong-hieu/' .$brand->slug;
                        $menu->position = $request->position;
                        $menu->updateted_at = date('Y-m-d H:i:s');
                        $menu->updateted_by = Auth::id() ?? 1;
                        $menu->status = $request->status;
                        $menu->save();
                    }
                }
                return redirect()->route('admin.menu.index');
            }else {
            echo "khong co";
        }
    }
        if(isset($request->createTopic)) {
            $listid = $request->topicid;
            if($listid){
                foreach($listid as $id){
                    $topic = Topic::find($id);
                    if($topic != null){
                        $menu->name = $topic->name;
                        $menu->link = 'Laravel_phanngocthuong/public/chu-de/' .$topic->slug;

                        $menu->position = $request->position;
                        $menu->table_id = $id;
                        $menu->updateted_at = date('Y-m-d H:i:s');
                            $menu->updateted_by = Auth::id() ?? 1;
                            $menu->status = $request->status;
                            $menu->save();
                    }

                }
                return redirect()->route('admin.menu.index');
            }else {
            echo "khong co";
        }
    }
        if(isset($request->createPage)) {
            $listid = $request->pageid;
            if($listid){
                foreach($listid as $id){
                    $page = Post::where([['id','=',$id], ['type','=','page']])->first();
                    if($page != null){
                        $menu->name = $page->title;
                        $menu->link = 'trang-don/' .$page->slug;

                        $menu->position = $request->position;
                        $menu->table_id = $id;
                        $menu->updateted_at = date('Y-m-d H:i:s');
                            $menu->updateted_by = Auth::id() ?? 1;
                            $menu->status = $request->status;
                            $menu->save();
                    }
                }
                return redirect()->route('admin.menu.index');
            }else {
            echo "khong co";
        }
    }
        if(isset($request->createCustom)) {
            if(isset($request->name, $request->link)){
                        $menu->name = $request->name;
                        $menu->link = $request->link;

                        $menu->position = $request->position;
                        $menu->updateted_at = date('Y-m-d H:i:s');
                            $menu->updateted_by = Auth::id() ?? 1;
                            $menu->status = $request->status;
                            $menu->save();
            }

        }
        return redirect()->route('admin.menu.index');


    }

    public function destroy(string $id)
    {
        $menu = Menu::find($id);
        if($menu == null){
            return redirect()->route('admin.menu.index');
        }
        $menu->delete();
        return redirect()->route('admin.menu.trash');
    }
    public function status(string $id)
    {
        $menu = Menu::find($id);
        if($menu == null){
            return redirect()->route('admin.menu.index');
        }
        $menu->status = ($menu->status == 1) ? 2 : 1;
        $menu->updated_at = date('Y-m-d H:i:s');
        $menu->updated_by = Auth::id() ?? 1;
        $menu->save();
        return redirect()->route('admin.menu.index');
    }
    public function delete(string $id)
    {
        $menu = Menu::find($id);
        if($menu == null){
            return redirect()->route('admin.menu.index');
        }
        $menu->status = 0;
        $menu->updated_at = date('Y-m-d H:i:s');
        $menu->updated_by = Auth::id() ?? 1;
        $menu->save();
        return redirect()->route('admin.menu.index');
    }
    public function restore(string $id)
    {
        $menu = Menu::find($id);
        if($menu == null){
            return redirect()->route('admin.menu.index');
        }
        $menu->status = 2;
        $menu->updated_at = date('Y-m-d H:i:s');
        $menu->updated_by = Auth::id() ?? 1;
        $menu->save();
        return redirect()->route('admin.menu.trash');
    }
    // public function bulkAction(Request $request)
    // {
    //     $ids = $request->input('ids');
    //     $action = $request->input('bulk_action');

    //     if (empty($ids) || empty($action)) {
    //         return redirect()->route('admin.menu.index')->with('error', 'Chưa chọn menu hoặc hành động.');
    //     }

    //     switch ($action) {
    //         case 'update':
    //             foreach ($ids as $id) {
    //                 $menu = menu::find($id);
    //                 if ($menu != null) {
    //                     $menu->status = ($menu->status == 1) ? 2 : 1;
    //                     $menu->updated_at = now();
    //                     $menu->updated_by = Auth::id() ?? 1;
    //                     $menu->save();
    //                 }
    //             }
    //             return redirect()->route('admin.menu.index')->with('success', 'Cập nhật trạng thái thành công.');

    //         case 'delete':
    //             foreach ($ids as $id) {
    //                 $menu = menu::find($id);
    //                 if ($menu != null) {
    //                     $menu->status = 0;
    //                     $menu->updated_at = now();
    //                     $menu->updated_by = Auth::id() ?? 1;
    //                     $menu->save();
    //                 }
    //             }
    //             return redirect()->route('admin.menu.index')->with('success', 'Xóa sản phẩm thành công.');

    //         default:
    //             return redirect()->route('admin.menu.index')->with('error', 'Hành động không hợp lệ.');
    //     }
    // }

}
