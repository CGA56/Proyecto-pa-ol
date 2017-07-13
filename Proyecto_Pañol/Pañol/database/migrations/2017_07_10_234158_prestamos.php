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
            $table->integer('nombre_producto');
            $table->integer('cantidad');
            $table->integer('nombre_solicitante');
            $table->integer('nombre_panolero')->nullable();;
            $table->string('estado');
            $table->date('fecha_entrega')->nullable();;
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
