<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ActividadSimple extends Model
{
    protected $table = 'actividad_individual';

    public function actividad(){
           	return $this->hasOne('App\Actividad', 'id'); 
    }
}
