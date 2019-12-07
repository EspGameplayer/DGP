<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Valoracion extends Model
{
    protected $table = 'valoracion';

    public function socio(){
            return $this->belongsTo('App\Socio', 'socio_id');
    }
    
    public function voluntario(){
            return $this->belongsTo('App\Voluntario', 'voluntario_id');
    }

    public function actividad(){
            return $this->belongsTo('App\Actividad', 'actividad_id');
    }
}
