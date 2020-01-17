<?php

use Illuminate\Database\Seeder;

class ProductosTable extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    DB::table('productos')->truncate();
    DB::table('productos')->insert([
      'codigo' => Str::random(8),
      'nombre' => Str::random(15),
      'preciosinigv' => 82.00,
      'precioconigv' => 100.00
    ]);
  }
}
