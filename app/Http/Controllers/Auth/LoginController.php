<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Illuminate\Http\Request;
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
        $this->middleware('guest:candidat')->except('logout');
        $this->middleware('guest:recruteur')->except('logout');
    }

    /*
    *
    *  Candidat
    */
    public function candidatLoginView(){
        return view('auth.login', ['url' => 'candidat']);
    }


    public function candidatLogin(Request $request){

      $this->validate($request, [
          'email'   => 'required|email',
          'password' => 'required'
      ]);

      if (Auth::guard('candidat')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {

          return redirect()->intended('/');
      }

     return back()->with('error', 'Email ou mot de passe incorrect !');

    }

    /*
    *
    * recruteur
    */

    public function recruteurLoginView(){
        return view('auth.login', ['url' => 'recruteur']);
    }

    public function recruteurLogin(Request $request){

      $this->validate($request, [
          'email'   => 'required|email',
          'password' => 'required'
      ]);

      if (Auth::guard('recruteur')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {

          return redirect()->intended('/');
      }

     return back()->with('error', 'Email ou mot de passe incorrect !');

    }

    


}
