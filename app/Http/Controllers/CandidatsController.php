<?php
namespace App\Http\Controllers;

use Illuminate\Support\Str;
use App\Candidat;
use App\Cv;
use Auth;
use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;

class CandidatsController extends Controller
{

    public function index(){

      $candidats = Candidat::paginate(10);
      return view('candidats.index', compact('candidats'));

    }


    public function edit($id){

      if( Auth::guard('candidat')->id() !== intval($id) ){
        return abort('404');
      }

      $candidat = Candidat::findOrFail($id);

      return view('candidats.edit', compact('candidat'));
    }

    public function update(Request $request, $id){

      if( Auth::guard('candidat')->id() !== intval($id) ){
        return abort('404');
      }

      $candidat = Candidat::findOrFail($id);


      // image Configuration

      if($request->has('photo')){
        $photo = $request->file('photo');
        $path = config('images.path'); // Folder: config/images.php

        $extension = $photo->getClientOriginalExtension();
        $name = Str::random(12) . '.' . $extension;

        $photo->move($path, $name);

        $candidat->photo = 'uploads/' . $name;
      }

      // End Image Configuration

      $civilite = $request->input('civilite');

      if( $civilite == 1 ) $civilite = 'M';

      elseif($civilite == 2 ) $civilite = 'Mme';

      elseif($civilite == 3 ) $civilite = 'Mlle';

      elseif($civilite == 4 ) $civilite = 'Dr';

      else $civilite = 'Pr';

      $candidat->nom = $request->nom;

      $candidat->prenom = $request->prenom;

      $candidat->civilite = $civilite;

      $candidat->tel = $request->tel;

      $candidat->adresse = $request->adresse;

      $candidat->date_de_naissance = $request->date_de_naissance;

      $candidat->email = $request->email;

      if( !empty( $request->password ) ){

          $new_password = Hash::make($request->password);

          if ( $new_password !== $candidat->password ){

              $candidat->password = $new_password;
          }
      }

      $candidat->save();
      $request->session()->flash('modified' , 'Changement effectué avec succès');
      return redirect('/candidat/' . $candidat->id . '/edit'  );

    }

    public function show($id){

      $candidat = Candidat::findOrFail($id);
      $cv = Cv::All()->where('id_candidat' , $id);
      $haveRight = (Auth::guard('candidat')->id() == $candidat->id ) ? true : false;
      return view('candidats.show', compact('candidat' , 'cv' , 'haveRight'));

    }
    

}
