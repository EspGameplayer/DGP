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
              <br><br><br>
              <label><b>Rol</b></label><br>
              <label><b>Correo electronico</b></label> 
            </div>
            <div class="col-md-3" align="left">
              <br><br><br>
              <label>: {{$apuntado->usuario->roles->nombre}}</label><br>
              <label>: {{$apuntado->usuario->email}}</label>
            </div>
          
          <div id="Valoration" class="col-md-5" align="left">

                @if($actividad->estado == "Cerrada")
                  
                <form class="col-md-12" method="POST"  action="{{ url('/valoracion') }}">
                  <div class="row">
                   {!! csrf_field() !!}
                      <input type="hidden" name="actividad_id" value="{{$actividad->id}}" required>
                      <input type="hidden" name="apuntado_id" value="{{$apuntado->usuario_id}}" required>
                      <label>Valoración:</label>              
                      <!--ESTRELLAS-->
<div id="estrellass">
                      
<p class="clasificacion">
    <input id="radio1" type="radio" name="estrellas" value="5"><!--
    --><label for="radio1">★</label><!--
    --><input id="radio2" type="radio" name="estrellas" value="4"><!--
    --><label for="radio2">★</label><!--
    --><input id="radio3" type="radio" name="estrellas" value="3"><!--
    --><label for="radio3">★</label><!--
    --><input id="radio4" type="radio" name="estrellas" value="2"><!--
    --><label for="radio4">★</label><!--
    --><input id="radio5" type="radio" name="estrellas" value="1"><!--
    --><label for="radio5">★</label>
  </p>

</div>
                      <!--FIN ESTRELLAS-->


                      <p>
                        <textarea cols="80" rows="2" class="form-control" name="descripcion" placeholder="Haz un comentario acerca de tu compañero"required>{{old('descripcion')}}</textarea>
                      </p>
                    
                      <br><br>
                      <div align="center" style="margin-bottom: 10px;">
                        
                      <input align="center" type="submit" value="Valorar" class="btn btn-success btn-lg" >
                      </div>
                  </div>
                </form>


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

