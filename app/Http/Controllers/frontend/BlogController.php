<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Topic;
use App\Models\Comment;
use Carbon\Carbon;

class BlogController extends Controller
{
    public function index()
    {
        $listpost = Post::withCount('comments')
        ->where([['status','=',1],['type','=','post']])
        ->orderBy('created_at','DESC')
        ->paginate(3);
        $list_topic = Topic::where('status','=',1)
            ->orderBy('created_at','DESC')
            ->select("id","name","slug")
            ->get();
        return view('frontend.Blog',compact('listpost','list_topic'));
    }

    public function topic($slug)
    {
        $topic = Topic::where([['slug', '=', $slug], ['status', '=', 1]])->first();

        $listpost = Post::withCount('comments')
            ->where([['status', '=', 1],['type','=','post'],['topic_id','=',$topic->id]])
            ->orderBy('created_at', 'DESC')
            ->paginate(3);

        $list_topic = Topic::where('status','=',1)
            ->orderBy('created_at','DESC')
            ->select("id","name","slug")
            ->get();

        return view('frontend.blog_topic', compact('listpost', 'topic','list_topic'));
    }

    public function blog_detail($slug)
    {
        $post = Post::where([['slug','=',$slug],['status','=',1]])->first();
        $post_list = Post::where([['status','=',1],['id','!=',$post->id],['type','=','post'],['topic_id','=',$post->_topic_id]])
            ->orderBy('created_at','DESC')
            ->paginate(3);
        $list_topic = Topic::where('status','=',1)
            ->orderBy('created_at','DESC')
            ->select("id","name","slug")
            ->get();
        $comments = Comment::where([['post_id', '=', $post->id], ['status', '=', 1]])
            ->orderBy('created_at', 'DESC')
            ->get();
        $comment_count = $post->comments()->count();
        return view('frontend.blog_detail',compact('post','post_list','list_topic','comment_count'));
    }
    public function storeComment(Request $request)
    {
        $comment = new Comment();
        $comment->post_id = $request->post_id;
        $comment->name = $request->name;
        $comment->email = $request->email;
        $comment->comment = $request->comment;
        $comment->status = 2;
        $comment->created_at = date('Y-m-d H:i:s');
        $comment->created_by = Auth::id() ?? 1;
        $comment->save();

        return redirect()->back()->with('success', 'Bình luận của bạn đã được gửi thành công.');
    }
}
