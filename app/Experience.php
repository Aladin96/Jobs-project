<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
  public function cv(){

    return $this->belongsTo('App\Cv', 'id_cv');
  }
}
