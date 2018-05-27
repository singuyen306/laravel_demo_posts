<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Http\Requests\RegisterRequest;
use App\Repository\User\UserInterface;
use Auth;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    private $user;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(UserInterface $user)
    {
        $this->middleware('guest');

        $this->user = $user;
    }

    public function showFormRegister()
    {
        return view('frontend.auth.register');
    }

    public function postRegister(RegisterRequest $request)
    {
        $data = [
            'email' => $request->email_register,
            'password' => bcrypt($request->password_register),
            'name' => $request->name_register,
            'role_id' => 1
        ];

        $user = $this->user->create($data);

        Auth::login($user);

        return redirect()->route('frontend_home');
    }
}
