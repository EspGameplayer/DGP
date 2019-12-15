@extends('layouts.app')
@section('content')
<div class="pagename">

    <div class="sub-pagename">

        <h1>
            Actividad
        </h1>

    </div>

</div>

<br>

{!! csrf_field() !!}

<div class="container col-md-10" align="center">

    <ul class="list-unstyled" >

        <div class="row">

            <div class="card col-md-10">

                <div class="card-header">{{$actividad->nombre}}</div>
                <div class="card-body row" align="left">

                    <form class="col-md-12">

                        <fieldset disabled>

                            <div class="form-row">

                                <div class="form-group col-md-6">
                                    <label>Propuesta por</label><br>
                                    <input type="text" class="form-control" value="{{$actividad->usuario->name}} {{$actividad->usuario->ApellidoP}}">
                                </div>

                                <div class="form-group col-md-6">
                                    <label>Fecha</label><br>
                                    <input type="text" class="form-control" value="{{$actividad->fecha}}">
                                </div>

                            </div>


                            <div class="form-row">

                                <div class="form-group col-md-6">
                                    <label>Hora</label><br>
                                    <input type="text" class="form-control" value="{{$actividad->hora}}">
                                </div>

                                <div class="form-group col-md-6">
                                    <label>Lugar</label><br>
                                    <input type="text" class="form-control" value="{{$actividad->lugar}}">
                                </div>

                            </div>


                            <div class="form-row">

                                <div class="form-group col-md-6">
                                    <label>Tipo</label><br>
                                    <input type="text" class="form-control" value="{{$actividad->tipo}}">
                                </div>

                                @if($actividad->tipo == "Grupal")
                                <div class="form-group col-md-6">
                                    <label>Cupo socios</label><br>
                                    <input type="text" class="form-control" value="{{$actividad->actividadGrupal->cupo_socios}}">
                                </div>
                                @else
                                <div class="form-group col-md-6">
                                    <label>Categoria</label><br>
                                    <input type="text" class="form-control" value="{{$actividad->categoria->nombre}}">
                                </div>
                                @endif

                            </div>


                            @if($actividad->tipo == "Grupal")
                            <div class="form-row">

                                <div class="form-group col-md-6">
                                    <label>Categoria</label><br>
                                    <input type="text" class="form-control" value="{{$actividad->categoria->nombre}}">
                                </div>

                            </div>
                            @endif


                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label>Descripción</label><br>
                                    <input type="text" class="form-control" value="{{$actividad->descripcion}}">
                                </div>
                            </div>

                        </fieldset>


                    </form>

                </div>

            </div>

            <div class="col-md-2">

                <br>
                <br>

                <div class="btn-group-vertical">

                 @if(Auth::user()->id == $actividad->usuario_id)
                 <a href="{{url('/eliminar-actividad/'.$actividad->id)}}" class="btn btn-outline-danger btn-lg">Eliminar</a>
                 <a href="{{url('/actualizar-actividad/'.$actividad->id)}}" class="btn btn-outline-info btn-lg" >Actualizar</a>
                 @endif

                 @if((Auth::user()->id != $actividad->usuario_id)&&(Auth::user()->roles->nombre != $actividad->usuario->roles->nombre))
                    @if($apuntado!=null)
                        @if(Auth::user()->id != $apuntado->usuario_id)
                        <a href="{{url('/apuntar/'.$actividad->id)}}" class="btn btn-outline-success btn-lg" >Apuntarse</a>
                        @endif
                    @endif
                @endif

                @if($apuntado==null)
                <a href="{{url('/apuntar/'.$actividad->id)}}" class="btn btn-outline-success btn-lg" >Apuntarse</a>
                @endif

                @if($apuntado!=null)
                    @if(Auth::user()->id == $apuntado->usuario_id)
                    <a href="{{url('/desapuntar/'.$actividad->id)}}" class="btn btn-outline-warning btn-lg" > Desapuntarse</a>
                    @endif
                @endif

               @if($actividad->tipo == "Grupal")
               <a href="{{url('/apuntados/'.$actividad->id)}}" class="btnblack btn btn-lg">
                   Apuntados
                   <span class="badge badge-primary badge-pill">{{$totalApuntados}}</span>
               </a>
               @endif

           </div>

       </div>

   </div>

</div>

@include('comentarios')

@endsection
