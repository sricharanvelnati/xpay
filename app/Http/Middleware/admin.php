<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class admin
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
      dd(Auth::user()->roles);
      if(Auth::user() && (Auth::user()->hasRole('admin') || Auth::user()->hasRole('vendor'))) {
        return $next($request);
    }
      Auth::logout();
      return redirect('admin/login');
    }
}
