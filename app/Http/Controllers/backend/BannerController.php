<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;
use App\Http\Requests\StoreBannerRequest;
use App\Http\Requests\UpdateBannerRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Pagination\Paginator;

class BannerController extends Controller
{
    public function index()
    {
        $list_banner = Banner::where('status','!=',0)
            ->select("id","name","image","link","position","description","status")
            ->orderBy('created_at','DESC')
            ->paginate(5);
            $position = "";
        foreach ($list_banner as $item) {
            $position .= "<option value='" . $item->id . "'>" . $item->position . "</option>";
        }
        return view("backend.banner.index",compact('list_banner','position'));
    }

    public function trash()
    {
        $list_banner = Banner::where('status','=',0)
            ->select("id","name","image","link","position","description","status")
            ->orderBy('created_at','DESC')
            ->paginate(5);
        return view("backend.banner.trash",compact('list_banner'));
    }

    public function store(StoreBannerRequest $request)
    {
        $banner = new Banner();
        $banner->name = $request->name;
        $banner->slug = Str::of($request->name)->slug('-');
        $banner->description = $request->description;
        $banner->position = $request->position;
        $banner->link = $request->link;

        if($request->image){
            $exten = $request->file("image")->extension();
            if(in_array($exten,["png", "jpg", "gif", "webp", "jfif"]))
            {
                $filename = $banner->slug . "." . $exten;
                $request->image->move(public_path("images/banners"), $filename);
                $banner->image = $filename;
            }
        }

        $banner->status = $request->status;
        $banner->updated_at = date('Y-m-d H:i:s');
        $banner->updated_by = Auth::id() ?? 1;
        $banner->save();
        return redirect()->route('admin.banner.index');
    }

    public function show(string $id)
    {
        $banner = Banner::find($id);
        if($banner == null){
            return redirect()->route('admin.banner.index');
        }
        return view("backend.banner.show",compact('banner'));
    }

    public function edit(string $id)
    {
        $banner = Banner::find($id);
        if($banner == null){
            return redirect()->route('admin.banner.index');
        }
        $list_banner = Banner::where('status','!=',0)
            ->select("id","name","image","link","position","description","status")
            ->orderBy('created_at','DESC')
            ->get();
        return view("backend.banner.edit",compact('banner'));
    }

    public function update(UpdateBannerRequest $request, string $id)
    {
        $banner = Banner::find($id);
        if($banner == null){
            return redirect()->route('admin.banner.index');
        }
        $banner->name = $request->name;
        $banner->slug = Str::of($request->name)->slug('-');
        $banner->description = $request->description;
        $banner->position = $request->position;
        $banner->link = $request->link;

        if($request->image){
            $exten = $request->file("image")->extension();
            if(in_array($exten,["png", "jpg", "gif", "webp", "jfif"]))
            {
                $filename = $banner->slug . "." . $exten;
                $request->image->move(public_path("images/banners"), $filename);
                $banner->image = $filename;
            }
        }

        $banner->status = $request->status;
        $banner->updated_at = date('Y-m-d H:i:s');
        $banner->updated_by = Auth::id() ?? 1;
        $banner->save();
        return redirect()->route('admin.banner.index');
    }

    public function destroy(string $id)
    {
        $banner = Banner::find($id);
        if($banner == null){
            return redirect()->route('admin.banner.index');
        }
        $banner->delete();
        return redirect()->route('admin.banner.trash');
    }
    public function status(string $id)
    {
        $banner = Banner::find($id);
        if($banner == null){
            return redirect()->route('admin.banner.index');
        }
        $banner->status = ($banner->status == 1) ? 2 : 1;
        $banner->updated_at = date('Y-m-d H:i:s');
        $banner->updated_by = Auth::id() ?? 1;
        $banner->save();
        return redirect()->route('admin.banner.index');
    }
    public function delete(string $id)
    {
        $banner = Banner::find($id);
        if($banner == null){
            return redirect()->route('admin.banner.index');
        }
        $banner->status = 0;
        $banner->updated_at = date('Y-m-d H:i:s');
        $banner->updated_by = Auth::id() ?? 1;
        $banner->save();
        return redirect()->route('admin.banner.index');
    }
    public function restore(string $id)
    {
        $banner = Banner::find($id);
        if($banner == null){
            return redirect()->route('admin.banner.index');
        }
        $banner->status = 2;
        $banner->updated_at = date('Y-m-d H:i:s');
        $banner->updated_by = Auth::id() ?? 1;
        $banner->save();
        return redirect()->route('admin.banner.trash');
    }
    public function bulkAction(Request $request)
    {
        $ids = $request->input('ids');
        $action = $request->input('bulk_action');

        if (empty($ids) || empty($action)) {
            return redirect()->route('admin.banner.index')->with('error', 'Chưa chọn banner hoặc hành động.');
        }

        switch ($action) {
            case 'update':
                foreach ($ids as $id) {
                    $banner = banner::find($id);
                    if ($banner != null) {
                        $banner->status = ($banner->status == 1) ? 2 : 1;
                        $banner->updated_at = now();
                        $banner->updated_by = Auth::id() ?? 1;
                        $banner->save();
                    }
                }
                return redirect()->route('admin.banner.index')->with('success', 'Cập nhật trạng thái thành công.');

            default:
                return redirect()->route('admin.banner.index')->with('error', 'Hành động không hợp lệ.');
        }
    }

}
