<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Voluntario extends Model
{
     protected $table = 'voluntario';

     public function persona(){
           	return $this->hasOne('App\User', 'id'); //id de la tabla voluntario
   }
}
