<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Valoracion;
use App\User;

class ValoracionController extends Controller
{
     public function save(Request $request){
    	$validate = $this->validate($request, [
    		'descripcion' => 'required'
    	]);

    	$valoracion = new Valoracion();
    	$user =  \Auth::user();
    	$usuario = User::findOrFail($user->id);

    	if($usuario->roles->nombre == "Socio"){
    		$valoracion->socio_id = $usuario->id;
    		$valoracion->estado = "socio-voluntario";
    		$valoracion->voluntario_id = $request->input('apuntado_id');
    	}
    	if($usuario->roles->nombre == "Voluntario"){
    		$valoracion->voluntario_id = $usuario->id;
    		$valoracion->estado = "voluntario-socio";
    		$valoracion->socio_id = $request->input('apuntado_id');
    	}

    	$valoracion->actividad_id = $request->input('actividad_id');
    	$valoracion->descripcion = $request->input('descripcion');
    	$valoracion->valoracion = $request->input('estrellas');
    	
    	$valoracion->save();

    	return redirect()->route('verActividad', ['actividad_id' => $valoracion->actividad_id])->with(array(
    	'message' => 'Valoración realizada correctamente'
    	));
    }
}
