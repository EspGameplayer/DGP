<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Socio extends Model
{
     protected $table = 'socio';
	 
     
     public function persona(){
           	return $this->hasOne('App\User', 'id'); //id de la tabla socio
   }
}
