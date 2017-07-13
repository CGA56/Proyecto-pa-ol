<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prestamos extends Model
{
   protected $fillable = [
       'cantidad',
       'id_solicitante',
       'id_panolero',
       'fecha_entrega',
       'fecha_pedido',

    ];
}
 