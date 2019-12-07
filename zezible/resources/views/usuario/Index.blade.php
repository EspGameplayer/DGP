@extends('layouts.app')
@section('content')


<div class="row pagename">
  <div class="sub-pagename col-md-9">
<h1>Lista de usuarios</h1>
</div>
<div class="bttn col-md-2" align="center">
  <a href="{{route('crearuser')}}" class="btn btn-outline-primary btn-lg" >Crear nuevo</a>
<br></div>
</div>
<br>



<div class="container col-md-10" align="center">
<ul class="list-unstyled" >
@foreach($usuarios as $usuario)



      <div class="card col-md-9" style="padding-right: 0px; padding-left: 0px">
        <div class="card-header">{{$usuario->name}}&nbsp;{{$usuario->ApellidoP}}&nbsp;{{$usuario->ApellidoM}}</div>
        <div class="card-body row" align="left">
        	

<form class="leftForm col-md-10">
  <fieldset disabled>


<div class="form-row">
  <div class="form-group col-md-4">
    <label>Correo electronico</label><br>
    <input type="email" class="form-control" value="{{$usuario->email}}">
  </div>

  <div class=" form-group  col-md-4">
    <label>Telefono</label><br>
    <input type="email" class="form-control" value="{{$usuario->telefono}}">   
  </div>

  <div class="form-group col-md-4">
    <label><b>Rol</b></label><br>
    <input type="email" class="form-control inputRol" value=" {{$usuario->roles->nombre}}">   
  </div>
</div> 


  </fieldset>
</form>

<div class="rightForm col-md-1" align="right">


              <div class="btn-group-vertical">
          
                 @if(Auth::check())      
              
              <a href="{{url('/eliminar-usuario/'.$usuario->id)}}" class="btn btn-outline-danger btn-lg">Eliminar</a>

              <a href="{{url('/actualizar-usuario/'.$usuario->id)}}" class="btn btn-outline-success btn-lg" >Actualizar</a>

                  @endif
              </div>



 </div>




         	</div>

</div>

    <br><br>

@endforeach
</ul>

</div>
{{$usuarios->links()}}

@endsection

