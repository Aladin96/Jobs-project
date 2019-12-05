<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cv extends Model
{
  public function formation(){
    return $this->hasMany('App\Formation', 'id_cv', 'id');
  }
  public function experience(){
    return $this->hasMany('App\Experience', 'id_cv', 'id');
  }
  public function competence(){
    return $this->hasMany('App\Competence', 'id_cv', 'id');
  }
}
