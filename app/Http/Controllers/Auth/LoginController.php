<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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
    // protected $redirectTo = '/posts';
    protected $redirectTo = '/posts@index';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Show the application's login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLoginForm()
    {
        session(['url.intended' => $_SERVER['HTTP_REFERER']]); 
        return view('auth.login');
    }

    /**
     * Log the user out of the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function logout(Request $request)
    // {
    //     $this->guard()->logout();
    //     $request->session()->invalidate();
    //     return $this->loggedOut($request) ?: redirect('/posts');
    // エラーが出たのでコメントアウト
    // }

//    /**
//      * The user has logged out of the application.
//      *
//      * @param  \Illuminate\Http\Request  $request
//      * @return mixed
//      */
    // protected function loggedOut(Request $request)
    // {
    //     return $this->loggedOut($request) ?: redirect('/posts');
    // }


}

