<?php

use Illuminate\Database\Seeder;
use App\Categoria;

class CategoriaSeeder extends Seeder
{

    public function run()
    {
       DB::table('categorias')->truncate();
       factory(Categoria::class,30)->create();
    }
}
