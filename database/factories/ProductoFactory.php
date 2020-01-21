<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;
use App\Producto;

$factory->define(Producto::class, function (Faker $faker) {
   return [
      'codigo' => $faker->regexify('[A-Z0-9]{10}'),
      'nombre' => $faker->sentence(3),
      'preciosinigv' => 72.00,
      'precioconigv' => 100.00,
      'categoria_id' => 1
   ];
});
