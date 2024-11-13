<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\Post;

class PostNew extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $args_post = [
            ['status','=',1],
            ['type','=','post']
        ];
        $listpost = Post::where($args_post)
            ->orderBy('created_at','DESC')
            ->limit(5)
            ->get();
        return view('components.post-new',compact('listpost'));
    }
}
