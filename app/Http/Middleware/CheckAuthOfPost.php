<?php

namespace App\Http\Middleware;

use App\Post;
use Closure;

class CheckAuthOfPost
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $postId = explode("/",request()->path())[2] ; 
        $postUserID = Post::where("id",$postId)->first()->user_id ; 
        if($postUserID ==auth()->user()->id)
        return $next($request);
        else 
        return redirect()->back() ; 
    }
}
