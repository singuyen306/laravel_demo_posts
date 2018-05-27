<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Auth;

class UsersController extends Controller
{
    public function login(){
        return view('backend.auth.login');
    }

    public function postLogin(LoginRequest $request){
        $data = [
            'email' => $request->email_login,
            'password' => $request->password_login,
            'role_id' => 2
        ];

        if (Auth::attempt($data)) {
            return redirect()->route('backend_home');
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
        return redirect()->route('backend_login');
    }
}
