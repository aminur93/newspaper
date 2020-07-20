<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

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
    protected $redirectTo;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    
    public function redirectTo()
    {
        switch(Auth::user()->user_role_id){
            case 1:
                $this->redirectTo = route('admin.dashboard');
                return $this->redirectTo;
                break;
            case 2:
                $this->redirectTo = route('editor.dashboard');
                return $this->redirectTo;
                break;
            case 3:
                $this->redirectTo = url('/');
                return $this->redirectTo;
                break;
            default:
                $this->redirectTo = '/login';
                return $this->redirectTo;
        }
        
        // return $next($request);
    }
    
    public function __construct()
    {
//        if (Auth::check() && Auth::user()->usersRole->id == 1){
//
//            $this->redirectTo = route('admin.dashboard');
//        }else{
//            $this->redirectTo = route('editor.dashboard');
//        }
//        $this->middleware('guest')->except('logout');
    }
}
