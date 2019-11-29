<?php

namespace App\Http\Controllers;

use App\Recruteur;
use Illuminate\Http\Request;

class RecruteursController extends Controller
{
  public function index(){

  }

  public function show($id){

    $recruteur = Recruteur::findOrFail($id);
    return view('recruteurs.show', compact('recruteur'));

  }
}
