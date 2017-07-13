<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
   protected $fillable = [
        'id', 'rut', 'nombre', 'apellido',  'direccion', 'escuela','telefono','correo','fecha_nacimiento','tipo_usuario'
    ];

      public function users()
    {
        return $this->morphOne('App\User', 'usertable');
    }
}
