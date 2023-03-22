<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetalleVentaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_venta', function (Blueprint $table) {
            $table->id();
            $table->foreign('venta_id')->references('id')->on('ventas')->comment('A la venta que pertenece ');
            $table->foreign('id_ingreso')->references('id')->on('detalle_ingreso')->comment('Al ingreso que pertenece');
            $table->decimal('total', 8, 2)->comment('La cantidad de productos');
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
        Schema::dropIfExists('detalle_venta');
    }
}
