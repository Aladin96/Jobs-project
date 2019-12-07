<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Favori;
use App\Recruteur;
use Auth;
class FavoriController extends Controller
{

    public function __construct(){

      $this->middleware('auth:recruteur');

    }

    public function index(){

      $auth_id = Auth::guard('recruteur')->id();

      $recruteur = Recruteur::find($auth_id);

      return view('favoris.index', compact('recruteur'));

    }

    public function store(Request $request){

      $id = Auth::guard('recruteur')->id();
      $candidat_id = $request->candidat;

      $response = $this->checkIfIsFavorite($id, $candidat_id);

      if( ! $response ){

        if( $this->countFavorite($id) ){

          if( $this->hasOption($id) ){

            $this->addToFavorite($id, $candidat_id, $request);

          }else{

            echo "failed";

          }

        }else{

          $this->addToFavorite($id, $candidat_id, $request);

        }

      }

      else{

        $this->deleteFromFavorite($id, $candidat_id, $request);
        return redirect('/favoris' );

      }


    }

    /*
    *
    *  Check if the 'Candidat' Exsist in the favrite list
    *
    */

      public static function checkIfIsFavorite($id_auth, $id_candidat){

      if( Favori::where('candidat_id', $id_candidat)->where('recruteur_id', $id_auth)->count() > 0 )
        return 1;
      else
        return 0;
      }

    /*
    *
    *  Add Candidat To the favorite list for the current 'Recruteur'
    *
    */

      public function addToFavorite($id_auth, $candidat_id, $request){

        $favori = new Favori();

        $favori->recruteur_id = $id_auth;

        $favori->candidat_id = $candidat_id;

        $favori->save();

      }

    /*
    *
    *  Delete the 'Candidat' From the favorite list
    *
    */

    public function deleteFromFavorite($id_auth, $id_candidat, $request){

      Favori::where('candidat_id', $id_candidat)->where('recruteur_id', $id_auth)->delete();

    }

    /*
    *
    *  Count All the 'Candidats' Favorite To The Current 'Recruteur'
    *
    */

    public static function countFavorite($auth_id){

      $recruteur = Recruteur::find($auth_id);

      $count = $recruteur->favoris->count();

      if ($count >= 3 )
        return 1;
      else
        return 0;
    }

    /*
    *
    *  Check If 'Recruteur' Has the option 'Illimited favorite'
    *
    */

    public function hasOption($auth_id){
      $recruteur = Recruteur::find($auth_id);

      if( $recruteur->payFavorite == 1 )
        return 1;
      else
        return 0;
    }
}
