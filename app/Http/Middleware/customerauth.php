<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class customerauth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $path=$request->path();
   if(session()->has('customer_id') && ($path == '/login-checkout'))
   {
       return redirect('/');
   }
//    if(!session()->has('customer_id') && ($path =='/checkout') || ($path =='/payment') || ($path =='/add-to-cart') || ($path == '/show-cart'));
//    {
//        return redirect('/login-checkout')->with('fail', 'You must be login');
//    }
   return $next($request);
}
}
