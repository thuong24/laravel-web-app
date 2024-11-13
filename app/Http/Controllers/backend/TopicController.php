<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Topic;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Pagination\Paginator;

class TopicController extends Controller
{

    public function index()
    {
        $list_topic = Topic::where('status','!=',0)
            ->orderBy('created_at','DESC')
            ->select("id","name","slug","status")
            ->paginate(5);
        return view("backend.topic.index",compact('list_topic'));
    }
    public function trash()
    {
        $list_topic = Topic::where('status','!=',0)
            ->orderBy('created_at','DESC')
            ->select("id","name","slug")
            ->paginate(5);
        return view("backend.topic.trash",compact('list_topic'));
    }
    public function store(Request $request)
    {
        $topic = new Topic();
        $topic->name = $request->name;
        $topic->slug = Str::of($request->name)->slug('-');
        $topic->description = $request->description;
        $topic->sort_order = $request->sort_order;
        $topic->status = $request->status;
        $topic->created_at = date('Y-m-d H:i:s');
        $topic->created_by = Auth::id() ?? 1;
        $topic->save();

        return redirect()->route('admin.topic.index');
    }

    public function show(string $id)
    {
        $topic = Topic::find($id);
        if($topic == null){
            return redirect()->route('admin.topic.index');
        }
        return view("backend.topic.show",compact('topic'));
    }

    public function edit($id)
    {
        $topic = Topic::find($id);
        if (!$topic) {
            return redirect()->route('admin.topic.index')->with('error', 'Chủ đề không tồn tại.');
        }
        return view('backend.topic.edit', compact('topic'));
    }

    public function update(Request $request, string $id)
    {
        $topic = Topic::find($id);
        if (!$topic) {
            return redirect()->route('admin.topic.index')->with('error', 'Chủ đề không tồn tại.');
        }

        $topic->name = $request->name;
        $topic->slug = Str::of($request->name)->slug('-');
        $topic->description = $request->description;
        $topic->sort_order = $request->sort_order;
        $topic->status = $request->status;
        $topic->updated_at = now();
        $topic->updated_by = Auth::id() ?? 1;
        $topic->save();

        return redirect()->route('admin.topic.index')->with('success', 'Cập nhật chủ đề thành công.');
    }

    public function destroy(string $id)
    {
        $topic = Topic::find($id);
        if($topic == null){
            return redirect()->route('admin.topic.index');
        }
        $topic->delete();
        return redirect()->route('admin.topic.trash');
    }
    public function status(string $id)
    {
        $topic = Topic::find($id);
        if($topic == null){
            return redirect()->route('admin.topic.index');
        }
        $topic->status = ($topic->status == 1) ? 2 : 1;
        $topic->updated_at = date('Y-m-d H:i:s');
        $topic->updated_by = Auth::id() ?? 1;
        $topic->save();
        return redirect()->route('admin.topic.index');
    }
    public function delete(string $id)
    {
        $topic = Topic::find($id);
        if($topic == null){
            return redirect()->route('admin.topic.index');
        }
        $topic->status = 0;
        $topic->updated_at = date('Y-m-d H:i:s');
        $topic->updated_by = Auth::id() ?? 1;
        $topic->save();
        return redirect()->route('admin.topic.index');
    }
    public function restore(string $id)
    {
        $topic = Topic::find($id);
        if($topic == null){
            return redirect()->route('admin.topic.index');
        }
        $topic->status = 2;
        $topic->updated_at = date('Y-m-d H:i:s');
        $topic->updated_by = Auth::id() ?? 1;
        $topic->save();
        return redirect()->route('admin.topic.trash');
    }
    // public function bulkAction(Request $request)
    // {
    //     $ids = $request->input('ids');
    //     $action = $request->input('bulk_action');

    //     if (empty($ids) || empty($action)) {
    //         return redirect()->route('admin.topic.index')->with('error', 'Chưa chọn bài viết hoặc hành động.');
    //     }

    //     switch ($action) {
    //         case 'update':
    //             foreach ($ids as $id) {
    //                 $topic = topic::find($id);
    //                 if ($topic != null) {
    //                     $topic->status = ($topic->status == 1) ? 2 : 1;
    //                     $topic->updated_at = now();
    //                     $topic->updated_by = Auth::id() ?? 1;
    //                     $topic->save();
    //                 }
    //             }
    //             return redirect()->route('admin.topic.index')->with('success', 'Cập nhật trạng thái thành công.');

    //         case 'delete':
    //             foreach ($ids as $id) {
    //                 $topic = topic::find($id);
    //                 if ($topic != null) {
    //                     $topic->status = 0;
    //                     $topic->updated_at = now();
    //                     $topic->updated_by = Auth::id() ?? 1;
    //                     $topic->save();
    //                 }
    //             }
    //             return redirect()->route('admin.topic.index')->with('success', 'Xóa sản phẩm thành công.');

    //         default:
    //             return redirect()->route('admin.topic.index')->with('error', 'Hành động không hợp lệ.');
    //     }
    // }

}
