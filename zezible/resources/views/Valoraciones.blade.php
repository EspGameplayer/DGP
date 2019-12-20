@extends('layouts.app')
@section('content')
<div class="pagename">
  <div class="sub-pagename">
<h1>Valoraciones de la actividad</h1>
</div>
</div>
<br>

<div class="container col-md-10" align="center">
<ul class="list-unstyled" >
@foreach($valoraciones as $valoracion)



@if($valoracion->estado == "socio-voluntario")

<div class="card">
  <div class="card-header">
    Socio valoró a voluntario
  </div>
  <div class="card-body">
    
<div class="card-deck">
  <div class="card">
    <div class="card-header">Socio</div>
    <div class="card-body">
      <h5 class="card-title">{{$valoracion->socio->persona->name}} {{$valoracion->socio->persona->ApellidoP}}</h5><br>
      <p class="card-text"><a  class="btn btn-primary btn-lg" href="{{url('/perfil-usuario/'.$valoracion->socio_id)}}">Ver perfil</a></p>
      
    </div>
  </div>
  <div class="card">
    <div class="card-header">Valoración</div>
    <div class="card-body">
      <h5 class="card-title">
        
      <span class="dot" style="text-align: center;"><br>{{$valoracion->valoracion}}/5</span>

      </h5>
      <p class="card-text">{{$valoracion->descripcion}}</p>
    </div>
  </div>
  <div class="card">
    <div class="card-header">Voluntario</div>
    <div class="card-body">
      <h5 class="card-title">{{$valoracion->voluntario->persona->name}} {{$valoracion->voluntario->persona->ApellidoP}}</h5><br>
      <p class="card-text"><a  class="btn btn-primary btn-lg" href="{{url('/perfil-usuario/'.$valoracion->voluntario_id)}}">Ver perfil</a></p>
    </div>
  </div>
</div>


  </div>
</div>



@else


<div class="card">
  <div class="card-header">
    Voluntario valoró a socio
  </div>
  <div class="card-body">
    
<div class="card-deck">
  <div class="card">
    <div class="card-header">Voluntario</div>
    <div class="card-body">
      <h5 class="card-title">{{$valoracion->voluntario->persona->name}} {{$valoracion->voluntario->persona->ApellidoP}}</h5><br>
      <p class="card-text"><a  class="btn btn-primary btn-lg" href="{{url('/perfil-usuario/'.$valoracion->voluntario_id)}}">Ver perfil</a></p>
    </div>
  </div>
  
  <div class="card">
    <div class="card-header">Valoración</div>
    <div class="card-body">
      <h5 class="card-title">
        
      <span class="dot" style="text-align: center;"><br>{{$valoracion->valoracion}}/5</span>

      </h5>
      <p class="card-text">{{$valoracion->descripcion}}</p>
    </div>
  </div>
 <div class="card">
    <div class="card-header">Socio</div>
    <div class="card-body">
      <h5 class="card-title">{{$valoracion->socio->persona->name}} {{$valoracion->socio->persona->ApellidoP}}</h5><br>
      <p class="card-text"><a  class="btn btn-primary btn-lg" href="{{url('/perfil-usuario/'.$valoracion->socio_id)}}">Ver perfil</a></p>
      
    </div>
  </div> 

</div>  


  </div>
</div>


@endif

<br>
@endforeach
</ul>

</div>
{{$valoraciones->links()}}

@endsection
