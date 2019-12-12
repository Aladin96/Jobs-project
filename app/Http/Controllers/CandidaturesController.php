<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Candidature;
use App\Cv;
use App\Offre;
use Auth;

class CandidaturesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $row = Offre::All()->where('id_recruteur', Auth::guard('recruteur')->id());
        if ( count($row) ) {
          $all = Offre::with('candidatures')->find($id);
          $applies = $all->candidatures;
          return view('offres.applies' , compact('applies'));
        }
        else {
          return ("404");
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
        if (isset($request->offer_id)) {
          $candidat_id = Auth::guard('candidat')->id();
          $ifExist = Candidature::All()->where('id_offre' , $request->offer_id)->where('id_candidat' , $candidat_id);
          if (!count($ifExist)) {
            $new = new Candidature();
            $new->id_offre = $request->offer_id ;
            $new->id_candidat = $candidat_id ;
            $new->choix = 0 ;
            $new->save();
            return('ok');
          }
          else {
            echo "error";
          }
        }
        $offer_id = $request->offer ;
        $candidat_id = Auth::guard('candidat')->id();
        $ifExist = Candidature::All()->where('id_offre' , $offer_id)->where('id_candidat' , $candidat_id);

        $ownResume = Cv::All()->where('id' , $request->choice)->where('id_candidat' , $candidat_id);

        if (!count($ifExist)) {
          if ($request->choice != 0 and !count($ownResume)) {
            return ('error');
          }
          $new = new Candidature();
          $new->id_offre = $offer_id ;
          $new->id_candidat = $candidat_id ;
          $new->choix = $request->choice ;
          $new->save();
        }
        else {
          return ('error');
        }
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
      $id_candidat = Auth::guard('candidat')->id();
      $apply = Candidature::All()->where('id_candidat' , $id_candidat)->where('id_offre' , $id);
      if ( count($apply) ) {
        $apply[0]->delete();
      }
      else {
        echo "error";
      }
    }
}
