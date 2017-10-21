<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests\loginRequest;

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
  //  protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login()
    {
        $credentials = $this->validate(request(),[
            'username' => 'required|string',
            'password' => 'required|string'
        ]); 

       if(Auth::attempt($credentials))
       {   
            $vista = '';
            switch(Auth::user()->rol)
            {
                case 'A':
                    // variable para almacenar la vista y utilizar al final un solo redirect
                    $vista = '/admin/dashadmin';
                    break;
                default:
                    return 'No ha iniciado sesión';
            }
        }
        else
            $vista = '/auth/login';

        // I used redirect because view always send to the login page though start session 
        // besides, modified the redirectfauthenticated -> middleware
        return redirect($vista);
    }

    public function logout()
    {
        Auth::logout();

        return redirect('/');
    }
}
