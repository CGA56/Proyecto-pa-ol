<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prestamos extends Model
{
   protected $fillable = [
       
       'nombre_producto',
       'cantidad',
       'nombre_solicitante',
       'nombre_panolero',
       'estado',
       'fecha_entrega',
       'fecha_pedido',

    ];
}
 