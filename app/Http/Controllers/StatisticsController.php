<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Offre;
use DB;

class StatisticsController extends Controller
{


  public function offersChart(){

    $all_years  = Offre::select(DB::raw('YEAR(created_at) as year'))->distinct()->get()->pluck('year');

    $year       = request('q') ? intval(request('q')) : 2019;

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

    return view('dashboard.statistics.offres', compact(
                            'janvier', 'fevrier', 'mars',
                            'avril', 'mai', 'juin',
                            'juillet', 'aout', 'septembre',
                            'octobre', 'novembre', 'decembre',
                            'all_years', 'year')
                );

  }


}
