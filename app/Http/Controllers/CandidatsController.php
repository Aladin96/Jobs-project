<?php

namespace App\Http\Controllers;

use App\Candidat;

use Illuminate\Http\Request;

class CandidatsController extends Controller
{

    public function index(){

    }

    public function show($id){

      $candidat = Candidat::findOrFail($id);
      return view('candidats.show', compact('candidat'));

    }
    
}
