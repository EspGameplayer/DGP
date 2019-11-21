<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gestor extends Model
{
    protected $table = 'gestor';

     public function persona(){
           	return $this->hasOne('App\User', 'id'); //id de la tabla gestor
   }
}
