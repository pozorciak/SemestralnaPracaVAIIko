<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;

use App\Models\User;
use App\Providers\RouteServiceProvider;

use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Illuminate\Http\Request;
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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

   public function login(Request $request)
   {
       $this->validate($request, [
           'email' => 'required|email',
           'password' => 'required|max:55|min:8',
       ]);

//       auth()->attempt(['email' => $request->input('email'), 'password' => $request->input('password')]);
//
//       return redirect()->route('sluzby.index');

       $remember_me = $request->has('remember_me') ? true : false;

       if (auth()->attempt(['email' => $request->input('email'), 'password' => $request->input('password')],
           $remember_me))
       {
           $user = auth()->user();
           return redirect()->route('home');
       }else{
           return back()->with('error','your username and password are wrong.');
       }
   }

}

