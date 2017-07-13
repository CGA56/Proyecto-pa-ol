<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Prestamos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prestamos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_producto');
            $table->integer('cantidad');
            $table->integer('id_solicitante');
            $table->integer('id_panolero');
            $table->string('estado');
            $table->date('fecha_entrega');
            $table->date('fecha_pedido');
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
         Schema::dropIfExists('prestamos');
    }
}
