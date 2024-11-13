<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Pagination\Paginator;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list_comment = Comment::where('status','!=',0)
            ->orderBy('created_at','DESC')
            ->select("id","name","status","comment","post_id","email")
            ->paginate(5);
        $list_post = Post::where('status','=',1)
            ->orderBy('created_at','DESC')
            ->select("id","title")
            ->get();
        return view("backend.comment.index",compact('list_comment','list_post'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $comment = Comment::find($id);
        if($comment == null){
            return redirect()->route('admin.comment.index');
        }
        $comment->delete();
        return redirect()->route('admin.comment.index');
    }
    public function status(string $id)
    {
        $comment = Comment::find($id);
        if($comment == null){
            return redirect()->route('admin.comment.index');
        }
        $comment->status = ($comment->status == 1) ? 2 : 1;
        $comment->updated_at = date('Y-m-d H:i:s');
        $comment->updated_by = Auth::id() ?? 1;
        $comment->save();
        return redirect()->route('admin.comment.index');
    }
    // public function bulkAction(Request $request)
    // {
    //     $ids = $request->input('ids');
    //     $action = $request->input('bulk_action');

    //     if (empty($ids) || empty($action)) {
    //         return redirect()->route('admin.comment.index')->with('error', 'Chưa chọn bình luận hoặc hành động.');
    //     }

    //     switch ($action) {
    //         case 'update':
    //             foreach ($ids as $id) {
    //                 $comment = comment::find($id);
    //                 if ($comment != null) {
    //                     $comment->status = ($comment->status == 1) ? 2 : 1;
    //                     $comment->updated_at = now();
    //                     $comment->updated_by = Auth::id() ?? 1;
    //                     $comment->save();
    //                 }
    //             }
    //             return redirect()->route('admin.comment.index')->with('success', 'Cập nhật trạng thái thành công.');

    //         case 'delete':
    //             foreach ($ids as $id) {
    //                 $product = Product::find($id);
    //                 if ($comment != null) {
    //                     $comment->status = 0;
    //                     $comment->updated_at = now();
    //                     $comment->updated_by = Auth::id() ?? 1;
    //                     $comment->save();
    //                 }
    //             }
    //             return redirect()->route('admin.comment.index')->with('success', 'Xóa thành công.');

    //         default:
    //             return redirect()->route('admin.comment.index')->with('error', 'Hành động không hợp lệ.');
    //     }
    // }

}
