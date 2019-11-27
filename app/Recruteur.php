<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Recruteur extends Model
{
  use Notifiable;

      protected $guard = 'recruteur';

      protected $fillable = [
          'nom', 'email', 'password',
      ];

      protected $hidden = [
          'password', 'remember_token',
      ];
}
