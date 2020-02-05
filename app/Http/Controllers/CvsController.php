<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Candidat;
use Auth;
use App\Cv;
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
        $cv->id_candidat = Auth::guard('candidat')->id() ;
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
          $experience->description = $request->description_exp[$index];
          $experience->save();
        }

        foreach ($request->intitule_competence as $index => $intitule) {
          $competence = new Competence();
          $competence->id_cv = $cv->id;
          $competence->intitule = $intitule;
          $competence->description = $request->description[$index];
          $competence->save();
        }
        return redirect('candidat/'.$cv->id_candidat);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id , $cv)
    {
      $candidat = Candidat::findOrFail($id);
      $cv = Cv::find($cv);
      $cv = array($cv);
      $haveRight = (Auth::guard('candidat')->id() == $candidat->id ) ? true : false;
      $isRecruiter = Auth::guard('recruteur')->check() ;
      return view('candidats.show', compact('candidat' , 'cv' , 'haveRight' , 'isRecruiter'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cv = Cv::find($id);
        $haveRight = (Auth::guard('candidat')->id() == $cv->id_candidat ) ? true : false;
        if ($haveRight) {
          return view('candidats.edit_resume' , compact('cv'));
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
    public function update(Request $request)
    {

        $cv = Cv::findOrFail($request->id_cv);
        if ($cv->id_candidat == Auth::guard('candidat')->id()) {
          $cv->titre = $request->intitule_cv;
          $cv->save();

          // trainings updates
          foreach ($request->diplome as $index => $diplome) {
            if ($request->formation_action[$index] == "update") {
              $formation = Formation::findOrFail($request->formation_id[$index]);
              $formation->diplome = $diplome;
              $formation->domaine = $request->domaine[$index];
              $formation->lieu = $request->lieu[$index];
              $formation->date_debut = $request->dd_formation[$index];
              $formation->date_fin = $request->df_formation[$index];
              $formation->save();
            }
            elseif ($request->formation_action[$index] == "remove"){
              $formation = Formation::findOrFail( $request->formation_id[$index] ) ;
              $formation->delete();
            }
            else {
              $formation = new Formation();
              $formation->id_cv = $cv->id;
              $formation->diplome = $request->diplome[$index];
              $formation->domaine = $request->domaine[$index];
              $formation->lieu = $request->lieu[$index];
              $formation->date_debut = $request->dd_formation[$index];
              $formation->date_fin = $request->df_formation[$index];
              $formation->save();
            }
          }

          // experiences updates
          foreach ($request->intitule_experience as $index => $intitule) {
            if ($request->experience_action[$index] == "update") {
              $experience = Experience::findOrFail($request->experience_id[$index]);
              $experience->intitule = $intitule;
              $experience->lieu = $request->wilaya[$index];
              $experience->date_debut = $request->dd_experience[$index];
              $experience->date_fin = $request->df_experience[$index];
              $experience->save();
            }
            elseif ($request->experience_action[$index] == "remove"){
              $experience = Experience::findOrFail($request->experience_id[$index]) ;
              $experience->delete();
            }
            else {
              $experience = new Experience();
              $experience->intitule = $intitule;
              $experience->id_cv = $cv->id;
              $experience->lieu = $request->wilaya[$index];
              $experience->date_debut = $request->dd_experience[$index];
              $experience->date_fin = $request->df_experience[$index];
              $experience->save();
            }

          }


          // skills updates
         foreach ($request->intitule_competence as $index => $intitule) {
            if ($request->competence_action[$index] == "update") {
              $competence = Competence::findOrFail($request->competence_id[$index]);
              $competence->intitule = $intitule;
              $competence->description = $request->description[$index];
              $competence->save();
            }
            elseif ($request->competence_action[$index] == "remove"){
              $competence = Competence::findOrFail($request->competence_id[$index]);
              $competence->delete();
            }
            else {
              $competence = new Competence();
              $competence->id_cv = $cv->id;
              $competence->intitule = $intitule;
              $competence->description = $request->description[$index];
              $competence->save();
            }
          }


          $request->session()->flash('modified' , 'Changement effectué avec succès');
          return  redirect()->back();

        }


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $cv = Cv::findOrFail($id);
      $haveRight = (Auth::guard('candidat')->id() == $cv->id_candidat ) ? true : false;
      if ($haveRight) {
        $candidat = $cv->id_candidat;
        $cv->delete();
        return redirect('/candidat/'.$candidat);
      }
      else {
      return "404";
      }
    }
}
