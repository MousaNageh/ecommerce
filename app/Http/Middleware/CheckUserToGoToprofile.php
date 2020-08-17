<?php

namespace App\Http\Middleware;

use Closure;

class CheckUserToGoToprofile
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
        $userID = explode("/" , request()->path())[1] ; 
        if($userID ==auth()->user()->id)
        return $next($request);
        else 
        return redirect()->back() ; 
    }
}
