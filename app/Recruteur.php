<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Recruteur extends Authenticatable
{
  use Notifiable;

      protected $guard = 'recruteur';

      protected $fillable = [
          'nom', 'email', 'password', 'type', 'adresse', 'tel', 'site_web'
      ];

      protected $hidden = [
          'password', 'remember_token',
      ];
}
