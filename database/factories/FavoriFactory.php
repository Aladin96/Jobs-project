<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Favori;
use Faker\Generator as Faker;

$factory->define(Favori::class, function (Faker $faker) {
    return [
        'recruteur_id' => 18,
         'candidat_id' => factory(App\Candidat::class)
    ];
});
