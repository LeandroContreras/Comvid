<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVentasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ventas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cliente_id')->refernces('id')->on('contactos')->comment('El cliente que compra');
            $table->foreignId('user_id')->references('id')->on('users')->comment('El usuario que creo la categoria');
            $table->string('item_id')->references('item_id')->on('items')->comment('El producto Item que se vende');
            $table->decimal('cantidad', 8, 2)->comment('La cantidad de productos');
            $table->date('fecha');
            $table->string('descripcion');
            $table->string('estado')->default(1);
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
        Schema::dropIfExists('ventas');
    }
}
