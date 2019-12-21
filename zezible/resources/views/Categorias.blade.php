@extends('layouts.app')
@section('content')
<div class="row pagename">
  <div class="sub-pagename col-md-9">
<h1>Lista de categorias</h1>
</div>
<div class="bttn col-md-2" align="center">
  <a href="{{route('CrearCategoria')}}" class="btn btn-outline-primary btn-lg" >Crear nuevo</a>
<br></div>
</div>
<br>

<div class="container col-md-10" align="center">
<ul class="list-unstyled" >
@foreach($categorias as $categoria)

      <div class="card col-md-9">
        <div class="card-header">{{$categoria->nombre}}</div>
        <div class="card-body" align="left">
        	
<form class="leftForm col-md-10">
  <fieldset disabled>
<div class="form-row">
  <div class="form-group col-md-12">
    <label>Descripcion</label><br>
    <input type="text" class="form-control form-control-sm" value="{{$categoria->descripcion}}">
   <!-- <img style="max-height: 10px" src="/images/{{$categoria->image}}"> -->
</div>

  

</div>

  </fieldset>
</form>



<div class="rightForm col-md-1" align="left">
              <br>
              <div class="btn-group-vertical">
               
                 @if(Auth::user()->roles->nombre == "Gestor")            
                   <!-- <a href="{{url('/eliminar-categoria/'.$categoria->id)}}" class="btn btn-danger ">Eliminar</a>-->
                    <a href="{{url('/editar-categoria/'.$categoria->id)}}" class="btn btn-success" >Actualizar</a>
                 @endif  
              </div>
 </div>






        </div>
      </div>

    <br><br>

@endforeach
</ul>

</div>
{{$categorias->links()}}

@endsection

