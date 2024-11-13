<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Topic;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Pagination\Paginator;

class PostController extends Controller
{

    public function index()
    {
        $list_post = Post::where('status','!=',0)
            ->orderBy('created_at','DESC')
            ->select("id","title","detail","type","image","status")
            ->paginate(5);
        return view("backend.post.index",compact('list_post'));
    }
    public function trash()
    {
        $list_post = Post::where('status','=',0)
            ->orderBy('created_at','DESC')
            ->select("id","title","detail","type","image")
            ->paginate(5);
        return view("backend.post.trash",compact('list_post'));
    }

    public function create()
    {
        $list_topic = Topic::where('status','!=',0)
            ->orderBy('created_at', 'DESC')
            ->select('id', 'name')
            ->get();

        $topicid = '';
        foreach ($list_topic as $item) {
            $topicid .= '<option value="'.$item->id.'">'.$item->name.'</option>';
        }

        return view('backend.post.create', compact('topicid'));
    }


    public function store(StorePostRequest $request)
    {
        $post = new Post();
        $post->title = $request->title;
        $post->slug = Str::slug($request->title, '-');
        $post->detail = $request->detail;
        $post->description = $request->description;
        $post->topic_id = $request->topic_id;
        $post->type = $request->type;
        if($request->image){
            $exten = $request->file("image")->extension();
            if(in_array($exten,["png", "jpg", "gif", "webp", "jfif"]))
            {
                $filename = $post->slug . "." . $exten;
                $request->image->move(public_path("images/posts"), $filename);
                $post->image = $filename;
            }
        }
        $post->status = $request->status;
        $post->created_at = date('Y-m-d H:i:s');
        $post->created_by = Auth::id() ?? 1;
        $post->save();
        return redirect()->route('admin.post.index');

    }

    public function show(string $id)
    {
        $post = Post::find($id);
        if($post == null){
            return redirect()->route('admin.post.index');
        }
        $list_topic = Topic::where('status','!=',0)
            ->orderBy('created_at', 'DESC')
            ->select('id', 'name')
            ->get();
        return view("backend.post.show",compact('post','list_topic'));
    }

    public function edit(string $id)
    {
        $post = Post::find($id);
        if($post == null){
            return redirect()->route('admin.post.index');
        }
        $list_topic = Topic::where('status','!=',0)
                   ->orderBy('created_at', 'DESC')
                   ->select('id', 'name')
                   ->get();

        $topicid = '';
        foreach ($list_topic as $item) {
            $topicid .= '<option value="'.$item->id.'"'.($item->topic_id == $item->id ? ' selected' : '').'>'.$item->name.'</option>';
        }

        return view('backend.post.edit', compact('post', 'topicid'));
    }

    public function update(UpdatePostRequest $request, string $id)
    {
        $post = Post::find($id);
        if($post == null){
            return redirect()->route('admin.post.index');
        }
        $post->title = $request->title;
        $post->slug = Str::slug($request->title, '-');
        $post->detail = $request->detail;
        $post->description = $request->description;
        $post->topic_id = $request->topic_id;
        $post->type = $request->type;
        if($request->image){
            $exten = $request->file("image")->extension();
            if(in_array($exten,["png", "jpg", "gif", "webp", "jfif"]))
            {
                $filename = $post->slug . "." . $exten;
                $request->image->move(public_path("images/posts"), $filename);
                $post->image = $filename;
            }
        }
        $post->status = $request->status;
        $post->updated_at = date('Y-m-d H:i:s');
        $post->updated_by = Auth::id() ?? 1;
        $post->save();
        return redirect()->route('admin.post.index');
    }

    public function destroy(string $id)
    {
        $post = Post::find($id);
        if($post == null){
            return redirect()->route('admin.post.index');
        }
        $post->delete();
        return redirect()->route('admin.post.trash');
    }
    public function status(string $id)
    {
        $post = Post::find($id);
        if($post == null){
            return redirect()->route('admin.post.index');
        }
        $post->status = ($post->status == 1) ? 2 : 1;
        $post->updated_at = date('Y-m-d H:i:s');
        $post->updated_by = Auth::id() ?? 1;
        $post->save();
        return redirect()->route('admin.post.index');
    }
    public function delete(string $id)
    {
        $post = Post::find($id);
        if($post == null){
            return redirect()->route('admin.post.index');
        }
        $post->status = 0;
        $post->updated_at = date('Y-m-d H:i:s');
        $post->updated_by = Auth::id() ?? 1;
        $post->save();
        return redirect()->route('admin.post.index');
    }
    public function restore(string $id)
    {
        $post = Post::find($id);
        if($post == null){
            return redirect()->route('admin.post.index');
        }
        $post->status = 2;
        $post->updated_at = date('Y-m-d H:i:s');
        $post->updated_by = Auth::id() ?? 1;
        $post->save();
        return redirect()->route('admin.post.trash');
    }
    // public function bulkAction(Request $request)
    // {
    //     $ids = $request->input('ids');
    //     $action = $request->input('bulk_action');

    //     if (empty($ids) || empty($action)) {
    //         return redirect()->route('admin.post.index')->with('error', 'Chưa chọn bài viết hoặc hành động.');
    //     }

    //     switch ($action) {
    //         case 'update':
    //             foreach ($ids as $id) {
    //                 $post = post::find($id);
    //                 if ($post != null) {
    //                     $post->status = ($post->status == 1) ? 2 : 1;
    //                     $post->updated_at = now();
    //                     $post->updated_by = Auth::id() ?? 1;
    //                     $post->save();
    //                 }
    //             }
    //             return redirect()->route('admin.post.index')->with('success', 'Cập nhật trạng thái thành công.');

    //         case 'delete':
    //             foreach ($ids as $id) {
    //                 $post = post::find($id);
    //                 if ($post != null) {
    //                     $post->status = 0;
    //                     $post->updated_at = now();
    //                     $post->updated_by = Auth::id() ?? 1;
    //                     $post->save();
    //                 }
    //             }
    //             return redirect()->route('admin.post.index')->with('success', 'Xóa sản phẩm thành công.');

    //         default:
    //             return redirect()->route('admin.post.index')->with('error', 'Hành động không hợp lệ.');
    //     }
    // }

}
