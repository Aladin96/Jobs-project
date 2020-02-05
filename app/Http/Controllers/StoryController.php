<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Candidat;
use App\Story;
use Auth;

class StoryController extends Controller
{
    public function index(){

      $stories = Story::all();

      return view('stories.index', compact('stories'));

    }

    public function store(Request $request){

      $story = new Story();

      $story->id_candidat = Auth::guard('candidat')->id();
      $story->description = $request->description;

      $story->save();

      $request->session()->flash('publiée' , 'Story ajouté avec success');

      return redirect('/stories/create');




    }
}
