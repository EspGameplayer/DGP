@extends('layouts.app')

@section('content')
<div class="pagename">
  <div class="sub-pagename">
<h1>Mi perfil</h1>
</div>
</div>
<br>
<div class="container" align="center">


<div class="row">
  <div class="col-md-10">


<div class="card col-md-10">
  <div class="card-header"><h3>{{$usuario->name}}&nbsp;{{$usuario->ApellidoP}}&nbsp;{{$usuario->ApellidoM}}</h3>
  </div>
  <div class="card-body">


<form class="col-lg-12">
  <fieldset disabled>

            <div class="form-row">

                  <div class="form-group col-md-6" align="left">
                      <label for="name">Nombres</label>
                      <input type="name" class="form-control" id="name" placeholder="Introduzca nombres" name="name" value="{{$usuario->name}}">
                  </div>
                   <div class="form-group col-md-6" align="left">
                      <label for="ApellidoP">Apellido paterno</label>
                      <input type="text" class="form-control" id="ApellidoP" placeholder="Introduzca apellido paterno" name="ApellidoP" value="{{$usuario->ApellidoP}}">
                  </div>
            </div>


             <div class="form-row">

                  <div class="form-group col-md-6"  align="left">
                      <label for="ApellidoM">Apellido materno</label>
                      <input type="text" class="form-control" id="ApellidoM" placeholder="Introduzca apellido materno" name="ApellidoM" value="{{$usuario->ApellidoM}}">
                  </div>
                  
                  <div class="form-group col-md-6"  align="left">
                      <label for="nacimiento">Fecha de nacimiento</label>
                      <input type="date" class="form-control" id="nacimiento" placeholder="Introduzca fecha de nacimiento" name="nacimiento" value="{{$usuario->nacimiento}}">
                  </div>

              </div>

              


               <div class="form-row">

                  <div class="form-group col-md-6"  align="left">
                      <label for="telefono">Numero telefonico</label>
                      <input type="number" class="form-control" id="telefono" placeholder="no tiene numero telefonico" name="telefono" value="{{$usuario->telefono}}">
                  </div>
                  
                  <div class="form-group col-md-6"  align="left">
                    <label for="email">Correo electrónico</label>
                    <input type="email" class="form-control" id="email" placeholder="Introduzca correo electronico" name="email" value="{{$usuario->email}}">
                  </div>

              </div>

              <div class="form-row">

                  <div class="form-group col-md-12"  align="left">
                      <label for="role">Rol</label>
                      <input type="text" class="form-control" id="role" placeholder="Introduzca role" name="role" value="{{$usuario->roles->nombre}}">
                  </div>

              </div>

  </fieldset>
</form>
         
  </div>
</div>


</div>
<div class="col-md-2" align="left">
<br><br>
<div class="btn-group-vertical">
<a href="#" class="btn btn-outline-success btn-lg" >Mis actividades</a>

</div>

</div>


</div>


@endsection