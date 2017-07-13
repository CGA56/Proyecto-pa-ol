<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Stocks', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('producto_id');
            $table->date('fecha');
            $table->integer('cantidad');
            $table->string('nombre');
            $table->string('marca');
            $table->string('estado');
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
        Schema::dropIfExists('Stocks');
    }
}



 