<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Actividad extends Model
{
    protected $table = 'actividad';

     public function categoria(){
           	return $this->belongsTo('App\Categoria', 'categoria_id');  //actividad tiene una categoria
    }

    public function usuario(){
           	return $this->belongsTo('App\User', 'usuario_id');  //actividad tiene un usuario
    }

    public function comentarios(){
   	        return $this->hasMany('App\Comentario');
    }

    public function actividadGrupal(){
            return $this->hasOne('App\ActividadGrupal', 'id');
    }

    public function actividadUsuario(){
            return $this->hasMany('App\ActividadUsuario');
    }
}
