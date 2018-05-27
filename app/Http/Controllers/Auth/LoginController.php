<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
//use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Http\Requests\LoginRequest;
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

//    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm()
    {
        return view('frontend.auth.login');
    }

    public function postLogin(LoginRequest $request){
        $data = [
            'email' => $request->email_login,
            'password' => $request->password_login,
            'role_id' => 1
        ];

        if (Auth::attempt($data)) {
            return redirect()->route('frontend_home');
        }else{
            return redirect()->back()->with('error', EMAIL_OR_PASSWORD_WRONG)->withInput();
        }
    }

    /**
    * logout
    *
    * @return home
    */
    public function logout() {
        Auth::logout();
        return redirect()->route('frontend_home');
    }
}
