@extends('layouts.app')

@section('content')
<br>

<div class="container" align="center">

<div class="card col-md-10">
  <div class="card-header"><h3>CREAR VOLUNTARIO</h3> </div>
  <div class="card-body">

         <form action="{{ route('crearVoluntario', ['voluntario_id' => $voluntario->id]) }}" method="post" enctype="multipart/form-data" class="col-lg-12">
          	
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
                      <label for="participar">¿En que te gustaria participar?</label>
                      <input type="text" class="form-control" id="participar" placeholder="¿Que te gustaría hacer?" name="participar">
                  </div>

            </div>


          	 <div class="form-row">

                  <div class="form-group col-md-12"  align="left">
                    <label for="espera">¿Que esperas de tu voluntariado?</label>
                    <input type="text" class="form-control" id="espera" placeholder="Introduzca lo que espera del voluntariado" name="espera">
                  </div>

              </div>

               <div class="form-row">

                  <div class="form-group col-md-12"  align="left">
                      <label for="observacion">Observaciones</label>
                      <input type="text" class="form-control" id="observacion" placeholder="Observaciones" name="observacion">
                  </div>

              </div>
     
              <button type="submit" class="btn btn-success btn-lg ">Crear</button>

			  </div>

 
              
          </form>
  </div>
</div>
</div>


@endsection