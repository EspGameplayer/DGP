@extends('layouts.app')
@section('content')
<div class="pagename">

    <div style="margin-left: 50px">
        <h1>¿Qué quieres hacer?</h1>
    </div>

</div>

<br>

<div class="container">

    <!--
    <div class="row justify-content-center">

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

        </div>

    </div>
    -->

    <br>


    <div class="row">

        <div class="col-md-6">

            <div class="card">

                <div class="card-header">
                    Proponer Actividad
                </div>

                <div class="card-body">
                    <p class="card-text">
                        Cree la actividad que quiera y espere que sus compañeros se apunten.
                    </p>
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
                    Consultar Actividades
                </div>

                <div class="card-body">
                    <p class="card-text">
                        Revise las actividades disponibles.
                    </p>
                    <a href="{{ route('actividadesList')}} " class="btn btn-primary">Ver actividades</a>
                </div>

            </div>

        </div>

    </div>

    <br>



    <div class="row">

        <div class="col-md-6">

            <div class="card">

                <div class="card-header">
                    Mis Actividades
                </div>

                <div class="card-body">
                    <p class="card-text">
                        Aquí se encuentran todas las actividades que usted ha realizado y las que se ha apuntado.
                    </p>
                    <a href="{{route('MisActividades')}}" class="btn btn-primary">Mis actividades</a>
                </div>

            </div>

        </div>


        <div class="col-md-6">

            <div class="card">

                <div class="card-header">
                    Vacío
                </div>

                <div class="card-body">
                    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua.</p>
                        <a href="#" class="btn btn-primary">Vacio</a>
                </div>

            </div>

        </div>


    </div>
    

    <br>

</div>
@endsection
