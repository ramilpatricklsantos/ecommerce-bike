<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class RedirectIfRegularUser
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
        if(Auth::user() && Auth::user()->type == 'user'){
                return redirect('/home');
        }
        return $next($request);
    }
}
