<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
     protected $fillable = [
        'categoria_producto', 'nombre_producto', 'Marca o proveedor', 'cantidad_disponible', 'observacion'
    ];
}


 