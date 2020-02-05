<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Offre;
use DB;

class StatisticsController extends Controller
{




  // |-> Profile statistics lineChart

  public function lineChart($id , $years = [] , $op = "="){

    $year   = request('line') ? intval(request('line')) : $years->first();

    $monthData = array();
    for ($i=1 ; $i<=12; $i++) {
      $actual_month = Offre::whereBetween('created_at', [ $year . '-' . $i .'-01', $year . '-'. $i .'-31'])->where('id_recruteur' ,$op, $id)->count();
      array_push($monthData , $actual_month);
    }
    // return
    if(request()->ajax()){
      return response()->json( $monthData );
    }

      return $monthData;

  }


  // |-> Profile statistics GroupedBarChart

  public function GroupedBarChart($id , $years = [] , $op = "="){

    $year   = request('bar') ? intval(request('bar')) : $years->first();

    $cdi = $cdd = $stage = array();
    for ($i=1 ; $i<=12; $i++) {
      array_push($stage , Offre::whereBetween('created_at', [ $year . '-' . $i .'-01', $year . '-'. $i .'-31'])->where('id_recruteur' ,$op, $id)->where('type' , 'Stage')->count());
      array_push($cdi , Offre::whereBetween('created_at', [ $year . '-' . $i .'-01', $year . '-'. $i .'-31'])->where('id_recruteur' ,$op, $id)->where('type' , 'Cdi')->count());
      array_push($cdd , Offre::whereBetween('created_at', [ $year . '-' . $i .'-01', $year . '-'. $i .'-31'])->where('id_recruteur' ,$op, $id)->where('type' , 'Cdd')->count());
    }
    return compact('stage' , 'cdi' , 'cdd');


  }

  public function PieChart($id , $years = [], $op = "="){

    $data = array();
    $year   = request('pie') ? intval(request('pie')) : $years->first();

    $cities = Offre::whereBetween('created_at', [ $year . '-01-01', $year . '-12-31'])->where('id_recruteur' ,$op, $id)->distinct()->get()->pluck('lieu_de_travail');
    foreach ( $cities as $city ) {
      $data[$city] = Offre::whereBetween('created_at', [ $year . '-01-01', $year . '-12-31'])->where('id_recruteur' ,$op, $id)->where('lieu_de_travail' , $city)->get()->count() ;
    }

    // return
    if(request()->ajax()){
      return response()->json( $data );
    }

      return $data;

  }

  public function ndBar($id , $years = [] , $op = "="){

    $year   = request('ndbar') ? intval(request('ndbar')) : $years->first();

    $cdi = $cdd = $stage = array();
    for ($i=1 ; $i<=12; $i++) {
      array_push($stage , Offre::whereBetween('created_at', [ $year . '-' . $i .'-01', $year . '-'. $i .'-31'])->where('id_recruteur' ,$op, $id)->where('type' , 'Stage')->count());
      array_push($cdi , Offre::whereBetween('created_at', [ $year . '-' . $i .'-01', $year . '-'. $i .'-31'])->where('id_recruteur' ,$op, $id)->where('type' , 'Cdi')->count());
      array_push($cdd , Offre::whereBetween('created_at', [ $year . '-' . $i .'-01', $year . '-'. $i .'-31'])->where('id_recruteur' ,$op, $id)->where('type' , 'Cdd')->count());
    }
    return compact('stage' , 'cdi' , 'cdd');


  }



}
