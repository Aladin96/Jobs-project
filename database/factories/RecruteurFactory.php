<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Recruteur;
use Faker\Generator as Faker;

$factory->define(Recruteur::class, function (Faker $faker) {
    return [
      'nom'                  => $faker->name,
      'type'                 => $faker->randomElement($array = array ('Societé', 'Public')),
      'logo'                => $faker->imageUrl('company'),
      'tel'                  => $faker->e164PhoneNumber,
      'adresse'              => $faker->streetAddress ,
      'site_web'              => $faker->domainName,
      'email'                => $faker->unique()->safeEmail,
      'email_verified_at'    => now(),
      'password'             => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
      'remember_token'       => Str::random(10),
    ];
});
