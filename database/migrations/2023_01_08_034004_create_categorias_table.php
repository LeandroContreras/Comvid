<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categorias', function (Blueprint $table) {
            $table->string('categoria_id')->primary();
            $table->string('descripcion');
            $table->string('tamaño')->nullable();
            $table->integer('eje')->nullable();
            $table->string('color')->nullable();
            $table->string('forma')->nullable();
            $table->string('tipo')->nullable();
            $table->string('funcion')->nullable();
            $table->string('malla')->nullable();
            $table->foreignId('user_id')->references('id')->on('users')->comment('El usuario que creo la categoria');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categorias');
    }
}
