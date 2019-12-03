<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Offre ;

class HomeController extends Controller
{
    public function index()
    {
      $offers = Offre::Cursor();
      return view ('index' , compact('offers'));
    }
}
