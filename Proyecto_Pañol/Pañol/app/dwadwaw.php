<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class stock extends Model
{
  protected $fillable = [
        'producto_id', 'fecha', 'cantidad','nombre','marca',
    ];
}
// $table->integer('id');
//             $table->integer('producto_id');
//             $table->date('fecha');
//             $table->integer('cantidad');
//             $table->timestamps();