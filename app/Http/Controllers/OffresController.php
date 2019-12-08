<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Offre;
use Auth;

class OffresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
        $offers = Offre::Cursor();
        return view ('offres.index' , compact('offers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $this->CheckRecruteur();
        return view('offres.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->CheckRecruteur();

        $offre = new Offre();

        // Type offre

        $type = intval( $request->input('type') );

        if( $type == 1 ) $type = "Stage";
        elseif( $type == 2 ) $type = "Cdi";
        else $type = "Cdd";

        // duree

        $duree = intval( $request->input('duree') );

        if( $duree == 1 ) $duree = "CDD";
        else $duree = "Stage";

        $offre->id_recruteur = Auth::guard('recruteur')->id();

        $offre->intitule = $request->intitule;

        $offre->status = "Publiée";

        $offre->type = $type;

        $offre->domaine = $request->domaine;

        $offre->lieu_de_travail = $request->lieu;

        $offre->diplome = $request->diplome;

        $offre->competences = $request->competences;

        $offre->remuneration = $request->remuneration;

        $offre->date_debut = $request->date_debut;

        $offre->annee_experience = $request->annee_experience;

        $offre->duree = $duree;

        $offre->description = $request->description;

        $offre->save();

        $request->session()->flash('publiée' , 'Offre ajouter avec succès');

        return redirect('/offre/create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $offer = Offre::FindOrFail($id);
        $haveRight = ( $offer->recruteur->id == Auth::guard('recruteur')->id() ) ? true : false ;
        return view ('offres.show' , compact('offer' , 'haveRight'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function CheckRecruteur(){

      if( ! Auth::guard('recruteur')->check() ){
        return abort('404');
      }

    }
}
