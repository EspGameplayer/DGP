@extends('layouts.app')

@section('content')
<br>
<div class="container" align="center">
<div class="card col-md-8">
  <div class="card-header"><h3>EDITAR CATEGORIA</h3> </div>
  <div class="card-body">

         <form action="{{route('ActualizarCategoria', ['categoria_id' => $categoria->id])}}" method="post" enctype="multipart/form-data" class="col-lg-12">
          	
            {!! csrf_field() !!} <!--PARA EVITAR ATAQUES-->

            @if($errors->any())
            <div class= "alert alert-danger">
              <ul>
                @foreach($errors->all() as $error)
                <li>{{$error}}</li>
                @endforeach
              </ul>
            </div>
            @endif


          	 <div class="form-row">

                  <div class="form-group col-md-12" align="left">
                      <label for="name">Nombre</label>
                      <input type="name" class="form-control" id="name" placeholder="Introduzca nombre" name="nombre" value="{{$categoria->nombre}}">
                  </div>
 
              </div>

            <div class="form-group"  align="left">
              <label for="descripcion">Descripción</label>
              <textarea class="form-control" id="descripcion" name="descripcion">{{old('descripcion')}}</textarea value="{{$categoria->descripcion}}">
            </div>

            
              <!--<div class="custom-file">
                     <div class="form-group" align="left">
    <label for="image">Imagen</label>
    <input type="file" class="form-control-file" id="image" name="image">
  </div>
              </div>
<br><br>-->
              
  


              

  <br><br>
              <button type="submit" class="btn btn-success btn-lg ">ACTUALIZAR</button>

          </form>

  </div>
</div>
</div>

@endsection
