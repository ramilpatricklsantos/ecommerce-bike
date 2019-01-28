<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\User;
use Illuminate\Http\Request;
use Session;
use Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function authenticated(Request $request, User $user)
    {
        
        if ($user->status == "0") {
            auth()->logout();
            Session::flash('isInactive', "Your account is still pending for approval. Please contact your system administrator for inquiries.");
            return redirect('/login');
        } 

        return redirect()->intended($this->redirectPath());
    }

    // public function credentials($request)
    // {
    //     $credentials = $request->only($this->username(), 'password');

    //     return array_add($credentials, 'status', '1');
    // }
}
