<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Usuario extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('usuarios', function (Blueprint $table) {
            $table->increments('id');
            $table->string('rut');
            $table->string('nombre');
            $table->string('apellido');
            $table->string('direccion');
            $table->string('escuela');
            $table->string('telefono');
            $table->string('correo');
           // $table->date('fecha_nacimiento');
           // $table->string('tipo_usuario');
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
        Schema::dropIfExists('usuarios');
    }
}
