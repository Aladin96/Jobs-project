<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use App\Candidat;
use App\Recruteur;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

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

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
        $this->middleware('guest:candidat');
        $this->middleware('guest:recruteur');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    /**
     * Create a new Candidat instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Candidat
     */
    protected function createCandidat(Request $request)
    {

       $request->validate([
         'nom'                 => 'bail|required|alpha',
         'prenom'              => 'bail|required|alpha',
         'civilite'            => 'bail|required|integer|in:1,2,3,4,5',
         'tel'                 => 'bail|required|numeric',
         'adresse'             => 'bail|required|string',
         'date_de_naissance'   => 'bail|required|date',
         'email'               => 'bail|required|email|unique:candidats,email|unique:recruteurs,email',
         'password'            => 'bail|required|confirmed|min:5'
        ]);

        $civilite = $request->input('civilite');
        if( $civilite == 1 ) $civilite = 'M';
        elseif($civilite == 2 ) $civilite = 'Mme';
        elseif($civilite == 3 ) $civilite = 'Mlle';
        elseif($civilite == 4 ) $civilite = 'Dr';
        else $civilite = 'Pr';
        $request->session()->flash('register-success','Inscription avec succes');
        Candidat::create([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'civilite' => $civilite,
            'tel' => $request->tel,
            'adresse' => $request->adresse,
            'date_de_naissance' => $request->date_de_naissance,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        return redirect('/register/candidat');
    }

    protected function createCandidatView()
    {
      return view('auth.register_candidat');
    }

    /**
     * Create a new Candidat instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Recruteur
     */
    protected function createRecruteur(Request $request)
    {

      $request->validate([
        'nom'          => 'bail|required|alpha',
        'type'         => 'bail|required|in:1,2',
        'tel'          => 'bail|required|numeric',
        'adresse'      => 'bail|required|string',
        'site_web'     => 'bail|required|string',
        'email'        => 'bail|required|email|unique:candidats,email|unique:recruteurs,email',
        'password'     => 'bail|required|confirmed|min:5'
       ]);

        $type = intval($request->input('type'));

        if( $type == 1 ) $type = 'Public';
        else $type = 'Société';
        $request->session()->flash('register-success','Inscription avec succes.');
        Recruteur::create([
            'nom' => $request->nom,
            'type' => $type,
            'tel' => $request->tel,
            'site_web' => $request->site_web,
            'adresse' => $request->adresse,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        return redirect('/register/recruteur');
    }

    protected function createRecruteurView()
    {
      return view('auth.register_recruteur');
    }
}
