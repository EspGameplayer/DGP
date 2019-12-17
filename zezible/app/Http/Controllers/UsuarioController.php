<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;

use App\User;
use App\Gestor;
use App\Socio;
use App\Voluntario;
use App\Role;

use App\ActividadUsuario;
use App\Valoracion;
use App\Comentario;

use Validator;
use Hash;

class UsuarioController extends Controller {
    public function index() {
        $usuarios = User::orderBy('id', 'desc')->paginate(6);


        return view('usuario.Index', array(
            'usuarios'  => $usuarios,
        ));
    }

    public function create() {
        $roles = Role::all();


    	return view('usuario.crearUsuario', array(
            'roles'  => $roles,
        ));
    }

     public function save(Request $request) {
         $validate = $this->validate($request, [
             'name' => 'required|max:255',
             'ApellidoP' => 'required|max:255',
             'ApellidoM' => 'required|max:255',
             'email' => 'required|email|max:255|unique:users',
             'password' => 'required|min:6|confirmed',
         ]);

        $user = new User();

        $user->name = $request->input('name');
        $user->ApellidoP = $request->input('ApellidoP');
        $user->ApellidoM = $request->input('ApellidoM');
        $user->nacimiento = $request->input('nacimiento');
        $user->telefono = $request->input('telefono');
        $user->email = $request->input('email');
        $user->password = bcrypt( $request->input('password') );
        $user->role_id = $request->input('role');

        $user->save();

        if($user->roles->nombre == "Gestor") {
            $gestor = new Gestor();
            $gestor->persona_id = $user->id;
            $gestor->save();


            return redirect()->route('home');
        }

        if($user->roles->nombre == "Socio") {
            $socio = new Socio();
            $socio->id = $user->id;
            $socio->save();

            /*return view('usuario.crearSocio', array(
            'socio'=> $socio
            ));*/

            //return redirect()->route('crearsocio', ['socio_id' => $socio->id]);


            return redirect()->action(
                'UsuarioController@createSocio', ['socio_id' => $user->id]
            );
        }

        if($user->roles->nombre == "Voluntario") {
            $voluntario = new Voluntario();
            $voluntario->id = $user->id;
            $voluntario->save();


            return redirect()->action(
                'UsuarioController@createVoluntario', ['voluntario_id' => $user->id]
            );
        }

    }

    public function createSocio($socio_id) {
        $socio = Socio::find($socio_id);

        return view('usuario.crearSocio', array(
            'socio'=> $socio
        ));
    }

    public function crearSocio($socio_id, Request $request){
        //$user =  \Auth::user();
        //$socio = new Socio();
        $socio = Socio::findOrFail($socio_id);

        $socio->gusto = $request->input('gusto');
        $socio->necesidad = $request->input('necesidad');
        $socio->observacion = $request->input('observacion');

        $socio->update();


        return redirect()->route('home');
    }

    public function createVoluntario($voluntario_id) {
        $voluntario = Voluntario::find($voluntario_id);


        return view('usuario.crearVoluntario', array(
        'voluntario'=> $voluntario
        ));
    }

     public function crearVoluntario($voluntario_id, Request $request) {
        $voluntario = Voluntario::findOrFail($voluntario_id);

        $voluntario->participar = $request->input('participar');
        $voluntario->espera = $request->input('espera');
        $voluntario->observacion = $request->input('observacion');

        $voluntario->update();


        return redirect()->route('home');
    }

    public function actualizar($usuario_id) {
        $roles = Role::all();
        $usuario = User::findOrFail($usuario_id);

        return view('usuario.actualizarUsuario', array(
        'usuario' => $usuario,
       'roles'  => $roles,
        ));
    }

    public function updateUsuario($usuario_id, Request $request) {
        $validate = $this->validate($request, [
            'name' => 'required|max:255',
            'ApellidoP' => 'required|max:255',
            'ApellidoM' => 'required|max:255',
            'email' => 'required|email|max:255',
        ]);

        $user = User::findOrFail($usuario_id);

        $user->name = $request->input('name');
        $user->ApellidoP = $request->input('ApellidoP');
        $user->ApellidoM = $request->input('ApellidoM');
        $user->nacimiento = $request->input('nacimiento');
        $user->telefono = $request->input('telefono');

        $emails = DB::table('users')->where('email', '!=', $user->email)->pluck('email');

        foreach($emails as $email){
            if($request->input('email') == $email) {
                abort(403, "Ya existe un usuario con este email");
            }
        }

        if($request->input('email') != $user->email) {
            $user->email = $request->input('email');
        }

        if($request->input('password') !=null) {
            $user->password = bcrypt( $request->input('password') );
        }
        $user->role_id = $request->input('role');

        $user->update();

        if($user->roles->nombre == "Gestor"){
            return redirect()->route('home');
        }

        if($user->roles->nombre == "Socio"){
            return redirect()->action(
                'UsuarioController@actualizarSocio', ['socio_id' => $user->id]
            );
        }

        if($user->roles->nombre == "Voluntario"){
            return redirect()->action(
                'UsuarioController@actualizarVoluntario', ['voluntario_id' => $user->id]
            );
        }

    }

    public function actualizarSocio($socio_id) {
        $socio = Socio::find($socio_id);


        return view('usuario.actualizarSocio', array(
            'socio'=> $socio
        ));
    }

    public function updateSocio($socio_id, Request $request){
        $socio = Socio::findOrFail($socio_id);

        $socio->gusto = $request->input('gusto');
        $socio->necesidad = $request->input('necesidad');
        $socio->observacion = $request->input('observacion');

        $socio->update();


        return redirect()->route('usuariosList');
    }

    public function actualizarVoluntario($voluntario_id) {
        $voluntario = Voluntario::find($voluntario_id);


        return view('usuario.actualizarVoluntario', array(
            'voluntario'=> $voluntario
        ));
    }

     public function updateVoluntario($voluntario_id, Request $request){
        $voluntario = Voluntario::findOrFail($voluntario_id);

        $voluntario->participar = $request->input('participar');
        $voluntario->espera = $request->input('espera');
        $voluntario->observacion = $request->input('observacion');

        $voluntario->update();


        return redirect()->route('usuariosList');
    }

    public function eliminar($usuario_id) {
        $usuario = User::find($usuario_id); 
        if($usuario->roles->nombre == "Gestor"){

            $gestor = Gestor::find($usuario->id);
            if($gestor){

                $apuntados = ActividadUsuario::where('usuario_id', $gestor->id)->delete();                   
                $comentarios = Comentario::where('usuario_id', $gestor->id)->delete();

            $gestor->delete();
            }
            $usuario->delete();

        }
        if($usuario->roles->nombre == "Socio"){
            
            $socio = Socio::find($usuario->id);
            if($socio){
                $apuntados = ActividadUsuario::where('usuario_id', $socio->id)->delete();   
                $valoraciones = Valoracion::where('socio_id', $socio->id)->delete();
                $comentarios = Comentario::where('usuario_id', $socio->id)->delete();
                $socio->delete();
            }
            $usuario->delete();
        
        }
        if($usuario->roles->nombre == "Voluntario"){
            
            $voluntario = Voluntario::find($usuario->id);
            if($voluntario){
                $apuntados = ActividadUsuario::where('usuario_id', $voluntario->id)->delete();   
                $valoraciones = Valoracion::where('voluntario_id', $voluntario->id)->delete();
                $comentarios = Comentario::where('usuario_id', $voluntario->id)->delete();
                $voluntario->delete();
            }
            $usuario->delete();

        }
       
        
        return redirect()->route('home');
    }

    public function perfil() {
        $usuario =  \Auth::user();


        return view('usuario.perfil', array(
            'usuario'=> $usuario
        ));
    }

    public function perfilUsuario($usuario_id) {
        $usuario =  User::find($usuario_id);


        return view('usuario.perfil', array(
            'usuario'=> $usuario
        ));
    }
}
