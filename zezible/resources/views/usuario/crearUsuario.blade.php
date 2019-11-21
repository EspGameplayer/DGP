@extends('layouts.app')

@section('content')
<br>

<div class="container" align="center">

<div class="card col-md-10">
  <div class="card-header"><h3>CREAR USUARIO</h3> </div>
  <div class="card-body">

         <form action="{{route('crearUsuario')}}" method="post" enctype="multipart/form-data" class="col-lg-12">
          	
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

            	
          

                  <div class="form-group col-md-6" align="left">
                      <label for="name">Nombres</label>
                      <input type="name" class="form-control" id="name" placeholder="Introduzca nombres" name="name">
                  </div>
                   <div class="form-group col-md-6" align="left">
                      <label for="ApellidoP">Apellido paterno</label>
                      <input type="text" class="form-control" id="ApellidoP" placeholder="Introduzca apellido paterno" name="ApellidoP">
                  </div>
            </div>


          	 <div class="form-row">

                  <div class="form-group col-md-6"  align="left">
                      <label for="ApellidoM">Apellido materno</label>
                      <input type="text" class="form-control" id="ApellidoM" placeholder="Introduzca apellido materno" name="ApellidoM">
                  </div>
                  
                  <div class="form-group col-md-6"  align="left">
                      <label for="nacimiento">Fecha de nacimiento</label>
                      <input type="date" class="form-control" id="nacimiento" placeholder="Introduzca fecha de nacimiento" name="nacimiento">
                  </div>

              </div>

              


               <div class="form-row">

                  <div class="form-group col-md-6"  align="left">
                      <label for="telefono">Numero telefonico</label>
                      <input type="number" class="form-control" id="telefono" placeholder="Introduzca numero telefonico" name="telefono">
                  </div>
                  
                  <div class="form-group col-md-6"  align="left">
                    <label for="email">Correo electrónico</label>
                    <input type="email" class="form-control" id="email" placeholder="Introduzca correo electronico" name="email">
                  </div>

              </div>
              
              <div class="form-row">

              
               <div class="form-group col-md-6" align="left">
                  <label for="password">Contraseña</label>
                  <div class="input-group mb-2 mr-sm-2">
                  		<input type="password" id="password" class="form-control" name="password" placeholder="Introduzca contraseña">
                  </div>
</div>
                   <div class="form-group col-md-6" align="left">
                    <label for="password">Confirme contraseña</label>
                    <div class="input-group mb-2 mr-sm-2">
                    
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirme contraseña">
</div>
                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
              </div>

             <div class="form-group col-md-12" align="left">
             <label for="role">Roles</label>
                 <select id="role" class="form-control" name="role">
                  @foreach($roles as $role)
                   <option value="{{$role['id']}}">{{$role->nombre}}</option>
                @endforeach
             </select>
            </div>      
              <button type="submit" class="btn btn-success btn-lg ">Crear</button>

			  </div>

 
              
          </form>
  </div>
</div>
</div>


@endsection