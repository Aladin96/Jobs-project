<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cv extends Model
{
  public function formation(){
    return $this->hasMany('App\Formation', 'id_cv', 'id');
  }
}
