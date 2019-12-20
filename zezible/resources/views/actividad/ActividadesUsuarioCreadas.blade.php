@extends('layouts.app')
@section('content')
<div class="pagename">

    <div class="sub-pagename">
        <h1>Actividades Propuestas de {{$usuario->name}} {{$usuario->ApellidoP}}</h1>
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

                <form class="leftForm col-md-9">

                    <fieldset disabled>


                        <div class="form-row">

                            <div class="form-group col-md-6">
                                <label><b>Estado</b></label><br>
                                <input type="text" class="form-control form-control-sm" value="{{$actividad->estado}} ">
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


                        <div class="form-row">

                            <div class="form-group col-md-6">
                                <label>Categoria</label><br>
                                <input type="text" class="form-control form-control-sm" value="{{$actividad->categoria_id}}">
                            </div>

                        </div>


                    </fieldset>

                </form>



                <div class="rightForm col-md-3" align="left">
                    <br>
                    <div class="btn-group-vertical">
                        <a href="{{url('/ver-actividad/'.$actividad->id)}}" class="btn btn-lg btn-primary">Observar actividad</a>
                        <a href="{{url('/apuntados/'.$actividad->id)}}" class="btn btn-lg btn-success">Apuntados</a>
                    </div>

                </div>

            </div>

        </div>

        <br><br>
        @endforeach
    </ul>

</div>
<br>
@endsection
