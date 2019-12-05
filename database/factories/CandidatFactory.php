<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Candidat;
use Faker\Generator as Faker;

$factory->define(Candidat::class, function (Faker $faker) {
    return [
      'nom'                  => $faker->name,
      'prenom'               => $faker->name,
      'civilite'             => $faker->randomElement($array = array ('M','Mlle','Mme', 'Dr', 'Pr')),
      'photo'                => $faker->imageUrl,
      'tel'                  => $faker->e164PhoneNumber,
      'adresse'              => $faker->streetAddress ,
      'date_de_naissance'    => $faker->date($format = 'Y-m-d', $max = 'now'),
      'email'                => $faker->unique()->safeEmail,
      'email_verified_at'    => now(),
      'password'             => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
      'remember_token'       => Str::random(10),
    ];
});
