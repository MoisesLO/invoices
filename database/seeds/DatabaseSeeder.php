<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
  /**
   * Seed the application's database.
   *
   * @return void
   */
  public function run()
  {
    // $this->call(UsersTableSeeder::class);
    DB::table('categorias')->truncate();
    factory(App\Categoria::class, 50)->create()->each(function ($categoria) {
      $categoria->categorias()->save(factory(App\Categoria::class)->make());
    });
//    $this->call(CategoriaSeeder::class);
//    $this->call(ProductosTable::class);
  }
}
