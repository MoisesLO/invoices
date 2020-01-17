<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\Categoria::class, function (Faker $faker) {
  return [
    'codigo' => $faker->text(6),
    'nombre' => $faker->sentence(3),
  ];
});

