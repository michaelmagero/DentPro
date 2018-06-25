<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Illuminate\Http\Request;
use Alert;
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
    



    public function authenticated()
    {
        if(Auth::user()){
            Alert::success('Login Successfull!', 'Success')->autoclose(2500);
            return redirect('/admin-dash');
            
        }elseif(Auth::user() != Auth::user()){
            Alert::error('Wrong credentials! check username and password and try again', 'Error')->autoclose(2500);
            return redirect('/login');
        }else{
            
        }

        
    }

    protected $redirectTo = '/admin-dash';

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
