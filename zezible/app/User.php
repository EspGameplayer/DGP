<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{

   
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

//---------yo------------

    public function roles(){
         return $this->belongsTo('App\Role', 'role_id');
    }

    public function actividadUsuario(){
         return $this->hasMany('App\ActividadUsuario');
    }

    public function esGestor(){
        if($this->roles->nombre=='Gestor'){
            return true;
        }
        return false;
    }

    public function esSocio(){
        if($this->roles->nombre=='Socio'){
            return true;
        }
        return false;
    }
 
    public function esVoluntario(){
        if($this->roles->nombre=='Voluntario'){
            return true;
        }
        return false;
    }

    public function esNoGestor(){
        if($this->roles->nombre!='Gestor'){
            return true;
        }
        return false;
    }
}
