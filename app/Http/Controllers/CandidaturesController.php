<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Candidature;
use App\Cv;
use Auth;

class CandidaturesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
    }
}
