<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Offre;
use DB;

class StatisticsController extends Controller
{


  public function offersChart(){

    $all_years  = Offre::select(DB::raw('YEAR(created_at) as year'))->distinct()->get()->pluck('year');

<<<<<<< HEAD
    $year       = request('q') ? intval(request('q')) : date('Y');

    $janvier    = Offre::whereBetween('created_at', [ $year . '-01-01', $year . '-01-31'])->count();
    $fevrier    = Offre::whereBetween('created_at', [ $year . '-02-01', $year . '-02-31'])->count();
    $mars       = Offre::whereBetween('created_at', [ $year . '-03-01', $year . '-03-31'])->count();
    $avril      = Offre::whereBetween('created_at', [ $year . '-04-01', $year . '-04-31'])->count();
    $mai        = Offre::whereBetween('created_at', [ $year . '-05-01', $year . '-05-31'])->count();
    $juin       = Offre::whereBetween('created_at', [ $year . '-06-01', $year . '-06-31'])->count();
    $juillet    = Offre::whereBetween('created_at', [ $year . '-07-01', $year . '-07-31'])->count();
    $aout       = Offre::whereBetween('created_at', [ $year . '-08-01', $year . '-08-31'])->count();
    $septembre  = Offre::whereBetween('created_at', [ $year . '-09-01', $year . '-09-31'])->count();
    $octobre    = Offre::whereBetween('created_at', [ $year . '-10-01', $year . '-10-31'])->count();
    $novembre   = Offre::whereBetween('created_at', [ $year . '-11-01', $year . '-11-31'])->count();
    $decembre   = Offre::whereBetween('created_at', [ $year . '-12-01', $year . '-12-31'])->count();
=======
    $year   = request('q') ? intval(request('q')) : date('Y');
    $month  = [];

    for ( $i=0; $i<12; $i++ ){
      $month[$i]  = Offre::whereBetween('created_at', [ $year . '-0' . ($i+1) . '-01', $year . '-0' . ($i+1) . '-31'])->count();
    }

  $data = compact('month', 'all_years', 'year');
>>>>>>> 4f77f57fbd393a5f74763f3c47d9ca48b0d1fc42

  if(request()->ajax()){
    return response()->json( $data );
  }

    return view('dashboard.statistics.offres', $data );

  }


}
