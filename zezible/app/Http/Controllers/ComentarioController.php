<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Comentario;

class ComentarioController extends Controller
{
     public function save(Request $request){
    	$validate = $this->validate($request, [
    		'comentario' => 'required'
    	]);

    	$comentario = new Comentario();
    	$usuario =  \Auth::user();
    	
    	$comentario->actividad_id = $request->input('actividad_id'); // el actividad_ID sera el que trae por parametro en la pagina
    	$comentario->usuario_id = $usuario->id;
    	$comentario->comentario = $request->input('comentario');
    	
    	$comentario->save();

    	return redirect()->route('verActividad', ['actividad_id' => $comentario->actividad_id])->with(array(
    	'message' => 'Comentario enviado correctamente'
    ));
    }

    public function eliminar($comentario_id){ 
    	
    	$comentario = Comentario::find($comentario_id); //encuentra el comentario mediante el id(parametro) que se le pase
        $usuario =  \Auth::user();

        if($usuario->id == $comentario->usuario_id){
        $comentario->delete();

    	return redirect()->route('verActividad', ['actividad_id' => $comentario->actividad_id])->with(array(
    	'message2' => 'Comentario eliminado correctamente'
        ));
        
        }else{
             abort(403, "No tienes autorización para eliminar este comentario");
        }
    }
}
