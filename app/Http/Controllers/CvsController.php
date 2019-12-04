<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Cv;
use Auth;
use App\Formation;
use App\Experience;
use App\Competence;

class CvsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::guard('candidat')->check())
          return view ('candidats.resume');
        else {
          return ('404');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cv = new Cv();
        $cv->id_candidat = 1 ;
        $cv->titre = $request->intitule_cv ;
        $cv->divers = "" ;
        $cv->document = "" ;
        $cv->save();

        foreach ($request->diplome as $index => $diplome) {
          $formation = new Formation();
          $formation->id_cv = $cv->id;
          $formation->diplome = $diplome;
          $formation->domaine = $request->domaine[$index];
          $formation->lieu = $request->lieu[$index];
          $formation->date_debut = $request->dd_formation[$index];
          $formation->date_fin = $request->df_formation[$index];
          $formation->save();
        }

        foreach ($request->intitule_experience as $index => $intitule) {
          $experience = new Experience();
          $experience->intitule = $intitule;
          $experience->id_cv = $cv->id;
          $experience->lieu = $request->wilaya[$index];
          $experience->date_debut = $request->dd_experience[$index];
          $experience->date_fin = $request->df_experience[$index];
          $experience->save();
        }

        foreach ($request->intitule_competence as $index => $intitule) {
          $competence = new Competence();
          $competence->id_cv = $cv->id;
          $competence->intitule = $intitule;
          $competence->description = $request->description[$index];
          $competence->save();
        }
        return ("Resume uploaded with succeess");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
}
