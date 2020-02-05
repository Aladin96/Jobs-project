<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Demande extends Model
{
  public function candidat(){

    return $this->belongsTo('App\Candidat', 'id_candidat');
  }
}
