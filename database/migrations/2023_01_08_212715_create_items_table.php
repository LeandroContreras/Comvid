<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->string('item_id')->primary();
            $table->string('categoria_id')->references('categoria_id')->on('categorias')->comment('La categorìa que se relaciona con el Item');
            $table->string('contacto_id')->references('id')->on ('contactos')->comment('El contacto que se relaciona');
            $table->string('nombre');
            $table->decimal('precio', 5, 2);
            $table->integer('estado')->default('1');
            $table->integer('cantidad');
            $table->string('obs');
            $table->date('fecha');
            $table->foreignId('user_id')->references('id')->on('users')->comment('El usuario que creo el item');
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
        Schema::dropIfExists('items');
    }
}
