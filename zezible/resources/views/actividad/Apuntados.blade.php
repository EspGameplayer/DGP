 @extends('layouts.app')
@section('content')
<div class="pagename">
  <div class="sub-pagename">
<h1>Personas apuntadas a la actividad</h1>
</div>
</div>
<br>

<div class="container col-md-10" align="center">
<ul class="list-unstyled" >
@foreach($apuntados as $apuntado)

      <div class="card col-md-9">
        <div class="card-header">
          <u> <a class="nameUser" href="{{url('/perfil-usuario/'.$apuntado->usuario_id)}}">{{$apuntado->usuario->name}}&nbsp;{{$apuntado->usuario->ApellidoP}}&nbsp;{{$apuntado->usuario->ApellidoM}}</a></u></div>
        <div class="card-body row" align="left">
        	
        		<div class="col-md-3" align="left">
        			<label><b>Rol</b></label><br>
        			<label><b>Correo electronico</b></label> 
            </div>
        		<div class="col-md-6" align="left">
        			<label>: {{$apuntado->usuario->roles->nombre}}</label><br>
             	<label>: {{$apuntado->usuario->email}}</label>
        		</div>
        	
         	<div class="col-md-3" align="right">

                @if($actividad->estado == "Cerrada")
                  <div class="btn-group-vertical">
                    <a href="#" class="btn btn-outline-warning btn-lg">Valorar</a>
                  </div>
                @endif
         	</div>
         	
        </div>
      </div>

    <br><br>

@endforeach
</ul>

</div>
{{$apuntados->links()}}

@endsection

