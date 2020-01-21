<?php

use Illuminate\Database\Seeder;
use App\Producto;
class ProductoSeeder extends Seeder
{

    public function run()
    {
       DB::table('productos')->truncate();
       factory(Producto::class,30)->create();
    }
}
