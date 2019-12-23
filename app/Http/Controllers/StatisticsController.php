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


  // |-> Profile statistics lineChart

  public function lineChart($id){

    $years  = Offre::select(DB::raw('YEAR(created_at) as year'))->where('id_recruteur' , $id)->distinct()->get()->pluck('year');

    $year   = request('line') ? intval(request('line')) : $years->first();

    $monthData = array();
    for ($i=1 ; $i<=12; $i++) {
      $actual_month = Offre::whereBetween('created_at', [ $year . '-' . $i .'-01', $year . '-'. $i .'-31'])->where('id_recruteur' , $id)->count();
      array_push($monthData , $actual_month);
    }
    // return
    if(request()->ajax()){
      return response()->json( $monthData );
    }

      return $monthData;

  }


  // |-> Profile statistics GroupedBarChart

  public function GroupedBarChart($id){

    $years = $year  = Offre::select(DB::raw('YEAR(created_at) as year'))->where('id_recruteur' , $id)->distinct()->get()->pluck('year');

    $year   = request('bar') ? intval(request('bar')) : $years->first();

    $cdi = $cdd = $stage = array();
    for ($i=1 ; $i<=12; $i++) {
      array_push($stage , Offre::whereBetween('created_at', [ $year . '-' . $i .'-01', $year . '-'. $i .'-31'])->where('id_recruteur' , $id)->where('type' , 'Stage')->count());
      array_push($cdi , Offre::whereBetween('created_at', [ $year . '-' . $i .'-01', $year . '-'. $i .'-31'])->where('id_recruteur' , $id)->where('type' , 'Cdi')->count());
      array_push($cdd , Offre::whereBetween('created_at', [ $year . '-' . $i .'-01', $year . '-'. $i .'-31'])->where('id_recruteur' , $id)->where('type' , 'Cdd')->count());
    }
    return compact('stage' , 'cdi' , 'cdd');
    // return
    if(request()->ajax()){
      return response()->json( $monthData );
    }

      return $monthData;

  }
  public function PieChart($id){

    $years = Offre::select(DB::raw('YEAR(created_at) as year'))->where('id_recruteur' , $id)->distinct()->get()->pluck('year');
    $data = array();

    $year   = request('pie') ? intval(request('pie')) : $years->first();

    $cities = Offre::whereBetween('created_at', [ $year . '-01-01', $year . '-12-31'])->where('id_recruteur' , $id)->distinct()->get()->pluck('lieu_de_travail');
    foreach ( $cities as $city ) {
      $data[$city] = Offre::whereBetween('created_at', [ $year . '-01-01', $year . '-12-31'])->where('id_recruteur' , $id)->where('lieu_de_travail' , $city)->get()->count() ;
    }

    // return
    if(request()->ajax()){
      return response()->json( $data );
    }

      return $data;

  }




}
