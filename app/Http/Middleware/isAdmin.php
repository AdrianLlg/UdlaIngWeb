<?php

namespace App\Http\Middleware;

use Closure;
class isAdmin
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
        if(auth()->check() && auth()->user()->role->name =='admin')
        {
            return $next($request);
        }else{
            return redirect('/');
        }
        // $user=Auth::user();

        // if(Auth::user()){
        //     if($user->isAdmin()){
        //         return $next($request);
        //     }else{
        //         return redirect('/');
        //     }
        // }
        
    }
}
