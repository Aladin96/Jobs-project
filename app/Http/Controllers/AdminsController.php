<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Candidat;
use App\Recruteur;
use App\Offre;
use Auth;

class AdminsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::guard('admin')->check()) {
          $candidates = count(Candidat::Cursor());
          $recruiters = count(Recruteur::Cursor());
          $earnings = count(Recruteur::All()->where('payFavorite' , 1)) * 20;
          $users = $candidates + $recruiters;
          $candidates_rate = round(($candidates * 100)/$users);
          $recruiters_rate = round(($recruiters * 100)/$users);

          $data = array (
            "users" => $users ,
            "candidates" => $candidates ,
            "recruiters" => $recruiters ,
            "c_rate" => $candidates_rate ,
            "r_rate" => $recruiters_rate ,
            "earnings" => $earnings
          );
          return view('dashboard.index' , compact('data'));
        }
        return ('404');
    }

    public function manageOffers()
    {
      if (Auth::guard('admin')->check()) {
        $offers = Offre::All()->where('status' , 'En_attente');
        return view("dashboard.offers" , compact('offers'));
      }
      else {
        return ('404');
      }
    }

    public function acceptOffers($id)
    {
      
      if (Auth::guard('admin')->check()) {
        $offer = Offre::FindOrFail($id);
        $offer->status = "Publiée";
        $offer->save();
      }
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
        //
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
