<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ActividadGrupal extends Model
{
    protected $table = 'actividad_grupal';

    public function actividad(){
           	return $this->hasOne('App\Actividad', 'id'); 
    }
}
