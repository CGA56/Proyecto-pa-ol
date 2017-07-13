<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{

  protected $fillable = [
        'producto_id', 'fecha', 'cantidad','nombre','marca'
    ];
    
}




// {
//   protected $fillable = [
//         'producto_id', 'fecha', 'cantidad','nombre','marca',
//     ];
// }

// {
//         Schema::create('Stock', function (Blueprint $table) {
//             $table->increments('id');
//             $table->integer('producto_id');
//             $table->date('fecha');
//             $table->integer('cantidad');
//             $table->string('nombre');
//             $table->string('marca');
//             $table->timestamps();
//         });
//     }

//     /**
//      * Reverse the migrations.
//      *
//      * @return void
//      */
//     public function down()
//     {
//         Schema::dropIfExists('Stock');
//     }
// }


