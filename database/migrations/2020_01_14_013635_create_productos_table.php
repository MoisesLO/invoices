<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductosTable extends Migration
{

  public function up()
  {
    Schema::create('productos', function (Blueprint $table) {
      $table->bigIncrements('id');
      $table->string('codigo',50)->unique();
      $table->string('nombre',50)->unique();
      $table->string('descripcion');
      $table->decimal('preciosinigv', 8, 2);
      $table->decimal('precioconigv', 8, 2);
      $table->unsignedInteger('categoria_id');
      $table->timestamps();
    });
  }

  public function down()
  {
    Schema::dropIfExists('productos');
  }
}
