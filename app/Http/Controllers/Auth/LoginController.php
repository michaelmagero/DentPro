<?php

namespace App\Http\Controllers\Auth;

use Alert;
use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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

    protected $redirectTo = '/admin-dash';

    // public function authenticated()
    // {
    //     if(Auth::user()){
    //         Alert::success('Login Successfull!', 'Success')->autoclose(2500);
    //         return redirect('/admin-dash');

    //     }elseif(Auth::user() != Auth::user()){
    //         Alert::error('Wrong credentials! check username and password and try again', 'Error')->autoclose(2500);
    //         return redirect('/login');
    //     }else{

    //     }

    // }

    public function login(Request $request)
    {
        //Error messages
        $messages = [
            'email.required' => "Email is required",
            'email.email' => "Email is not valid",
            'email.exists' => "Email doesn't exists",
            'password.required' => "Password is required",
            'password.min' => "Password must be at least 6 characters",
        ];

        // validate the form data
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|exists:users,email',
            'password' => 'required|min:6',
        ], $messages);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        } else {
            // attempt to log
            if (Auth::attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
                // if successful -> redirect forward
                Alert::success('Login Successfull!', 'Success')->autoclose(2500);
                return redirect('/admin-dash');
            }

            // if unsuccessful -> redirect back
            return redirect()->back()->withInput($request->only('email', 'remember'))->withErrors([
                Alert::error('Wrong credentials! check username and password and try again', 'Error')->autoclose(2500),

            ]);
        }
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
