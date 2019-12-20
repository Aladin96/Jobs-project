<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Offre;
use DB;

class StatisticsController extends Controller
{


  public function offersChart(){

    $all_years  = Offre::select(DB::raw('YEAR(created_at) as year'))->distinct()->get()->pluck('year');

    $year   = request('q') ? intval(request('q')) : date('Y');
    $month  = [];

    for ( $i=0; $i<12; $i++ ){
      $month[$i]  = Offre::whereBetween('created_at', [ $year . '-0' . ($i+1) . '-01', $year . '-0' . ($i+1) . '-31'])->count();
    }

  $data = compact('month', 'all_years', 'year');

  if(request()->ajax()){
    return response()->json( $data );
  }

    return view('dashboard.statistics.offres', $data );

  }


}
