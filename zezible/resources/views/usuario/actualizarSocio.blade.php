@extends('layouts.app')

@section('content')
<br>
<div class="container" align="center">

<div class="card col-md-10">
  <div class="card-header"><h3>EDITAR SOCIO</h3> </div>
  <div class="card-body">

         <form action="{{ route('updateSocio', ['socio_id' => $socio->id]) }}" method="post" enctype="multipart/form-data" class="col-lg-12">
          	
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
                      <input type="text" class="form-control" id="gusto" placeholder="¿Que te gustaría hacer?" name="gusto" value="{{$socio->gusto}}">
                  </div>

            </div>


          	 <div class="form-row">

                  <div class="form-group col-md-12"  align="left">
                    <label for="necesidad">¿Que necesitaras del voluntariado?</label>
                    <input type="text" class="form-control" id="necesidad" placeholder="Introduzca necesidad del voluntariado" name="necesidad" value="{{$socio->necesidad}}>
                  </div>

              </div>

               <div class="form-row">

                  <div class="form-group col-md-12"  align="left">
                      <label for="observacion">Observaciones</label>
                      <input type="text" class="form-control" id="observacion" placeholder="Observaciones" name="observacion" value="{{$socio->observacion}}>
                  </div>

              </div>
     
              <button type="submit" class="btn btn-success btn-lg ">Modificar</button>

			  </div>

 
              
          </form>
  </div>
</div>
</div>


@endsection