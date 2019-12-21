<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Categoria;

class CategoriaController extends Controller
{
     public function index()
    {
       $categorias = Categoria::orderBy('id', 'desc')->paginate(5);
       

       return view('Categorias', array(
       'categorias'  => $categorias,
       
        ));
    }

     public function crear(){
        $categoria = Categoria::all();                 
        return view('crearCategoria', array(
        'categoria' => $categoria
        ));
    }

        public function save(Request $request){
        //validar formulario
        $validatedData = $this->validate($request, [
        'nombre' => 'required',
        
        ]);

        $categoria = new Categoria();
        
        $categoria->nombre = $request->input('nombre');
        $categoria->descripcion = $request->input('descripcion');


        //subida de la imagen
/*
        $image = $request->file('image');
        if($image){
            $image_path = time().$image->getClientOriginalName();
  
            $image->move(public_path().'/images/', $image_path);
            $categoria->image = $image_path; 
        }
*/


        $categoria->save();

         return redirect()->route('Categorias');

    }

    public function eliminar($categoria_id){
        $categoria = Categoria::find($categoria_id);
       

        $categoria->delete();

        return redirect()->route('Categorias');
    }

    public function editar($categoria_id)
    {
       $categoria = Categoria::find($categoria_id);

        return view('editarCategoria', array(
        'categoria'=> $categoria
        ));
    }

    public function actualizar($categoria_id, Request $request){
        $validate = $this->validate($request, [
        'nombre' => 'required',
        
        ]);

        
        $categoria = Categoria::findOrFail($categoria_id);
       
        $categoria->nombre = $request->input('nombre');
        
        $categoria->descripcion = $request->input('descripcion');
       
        $categoria->update();

      
        return redirect()->route('Categorias');
    }
    
}
