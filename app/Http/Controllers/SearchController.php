<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Offre;

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
