<?php

namespace App\Http\Middleware;

use App\User;
use Auth;
use Closure;

class ValidateUserType
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
        if(!Auth::user() && !User::all()->isEmpty()){
            return redirect('/login');
        } else if(User::all()->isEmpty()) {
            return $next($request);
        } else if(Auth::user()->type == 'user'){
            return redirect('/home');
        }

        return $next($request);
    }
}
