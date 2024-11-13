<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\Post;
use App\Models\Topic;
use Carbon\Carbon;

class Posts extends Component
{

    public function __construct()
    {
        //
    }

    public function render(): View|Closure|string
    {
        $listpost = Post::where([['post.status','=',1],['post.type','=','page']])
            ->join('topic','post.topic_id','=','topic.id')
            ->orderBy('post.created_at','DESC')
            ->select("post.id","post.image","topic.name as topicname","post.status","post.created_at","post.detail","post.title")
            ->limit(3)
            ->get();
        return view('components.posts',compact('listpost'));
    }
}
