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
            //$table->foreignId('ventas_id')->references('id')->on('detalle_venta')->comment('El detalle al que pertenece');
            $table->string('item_id')->references('item_id')->on('items')->comment('El producto Item que se vende');
            $table->foreignId('user_id')->references('id')->on('users')->comment('El usuario que creo el item');
            $table->integer('cantidad')->comment('La cantidad de productos');
            $table->decimal('precio', 8, 2)->comment('El precio del producto');
            $table->decimal('total', 8, 2)->comment('El total de productos');
            $table->date('fecha');
            $table->string('descripcion')->nullable();
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
