@extends('layouts.app')

@section('content')
<br>
<div class="container" align="center">

    <div class="card col-md-10">
        <div class="card-header">
            <h3>CREAR ACTIVIDAD</h3>
        </div>

        <div class="card-body">

            <form action="{{route('guardarActividadGrupal')}}" method="post" enctype="multipart/form-data" class="col-lg-12">

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

                    <div class="form-group col-md-6" align="left">
                        <label for="nombre">Nombre</label>
                        <input type="text" class="form-control" id="nombre" placeholder="Introduzca el nombre" name="nombre">
                    </div>

                    <div class="form-group col-md-6"  align="left">
                        <label for="fecha">Fecha</label>
                        <input type="date" class="form-control" id="fecha" placeholder="Introduzca la fecha" name="fecha">
                    </div>

                </div>


                <div class="form-row">

                    <div class="form-group col-md-6"  align="left">
                        <label for="hora">Hora</label>
                        <input type="time" class="form-control" id="hora" placeholder="Introduzca la hora" name="hora">
                    </div>

                    <div class="form-group col-md-6"  align="left">
                        <label for="lugar">Lugar</label>
                        <input type="text" class="form-control" id="lugar" placeholder="Introduzca el lugar" name="lugar">
                    </div>

                </div>


                <div class="form-row">

                    <div class="form-group col-md-6"  align="left">
                        <label for="maximo_socios">Num. Máximo de Socios</label>
                        <input type="number" class="form-control" id="maximo_socios" placeholder="Introduzca la cantidad máxima de socios" name="maximo_socios">
                    </div>

                    <div class="form-group col-md-6"  align="left">
                        <label for="minimo_voluntarios">Num. Mínimo de Voluntarios</label>
                        <input type="number" class="form-control" id="minimo_voluntarios" placeholder="Introduzca la cantidad mínima de voluntarios" name="minimo_voluntarios">
                    </div>

                </div>

                <div class="form-row">

                    <div class="form-group col-md-12"  align="left">
                        <label for="descripcion">Descripción</label>
                        <input type="text" class="form-control" id="descripcion" placeholder="Introduzca la descripción" name="descripcion">
                    </div>

                </div>

                <div class="form-row">
                    <div class="form-group col-md-12"  align="left">

                        <label for="categorias">Categoría</label>
                        <select id="categorias" class="form-control" name="categorias">
                            <!-- <option value=0>---</option> -->
                            @foreach($categorias as $categoria)
                            <option value="{{$categoria['id']}}">{{$categoria->nombre}}</option>
                            @endforeach
                        </select>

                    </div>

                </div>

                <div class="form-row">

                    <button type="submit" class="btn btn-success btn-lg ">Crear</button>

                </div>


            </form>


        </div>

    </div>

</div>
@endsection
