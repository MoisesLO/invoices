<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
//        Schema::create('usuarios', function (Blueprint $table) {
//            $table->increments('id');
//            $table->string('nombre')->nullable();
//            $table->string('email')->unique();
//            $table->string('rol')->nullable();
//            $table->string('password');
//            $table->integer('empresa_id')->unsigned();
//            $table->foreign('empresa_id')->references('id')->on('empresas');
//            $table->rememberToken();
//            $table->timestamps();
//        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usuarios');
    }
}
