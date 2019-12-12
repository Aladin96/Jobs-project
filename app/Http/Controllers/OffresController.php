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

        if( request('societe') || request('domaine') ){

          $domaine = request('domaine');
          $societe = request('societe');

          if( request('societe') != '' && request('domaine') != '' ){

            $offers = Offre::where('id_recruteur', request('societe'))
                             ->where('domaine', request('domaine'))
                             ->paginate(1);

           $links = $offers->appends( compact('domaine', 'societe') );

           return view ('offres.index' , compact('offers', 'links'));

          }elseif( empty(request('societe')) ){

            $offers = Offre::where('domaine', request('domaine'))
                             ->paginate(1);

            $links = $offers->appends( compact('domaine') );

            return view ('offres.index' , compact('offers', 'links'));

          }elseif( empty(request('domaine')) ){
            $offers = Offre::where('id_recruteur', request('societe'))
                             ->paginate(1);

           $links = $offers->appends( compact('societe') );

           return view ('offres.index' , compact('offers', 'links'));
          }
        }else{

          $offers = Offre::paginate(1);

          $links = $offers->links();

          return view ('offres.index' , compact('offers', 'links'));

        }


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
        $offer->vues += 1;
        $offer->save();
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
      $recId = Auth::guard('recruteur')->id();
      $offer = Offre::FindOrFail($id);
      if ($id == $recId) {
        return view('offres.edit' , compact('offer'));
      }
      else {
        return ('404');
      }
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
      $offre = Offre::FindOrFail($id);
      $type = intval( $request->input('type') );

      if( $type == 1 ) $type = "Stage";
      elseif( $type == 2 ) $type = "Cdi";
      else $type = "Cdd";

      // duree

      $duree = intval( $request->input('duree') );

      if( $duree == 1 ) $duree = "CDD";
      else $duree = "Stage";

      $offre->intitule = $request->intitule;

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

      $request->session()->flash('updated' , 'Offre Modiffier avec succès');

      return redirect('/offre/'.$id.'/modifier');
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
