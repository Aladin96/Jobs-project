<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Offre;
use App\Candidat;
use App\Cv;

class SearchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

      if( request('q') && request('societe') && request('domaine') ){

        if( request('societe') == -1 && request('domaine') == -1 ){

          $search = Offre::where('intitule', 'like', '%' . request('q') . '%')->paginate(10);

        }elseif( request('societe') == -1 || request('domaine') != -1 ){

          $search = Offre::where('intitule', 'like', '%' . request('q') . '%')
                          ->where('domaine', request('domaine'))
                          ->paginate(10);

        }elseif( request('societe') != -1 || request('domaine') == -1){

          $search = Offre::where('intitule', 'like', '%' . request('q') . '%')
                          ->where('id_recruteur', request('societe'))
                          ->paginate(10);

        }else{

          $search = Offre::where('intitule', 'like', '%' . request('q') . '%')
                          ->where( 'id_recruteur', request('societe')  )
                          ->where('domaine', request('domaine'))
                          ->paginate(10);
        }


        return view('search.index', compact('search'));

    }else{

      return abort('404');

    }

  }

  public function searchCandidats(){
    if( request('civ') && request('wilaya') && request('formation') ){
      if(request('civ') == -1 && request('wilaya') == -1 && request('formation') != 1 ){

        $result = Cv::whereHas('formation', function($q){ $q->where('domaine', request('formation'));})->distinct()->pluck('id_candidat')->toArray();


      }elseif( request('civ') == '-1' && request('wilaya') != '-1' && request('formation') != '-1' ){

        $result = [];
        $s = Cv::whereHas('formation', function($q){ $q->where('domaine', request('formation'));})->distinct()->pluck('id_candidat')->toArray();

        foreach ($s as $se) {
          $result = Candidat::where('wilaya', request('wilaya'))->where('id', $se)->pluck('id');
        }

      }elseif( request('civ') != '-1' && request('wilaya') == '-1' && request('formation') != '-1' ){

        $result = [];
        $s = Cv::whereHas('formation', function($q){ $q->where('domaine', request('formation'));})->distinct()->pluck('id_candidat')->toArray();

        foreach ($s as $se) {
          $result = Candidat::where('civilite', request('civ'))->where('id', $se)->pluck('id');
        }


      }elseif(request('formation') == '-1' && request('civ') == '-1' && request('wilaya') != '-1'){

        $result = Candidat::where('wilaya', request('wilaya'))->pluck('id')->toArray();


      }elseif( request('formation') == '-1' && request('wilaya') == '-1' && request('civ') != '-1'){

        $result = Candidat::where('civilite', request('civ'))->pluck('id');

      }elseif(request('formation') == '-1' && request('wilaya') != '-1' && request('civ') != '-1'){

        $result = Candidat::where('civilite', request('civ'))->where('wilaya', request('wilaya'))->pluck('id');

      }else{

        $result = [];
        $s = Cv::whereHas('formation', function($q){ $q->where('domaine', 'informatique');})->distinct()->pluck('id_candidat')->toArray();

        foreach ($s as $se) {
          $result = Candidat::where('civilite', request('civ'))->where('wilaya', request('wilaya'))->where('id', $se)->pluck('id');
        }

      }

      return view('search.indexCandidat', compact('result'));
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
