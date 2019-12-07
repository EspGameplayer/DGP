<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Actividad;
use App\ActividadGrupal;
use App\ActividadSimple;
use App\ActividadUsuario;
use App\Categoria;
use App\User;

//tipo de actividad ->  Simple o Grupal
//estado de actividad -> Disponible o Cerrada

class ActividadController extends Controller
{
    public function index()
    {
       $actividades = Actividad::where('estado', 'Disponible')
                                ->orderBy('id', 'desc')
                                ->paginate(6);

       return view('actividad.Index', array(
       'actividades'  => $actividades,
        ));
    }

    public function verActividad($actividad_id)
    {
        $actividad = Actividad::find($actividad_id);
        $usuario = \Auth::user();


        $totalApuntados = ActividadUsuario::where('actividad_id', ($actividad->id))
                                          ->count();

        //-----------consulta extraña--------------
        
        $apuntado = ActividadUsuario::where('usuario_id', ($usuario->id))->
                                      where('actividad_id', ($actividad->id))
                                    ->first();

        return view('actividad.verActividad', array(
        'actividad'  => $actividad,
        'apuntado' => $apuntado, //hay que enviar la variable igual, la vista vera si la recoge o no
        'totalApuntados' => $totalApuntados,
        ));

           //sucede pq queremos verificar si el usuario autenticado esta apuntado 
           //en la actividad, y como la pk es un id y no el conjunto de las 2 fk
           //solo necesito capturar el primer objeto de esa consulta.
           //en la vista vemos si existe esa variable para mostrar el boton desapuntar.
        
         //-----------fin consulta extraña--------------
		     
    }

    public function crearGrupal(){

      $categorias = Categoria::all();

      return view('actividad.crearActividad', array(
          'categorias' => $categorias,
      ));
    }

    public function saveGrupal(Request $request){

        $validate = $this->validate($request, [
            'nombre' => 'required|max:255',
            /*'fecha' => 'required',
            'hora' => 'required',
            'lugar' => 'required',*/
        ]);

        $usuario =  \Auth::user();
        $actividad = new Actividad();
        
        $actividad->nombre = $request->input('nombre');
        $actividad->fecha = $request->input('fecha');
        $actividad->hora = $request->input('hora');
        $actividad->descripcion = $request->input('descripcion');
        $actividad->lugar = $request->input('lugar');
        $actividad->categoria_id = $request->input('categorias');
        $actividad->usuario_id = $usuario->id;
        $actividad->tipo = "Grupal";
        $actividad->estado = "Disponible";

        $actividad->save();

        
        $grupal = new ActividadGrupal();
        $grupal->id = $actividad->id;
        $grupal->maximo_socios = $request->input('maximo_socios');        
        $grupal->minimo_voluntarios = $request->input('minimo_voluntarios');
        $grupal->cupo_socios = $request->input('maximo_socios');        
        $grupal->cupo_voluntarios = $request->input('minimo_voluntarios');
        $grupal->save();
                        
        return redirect()->route('actividadesList');

    }


    public function crearSimple(){

      $categorias = Categoria::all();

      return view('actividad.crearActividads', array(
          'categorias' => $categorias,
      ));
    }

    public function saveSimple(Request $request){

        $validate = $this->validate($request, [
            'nombre' => 'required|max:255',
            /*'fecha' => 'required',
            'hora' => 'required',
            'lugar' => 'required',*/
        ]);

        $usuario =  \Auth::user();
        $actividad = new Actividad();

        $actividad->nombre = $request->input('nombre');
        $actividad->fecha = $request->input('fecha');
        $actividad->hora = $request->input('hora');
        $actividad->descripcion = $request->input('descripcion');
        $actividad->lugar = $request->input('lugar');
        $actividad->categoria_id = $request->input('categorias');
        $actividad->usuario_id = $usuario->id;
        $actividad->tipo = "Simple";
        $actividad->estado = "Disponible";

        $actividad->save();
        
        $simple = new ActividadSimple();
        $simple->id = $actividad->id;
        $simple->save();

        $apuntar = new ActividadUsuario();
        $apuntar->actividad_id = $actividad->id;
        $apuntar->usuario_id = $usuario->id;
        $apuntar->save();

        return redirect()->route('actividadesList');

    }


    public function actualizar($actividad_id){

      $actividad = Actividad::find($actividad_id); 
      $categorias = Categoria::all();
      $usuario =  \Auth::user();

      if($usuario->id == $actividad->usuario_id){

      if($actividad->tipo == "Grupal"){
        return view('actividad.actualizarActividad', array(
          'actividad' => $actividad,
          'categorias' => $categorias,
        ));
      }

      if($actividad->tipo == "Simple"){
        return view('actividad.actualizarActividads', array(
          'actividad' => $actividad,
          'categorias' => $categorias,
        ));        
      }

      }else{
        abort(403, "No tienes autorización para modificar esta actividad");
      }
      
    }

    public function updateGrupal($actividad_id,Request $request){

        $validate = $this->validate($request, [
            'nombre' => 'required|max:255',
            /*'fecha' => 'required',
            'hora' => 'required',
            'lugar' => 'required',*/
        ]);

        $usuario =  \Auth::user();
        $actividad = Actividad::findOrFail($actividad_id); 
        
        $actividad->nombre = $request->input('nombre');
        $actividad->fecha = $request->input('fecha');
        $actividad->hora = $request->input('hora');
        $actividad->descripcion = $request->input('descripcion');
        $actividad->lugar = $request->input('lugar');
        $actividad->categoria_id = $request->input('categorias');

        $actividad->update();
        
      
        $grupal = ActividadGrupal::findOrFail($actividad_id); 

        $sociosApuntados = DB::table('actividad_usuario')
            ->join('users', 'actividad_usuario.usuario_id', '=', 'users.id')
            ->join('actividad', 'actividad_usuario.actividad_id', '=', 'actividad.id')
            ->where('users.role_id', 2)
            ->where('actividad_usuario.actividad_id', $actividad->id)
            ->count();

        $voluntariosApuntados = DB::table('actividad_usuario')
            ->join('users', 'actividad_usuario.usuario_id', '=', 'users.id')
            ->join('actividad', 'actividad_usuario.actividad_id', '=', 'actividad.id')
            ->where('users.role_id', 3)
            ->where('actividad_usuario.actividad_id', $actividad->id)
            ->count();

   /*     $sociosApuntados = ActividadUsuario::where('actividad_id', $grupal->id)
                                           ->where('usuario_id', $socios->id)
                                           ->count();

        $voluntariosApuntados = ActividadUsuario::where('actividad_id', $grupal->id)
                                                ->where('usuario_id', $voluntarios->id)
                                                ->count();
*/

        $restaSocios =  $request->input('maximo_socios') - $sociosApuntados;                                       
        if($restaSocios<0){
          //error->existen mas personas apuntadas que el maximo
          abort(403, "Ya existen mas personas apuntadas que el maximo ingresado");
        }
        elseif($restaSocios==0){
           $grupal->maximo_socios = $request->input('maximo_socios'); 
           $grupal->cupo_socios = $restaSocios;
           $grupal->update();
        }
        else{
          $grupal->maximo_socios = $request->input('maximo_socios'); 
          $grupal->cupo_socios = $restaSocios;
          $grupal->update();
        }

        $restaVoluntarios = $request->input('minimo_voluntarios') - $voluntariosApuntados;

        //if($restaVoluntarios>0){
          $grupal->minimo_voluntarios = $request->input('minimo_voluntarios'); 
          $grupal->cupo_voluntarios = $restaVoluntarios;
          $grupal->update();
        //}

        if($grupal->cupo_socios == 0 && $grupal->cupo_voluntarios <= 0){
          $act = Actividad::findOrFail($grupal->id); 
          $act->estado = "Cerrada";
          $act->update();
        }

         return redirect()->route('verActividad', ['actividad_id' => $actividad->id])->with(array(
        'message' => 'Actividad actualizada correctamente'
        ));

    }

    public function updateSimple($actividad_id, Request $request){

        $validate = $this->validate($request, [
            'nombre' => 'required|max:255',
            /*'fecha' => 'required',
            'hora' => 'required',
            'lugar' => 'required',*/
        ]);

        $usuario =  \Auth::user();
        $actividad = Actividad::findOrFail($actividad_id); 

        $actividad->nombre = $request->input('nombre');
        $actividad->fecha = $request->input('fecha');
        $actividad->hora = $request->input('hora');
        $actividad->descripcion = $request->input('descripcion');
        $actividad->lugar = $request->input('lugar');
        $actividad->categoria_id = $request->input('categorias');
      /*$actividad->usuario_id = $usuario->id;
        $actividad->tipo = "Simple";
        $actividad->estado = "Disponible"; */

        $actividad->update();
        
      /*$simple = ActividadSimple::findOrFail($actividad_id); 
        $simple->id = $actividad->id;
        $simple->save(); */

      /*$apuntar = new ActividadUsuario();
        $apuntar->actividad_id = $actividad->id;
        $apuntar->usuario_id = $usuario->id;
        $apuntar->save(); */

        return redirect()->route('verActividad', ['actividad_id' => $actividad->id])->with(array(
        'message' => 'Actividad actualizada correctamente'
        ));

    }

    public function apuntar($actividad_id) 
    {
        $actividad = Actividad::find($actividad_id); 
        $usuario =  \Auth::user();
        
        if($actividad->tipo == "Simple"){

          $actividad->estado = "Cerrada";
          $actividad->update();
          $apuntar = new ActividadUsuario();
          $apuntar->actividad_id = $actividad->id;
          $apuntar->usuario_id = $usuario->id;
          $apuntar->save();

        }

        if($actividad->tipo == "Grupal"){

          $grupal = ActividadGrupal::find($actividad_id); 
          if($usuario->roles->nombre == "Socio"){
            $grupal->decrement('cupo_socios');
            if($grupal->cupo_socios == 0){
              $actividad->estado = "Cerrada";
              $actividad->update();
            }
          }
          if($usuario->roles->nombre == "Voluntario"){
            $grupal->decrement('cupo_voluntarios');
            if($grupal->cupo_voluntarios == 0){
              $actividad->estado = "Cerrada";
              $actividad->update();
            }
          }
          $grupal->update();
          $apuntar = new ActividadUsuario();
          $apuntar->actividad_id = $actividad->id;
          $apuntar->usuario_id = $usuario->id;
          $apuntar->save();

        }

        return redirect()->route('verActividad', ['actividad_id' => $actividad->id])->with(array(
        'message' => 'Apuntado correctamente a la actividad'
        ));
    }

    public function desapuntar($actividad_id) 
    {
        $actividad = Actividad::find($actividad_id); 
        $usuario =  \Auth::user();
        
        if($actividad->tipo == "Simple"){
           if($usuario->roles->nombre == $actividad->usuario->roles->nombre){
            //eliminar.
                return redirect()->action(
                  'ActividadController@eliminar', ['actividad_id' => $actividad->id]
                );
           }else{
            $actividad->estado = "Disponible";
            $actividad->update();
            $apuntado = ActividadUsuario::where('usuario_id', ($usuario->id))
                                        ->where('actividad_id', ($actividad->id))
                                        ->first();
            $apuntado->delete();
           }
        }

        if($actividad->tipo == "Grupal"){

          $grupal = ActividadGrupal::find($actividad_id); 
          if($usuario->roles->nombre == "Socio"){
            if($grupal->cupo_socios == 0){
              $grupal->increment('cupo_socios');
              $actividad->estado = "Disponible";
              $actividad->update();
            }else{
              $grupal->increment('cupo_socios');
            }
          }
          if($usuario->roles->nombre == "Voluntario"){
            if($grupal->cupo_voluntarios == 0){
              $grupal->increment('cupo_voluntarios');
              $actividad->estado = "Disponible";
              $actividad->update();
            }else{
              $grupal->increment('cupo_voluntarios');
            }
          }
          $grupal->update();

          $apuntado = ActividadUsuario::where('usuario_id', ($usuario->id))
                                      ->where('actividad_id', ($actividad->id))
                                      ->first();
          $apuntado->delete();

        }



        return redirect()->route('verActividad', ['actividad_id' => $actividad->id ])->with(array(
        'message2' => 'Desapuntado correctamente de la actividad'
        ));
    }

    public function apuntados($actividad_id){

      $actividad = Actividad::find($actividad_id); 
      $apuntados = ActividadUsuario::where('actividad_id', $actividad_id)
                                      ->where('usuario_id', '!=', auth()->id())
                                      ->orderBy('id', 'desc')
                                      ->paginate(15);

      return view('actividad.Apuntados', array(
          'apuntados' => $apuntados,
          'actividad' => $actividad,
      ));
    }

    public function eliminar($actividad_id) 
    {
        $actividad = Actividad::find($actividad_id); 
        $usuario =  \Auth::user();

      if($usuario->id == $actividad->usuario_id){

        if($actividad->tipo == "Grupal"){
          $grupal = ActividadGrupal::find($actividad->id);
          if($grupal){
            $apuntados = ActividadUsuario::where('actividad_id', $actividad->id);
            foreach($apuntados as $apuntado){
              $apuntado->delete();
            }
            $grupal->delete();
          }
        }
        
        if($actividad->tipo == "Simple"){
          $simple = ActividadSimple::find($actividad->id);
          if($simple){
            $apuntados = ActividadUsuario::where('actividad_id', $actividad->id);
            foreach($apuntados as $apuntado){
              $apuntado->delete();
            }
            $simple->delete();
          }
        }

        $actividad->delete();

        return redirect()->route('actividadesList');
  
  
     }else{
        abort(403, "No tienes autorización para eliminar esta actividad");
      }
    }

    public function misactividades(){

      $usuario =  \Auth::user();

      /*$actividades = Actividad::where('actividadUsuario.usuario_id', $usuario->id)
                                 ->orderBy('id', 'desc')
                                ->paginate(6);*/
     

      $actividades = DB::table('actividad')
            ->join('actividad_usuario', 'actividad_usuario.actividad_id', '=', 'actividad.id')
            //->join('categoria', 'categoria.id', '=', 'actividad.categoria_id')
            ->where('actividad_usuario.usuario_id', $usuario->id)
            ->orderBy('actividad_id', 'desc')
            ->take(6)
            ->get(); 


      
    


       return view('actividad.MisActividades', array(
       'actividades'  => $actividades,
        ));

    }


    public function misactividadesCreadas(){

      $usuario =  \Auth::user();

      $actividades = Actividad::where('usuario_id', $usuario->id)
                                ->orderBy('id', 'desc')
                                ->paginate(6);
     
       return view('actividad.MisActividadesCreadas', array(
       'actividades'  => $actividades,
        ));

    }
}
