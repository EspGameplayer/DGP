@extends('layouts.app')
@section('content')
<div class="pagename">

    <div class="sub-pagename">
        <h1>Lista de actividades</h1>
    </div>

</div>

<br>

<div class="container col-md-10" align="center">
    <ul class="list-unstyled" >
        @foreach($actividades as $actividad)
        <div class="card col-md-9">

            <div class="card-header">
                {{$actividad->nombre}}
            </div>

            <div class="card-body" align="left">

                <form class="leftForm col-md-10">

                    <fieldset disabled>


                        <div class="form-row">

                            <div class="form-group col-md-6">
                                <label>Categoria</label><br>
                                <input type="text" class="form-control form-control-sm" value="{{$actividad->categoria->nombre}}">
                            </div>

                            <div class="form-group col-md-6">
                                <label>Fecha</label><br>
                                <input type="text" class="form-control form-control-sm" value="{{$actividad->fecha}}">
                            </div>

                        </div>


                        <div class="form-row">

                            <div class="form-group col-md-6">
                                <label>Tipo actividad</label><br>
                                <input type="text" class="form-control form-control-sm" value="{{$actividad->tipo}}">
                            </div>

                            <div class="form-group col-md-6">
                                <label>Lugar</label><br>
                                <input type="text" class="form-control form-control-sm" value="{{$actividad->lugar}}">
                            </div>

                        </div>



                    </div>

                </fieldset>
            </form>



            <div class="rightForm col-md-1" align="left">
                <br>

                <div class="btn-group-vertical">
                    <a href="{{url('/ver-actividad/'.$actividad->id)}}" class="btn btn-primary">Observar</a>
                    @if((Auth::user()->id == $actividad->usuario_id)||(Auth::user()->roles->nombre == "Gestor"))  
                    <a href="{{url('/eliminar-actividad/'.$actividad->id)}}" class="btn btn-danger ">Eliminar</a>
                    <a href="{{url('/actualizar-actividad/'.$actividad->id)}}" class="btn btn-success" >Actualizar</a>
                    @endif
                </div>

            </div>

        </div>

    <br><br>

    @endforeach
    </ul>

</div>
{{$actividades->links()}}
@endsection
