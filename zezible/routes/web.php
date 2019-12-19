<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {

	/*$user = Auth::user();

	if($user->esGestor()){
	
		echo "gestor";
	
	}else{
	
		echo "no gestor";
	
	}*/
    return view('vale');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


//--------------USUARIO------------------

Route::get('/usuarios', array(
'as' => 'usuariosList',
'middleware' => 'esGestor',
'uses'=>'UsuarioController@index'
));

Route::get('/crear-usuario', array(
'as' => 'crearuser',
'middleware' => 'esGestor',
'uses'=>'UsuarioController@create'
));

Route::post('/guardar-usuario', array(
'as' => 'crearUsuario',
'middleware' => 'esGestor',
'uses'=>'UsuarioController@save'
));

Route::get('/crear-socio/{socio_id}', array(
'as' => 'crearsocio',
'middleware' => 'esGestor',
'uses'=>'UsuarioController@createSocio'
));

Route::post('/guardar-socio/{socio_id}', array(
'as' => 'crearSocio',
'middleware' => 'esGestor',
'uses'=>'UsuarioController@crearSocio'
));

Route::get('/crear-voluntario/{voluntario_id}', array(
'as' => 'crearvoluntario',
'middleware' => 'esGestor',
'uses'=>'UsuarioController@createVoluntario'
));

Route::post('/guardar-voluntario/{voluntario_id}', array(
'as' => 'crearVoluntario',
'middleware' => 'esGestor',
'uses'=>'UsuarioController@crearVoluntario'
));

Route::get('/actualizar-usuario/{usuario_id}', array(
'as' => 'actualizarUsuario',
'middleware' => 'esGestor',
'uses'=>'UsuarioController@actualizar'
));

Route::post('/update-usuario/{usuario_id}', array(
'as' => 'updateUsuario',
'middleware' => 'esGestor',
'uses'=>'UsuarioController@updateUsuario'
));

Route::get('/actualizar-socio/{socio_id}', array(
'as' => 'actualizarSocio',
'middleware' => 'esGestor',
'uses'=>'UsuarioController@actualizarSocio'
));

Route::post('/update-socio/{socio_id}', array(
'as' => 'updateSocio',
'middleware' => 'esGestor',
'uses'=>'UsuarioController@updateSocio'
));

Route::get('/actualizar-voluntario/{voluntario_id}', array(
'as' => 'actualizarVoluntario',
'middleware' => 'esGestor',
'uses'=>'UsuarioController@actualizarVoluntario'
));

Route::post('/update-voluntario/{voluntario_id}', array(
'as' => 'updateVoluntario',
'middleware' => 'esGestor',
'uses'=>'UsuarioController@updateVoluntario'
));

Route::get('/eliminar-usuario/{usuario_id}', array(
'as' => 'eliminarUsuario',
'middleware' => 'auth',
'uses'=>'UsuarioController@eliminar'
));

Route::get('/perfil', array(
'as' => 'Perfil',
'middleware' => 'auth',
'uses'=>'UsuarioController@perfil'
));


Route::get('/perfil-usuario/{usuario_id}', array(
'as' => 'perfilUsuario',
'middleware' => 'auth',
'uses'=>'UsuarioController@perfilUsuario'
));




//------------FIN USUARIO-----------------

//-------------ACTIVIDAD-----------------

Route::get('/actividades', array( //estas son las actividades disponibles
'as' => 'actividadesList',
'middleware' => 'auth',
'uses'=>'ActividadController@index'
));

Route::get('/todas-actividades', array(
'as' => 'TodasActividades',
'middleware' => 'esGestor',
'uses'=>'ActividadController@todas'
));

Route::get('/ver-actividad/{actividad_id}', array(
'as' => 'verActividad',
'middleware' => 'auth',
'uses'=>'ActividadController@verActividad'
));

Route::get('/crear-actividad-grupal', array(
'as' => 'crearActividadGrupal',
'middleware' => 'esGestor',
'uses'=>'ActividadController@crearGrupal'
));

Route::post('/guardar-actividad-grupal', array(
'as' => 'guardarActividadGrupal',
'middleware' => 'esGestor',
'uses'=>'ActividadController@saveGrupal'
));

Route::get('/crear-actividad-simple', array(
'as' => 'crearActividadSimple',
'middleware' => 'auth', //solo socio y voluntario
'uses'=>'ActividadController@crearSimple'
));

Route::post('/guardar-actividad-simple', array(
'as' => 'guardarActividadSimple',
'middleware' => 'auth', //solo socio y voluntario
'uses'=>'ActividadController@saveSimple'
));

Route::get('/actualizar-actividad/{actividad_id}', array(
'as' => 'actualizarActividad',
'middleware' => 'auth',
'uses'=>'ActividadController@actualizar'
));

Route::post('/actualizar-actividad-grupal/{actividad_id}', array(
'as' => 'actualizarActividad',
'middleware' => 'esGestor',
'uses'=>'ActividadController@updateGrupal'
));

Route::post('/actualizar-actividad-simple/{actividad_id}', array(
'as' => 'actualizarActividads',
'middleware' => 'auth', //socio y voluntario
'uses'=>'ActividadController@updateSimple'
));

Route::get('/apuntar/{actividad_id}', array(
'as' => 'apuntar',
'middleware' => 'auth',
'uses'=>'ActividadController@apuntar'
));

Route::get('/desapuntar/{actividad_id}', array(
'as' => 'desapuntar',
'middleware' => 'auth',
'uses'=>'ActividadController@desapuntar'
));

Route::get('/apuntados/{actividad_id}', array(
'as' => 'apuntados',
'middleware' => 'auth',
'uses'=>'ActividadController@apuntados'
));

Route::get('/eliminar-actividad/{actividad_id}', array(
'as' => 'eliminarActividad',
'middleware' => 'auth',
'uses'=>'ActividadController@eliminar'
));

Route::get('/mis-actividades', array(
'as' => 'MisActividades',
'middleware' => 'auth',
'uses'=>'ActividadController@misactividades'
));

Route::get('/mis-actividades-creadas', array(
'as' => 'MisActividadesCreadas',
'middleware' => 'auth',
'uses'=>'ActividadController@misactividadesCreadas'
));

Route::get('/actividadesUsuario/{usuario_id}', array(
'as' => 'actividadesUsuario',
'middleware' => 'esGestor',
'uses'=>'ActividadController@actividadesUsuario'
));

Route::get('/actividades-apuntadas-usuario/{usuario_id}', array(
'as' => 'actividadesApuntadasUsuario',
'middleware' => 'esGestor',
'uses'=>'ActividadController@actividadesUsuarioApuntadas'
));
//------------FIN ACTIVIDAD-----------------


//------------COMENTARIOS-----------------


Route::post('/comentario', array(
'as' => 'comentario',
'middleware' => 'auth',
'uses' => 'ComentarioController@save'
));

Route::get('/eliminar-comentario/{comentario_id}', array(
'as' => 'eliminarComentario',
'middleware' => 'auth',
'uses' => 'ComentarioController@eliminar'
));

//------------FIN COMENTARIOS-----------------

//------------VALORACION-----------------

Route::post('/valoracion', array(
'as' => 'Valoracion',
'middleware' => 'auth',
'uses' => 'ValoracionController@save'
));

Route::get('/valoraciones/{actividad_id}', array(
'as' => 'Valoraciones',
'middleware' => 'esGestor',
'uses'=>'ValoracionController@index'
));
//------------FIN VALORACION-----------------