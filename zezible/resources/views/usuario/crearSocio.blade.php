@extends('layouts.app')

@section('content')
<br>

<div class="container" align="center">

<div class="card col-md-10">
  <div class="card-header"><h3>CREAR SOCIO</h3> </div>
  <div class="card-body">

         <form action="{{ route('crearSocio', ['socio_id' => $socio->id]) }}" method="post" enctype="multipart/form-data" class="col-lg-12">
          	
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
                      <label for="gusto">¿Que te gustaría hacer?</label>
                      <input type="text" class="form-control" id="gusto" placeholder="¿Que te gustaría hacer?" name="gusto">
                  </div>

            </div>


          	 <div class="form-row">

                  <div class="form-group col-md-12"  align="left">
                    <label for="necesidad">¿Que necesitaras del voluntariado?</label>
                    <input type="text" class="form-control" id="necesidad" placeholder="Introduzca necesidad del voluntariado" name="necesidad">
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