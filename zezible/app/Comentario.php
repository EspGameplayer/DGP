<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    protected $table = 'comentario';

    public function actividad(){
           	return $this->belongsTo('App\Actividad', 'actividad_id');  //comentario tiene una actividad
    }

    public function usuario(){
           	return $this->belongsTo('App\User', 'usuario_id');  //comentario tiene un usuario
    }
}
