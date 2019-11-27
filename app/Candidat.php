<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Candidat extends Authenticatable
{
  use Notifiable;

     protected $guard = 'candidat';

     protected $fillable = [
         'nom', 'email', 'password',
     ];

     protected $hidden = [
         'password', 'remember_token',
     ];
}
