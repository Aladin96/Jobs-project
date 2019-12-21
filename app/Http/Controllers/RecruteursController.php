<?php

namespace App\Http\Controllers;

use App\Recruteur;
use App\Offre;
use Illuminate\Http\Request;
use Auth ;
use DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class RecruteursController extends Controller
{


  public function show($id){
    $recruteur = Recruteur::findOrFail($id);
    $offers = Offre::all()->where('id_recruteur' , $id);
    if (Auth::guard('recruteur')->id() == $id) {
      $statistic = new StatisticsController();
      $lineChart = $statistic->lineChart($id);
      $types = $statistic->GroupedBarChart($id);
      return view('recruteurs.show', compact('recruteur' , 'offers' , 'lineChart' , 'types'));
    }
    return view('recruteurs.show', compact('recruteur' , 'offers'));

  }




  public function edit($id){

    if( Auth::guard('recruteur')->id() != intval($id) ){
      return abort('404');
    }

    $recruteur = Recruteur::findOrFail($id);
    return view('recruteurs.edit', ['data' => $recruteur]);
  }


  public function update(Request $request, $id){

    if( Auth::guard('recruteur')->id() !== intval($id) ){
      return abort('404');
    }

    $recruteur = Recruteur::findOrFail($id);


    // image Configuration

    if($request->has('logo')){
      $logo = $request->file('logo');
      $path = config('images.path'); // Folder: config/images.php

      $extension = $logo->getClientOriginalExtension();
      $name = Str::random(12) . '.' . $extension;

      $logo->move($path, $name);

      $recruteur->logo = 'uploads/' . $name;
    }

    // End Image Configuration



    $recruteur->nom = $request->nom;

    $recruteur->site_web = $request->website;

    $recruteur->tel = $request->tel;

    $recruteur->adresse = $request->adresse;

    $recruteur->email = $request->email;

    $recruteur->type = $request->type;

    if( !empty( $request->password ) ){

        $new_password = Hash::make($request->password);

        if ( $new_password != $recruteur->password ){

            $recruteur->password = $new_password;
        }
    }

    $recruteur->save();
    $request->session()->flash('modified' , 'Changement effectué avec succès');
    return redirect('/recruteur/' . $recruteur->id . '/edit'  );

  }
}
