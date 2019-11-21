@extends('layouts.app')

@section('content')
<br>
<div class="container" align="center">

<div class="card col-md-10">
  <div class="card-header"><h3>ACTIVIDAD: {{$actividad->nombre}}</h3> </div>
  <div class="card-body">

         <form action="{{route('actualizarActividad', ['actividad_id' => $actividad->id])}}" method="post" enctype="multipart/form-data" class="col-lg-12">
            
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
                      <label for="nombre">Nombre</label>
                      <input type="text" class="form-control" id="nombre" placeholder="Introduzca nombre" name="nombre" value="{{$actividad->nombre}}">
                  </div>
                  <div class="form-group col-md-6"  align="left">
                      <label for="fecha">Fecha</label>
                      <input type="date" class="form-control" id="fecha" placeholder="Introduzca fecha" name="fecha" value="{{$actividad->fecha}}">
                  </div>
            </div>


             <div class="form-row">

                  <div class="form-group col-md-6"  align="left">
                      <label for="hora">Hora</label>
                      <input type="time" class="form-control" id="hora" placeholder="Introduzca hora" name="hora" value="{{$actividad->hora}}">
                  </div>
                  <div class="form-group col-md-6"  align="left">
                      <label for="lugar">Lugar</label>
                      <input type="text" class="form-control" id="lugar" placeholder="Introduzca lugar" name="lugar" value="{{$actividad->lugar}}">
                  </div>
              </div>

              


               <div class="form-row">

                  <div class="form-group col-md-6"  align="left">
                      <label for="maximo_socios">N° maximo de socios</label>
                      <input type="number" class="form-control" id="maximo_socios" placeholder="Introduzca cantidad maxima de socios" name="maximo_socios" value="{{$actividad->actividadGrupal->maximo_socios}}">
                  </div>
                  
                  <div class="form-group col-md-6"  align="left">
                      <label for="minimo_voluntarios">N° minimo de voluntarios</label>
                      <input type="number" class="form-control" id="minimo_voluntarios" placeholder="Introduzca cantidad minima de voluntarios" name="minimo_voluntarios" value="{{$actividad->actividadGrupal->minimo_voluntarios}}">
                  </div>

              </div>
               
              <div class="form-row">

                  <div class="form-group col-md-12"  align="left">
                      <label for="descripcion">Descripción</label>
                      <input type="text" class="form-control" id="descripcion" placeholder="Introduzca descripción de actividad" name="descripcion" value="{{$actividad->descripcion}}">
                  </div>
                  
              </div>

             <div class="form-group col-md-12" align="left">
             <label for="categorias">Categorias</label>
                 <select id="categorias" class="form-control" name="categorias">
                    @foreach($categorias as $categoria)
                      <option 
                        <?php if($categoria->id == $actividad->categoria_id){echo("selected");} ?> 
                        value="{{$categoria['id']}}">{{$categoria->nombre}}
                      </option>
                    @endforeach
                 </select>
            </div>      
              <button type="submit" class="btn btn-success btn-lg ">Modificar</button>

        </div>

 
              
          </form>
  </div>
</div>
</div>


@endsection