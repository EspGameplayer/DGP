@extends('layouts.app')

@section('content')

<div class="pagename">
  <div style="margin-left: 50px">
<h1>¿Que quieres hacer?</h1>
</div>
</div>

<br>
<div class="container">
    <!--<div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Asociación VALE</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    ¡Estas logeado!
                </div>
            </div>
        </div>
    </div>-->
<br>
<div class="row">

    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                    Proponer actividad
            </div>
            <div class="card-body">
                <p class="card-text">Crea la actividad que quieras y espera que tus compañeros se apunten.</p>
                @if(Auth::user()->esGestor())
                <a href="{{ route('crearActividadGrupal')}}" class="btn btn-primary">Crear actividad</a>
                @else
                <a href="{{ route('crearActividadSimple')}}" class="btn btn-primary">Crear actividad</a>
                @endif 
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                    Consultar actividades disponibles
            </div>
            <div class="card-body">
                <p class="card-text">Revisa las actividades disponibles que han propuesto tus compañeros</p>
                <a href="{{ route('actividadesList')}} " class="btn btn-primary">Ver actividades disponibles</a>
            </div>
        </div>
    </div>

</div>
<br>
<div class="row">

<div class="col-md-6">
    <div class="card">
            <div class="card-header">
                    Mis actividades apuntadas
            </div>
            <div class="card-body">
                <p class="card-text">Aqui se encuentran todas las atividades a las que te has apuntado</p>
                <a href="{{route('MisActividades')}}" class="btn btn-primary">Mis actividades apuntadas</a>
            </div>
    </div>
</div>
<div class="col-md-6">
    <div class="card">
            <div class="card-header">
                    Mis actividades creadas
            </div>
            <div class="card-body">
                <p class="card-text">Aqui se encuentran todas las atividades que has propuesto, revisa quien se ha apuntado</p>
                <a href="{{route('MisActividadesCreadas')}}" class="btn btn-primary">Mis actividades creadas</a>
            </div>
    </div>
</div>



</div>

<br>
@endsection
