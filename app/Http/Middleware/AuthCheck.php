<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
class AuthCheck
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
            $path=$request->path();
       if(session()->has('admin_id') && ($path == 'admin'))
       {
           return redirect('/dashboard');
       }
       if(!session()->has('admin_id') && ($path != '/admin'))
       {
           return redirect('/admin')->with('fail', 'You must be login');
       }
       return $next($request);
    }
}
