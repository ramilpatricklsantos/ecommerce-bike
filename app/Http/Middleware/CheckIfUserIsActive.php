<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use App\User;

class CheckIfUserIsActive
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
        // dd(Auth::user());
        
        
        if(Auth::user()){
            $user = User::find(Auth::user()->id);
            if($user->status == "0"){
                Auth::logout();
                return redirect('/login');
            }
        }
        return $next($request);
    }
}
