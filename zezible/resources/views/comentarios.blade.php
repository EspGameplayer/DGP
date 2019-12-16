<hr>

<div class="container col-md-8">

    @if(session('message'))
    <div class="alert alert-success" role="alert" align="center">
        {{session('message')}}
    </div>
    @endif

    @if(session('message2'))
    <div class="alert alert-danger" role="alert" align="center">
        {{session('message2')}}
    </div>
    @endif

    <form class="col-md-12" method="POST" action="{{ url('/comentario') }}">


        <div class="row">

            <div class="col-md-10">
                {!! csrf_field() !!}
                <input type="hidden" name="actividad_id" value="{{$actividad->id}}" required>
                <label style="font-size: 130%">Escribir comentario:</label><br>
                <p>
                    <textarea cols="80" rows="2" class="form-control" name="comentario" required>{{old('comentario')}}</textarea>
                </p>
            </div>

            <div class="col-md-2" align="center">
                <br><br>
                <input type="submit" value="Comentar" class="btn btn-success btn-lg" >
            </div>

        </div>


    </form>

</div>

<hr>


@if(isset($actividad->comentarios))
<div class="sub-pagename">
    <h3>COMENTARIOS</h3><br>
</div>

<div id="comments-list" class="container col-md-10">

    @foreach($actividad->comentarios as $comentario)
    <div class="card">

        <div class="card-header">
            <b>{{$comentario->usuario->name}}&nbsp;{{$comentario->usuario->ApellidoP}}&nbsp;{{$comentario->usuario->ApellidoM}}</b>
        </div>

        <div class="card-body">


            <div class="row">

                <div class="col-md-10">
                    <p class="card-text">{{$comentario->comentario}}</p>
                </div>

                <div class="col-md-2">
                    @if(Auth::user()->id == $comentario->usuario_id)
                    <a href="{{url('/eliminar-comentario/'.$comentario->id)}}" class="btn btn-outline-danger btn-lg">Eliminar</a>
                    @endif
                </div>

            </div>


        </div>

    </div>

    <br>
    @endforeach

</div>
@endif
