<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ActividadUsuario extends Model
{
    protected $table = 'actividad_usuario';

    public function usuario(){
            return $this->belongsTo('App\User', 'usuario_id');
    }

    public function actividad(){
            return $this->belongsTo('App\Actividad', 'actividad_id');
    }
}
