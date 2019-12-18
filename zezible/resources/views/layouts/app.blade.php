<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>VALE</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
     <!-- Styles -->
    <link rel="stylesheet" type="text/css" href="{{ url('/css/style.css') }}" />


</head>
<body>
    <div id="app">
        <nav id="navbarZezible" class="navbar navbar-expand-md navbar-dark shadow-sm " >
       <!-- <nav id="navbarZezible" class="navbar navbar-expand-md navbar-light navbar-laravel" >-->
            <div class="container" >
                <a class="navbar-brand" href="{{ url('/home') }}">
                    <img src="http://www.asvale.org/wp-content/uploads/2019/06/Asvale-asociacion-granada-discapacidad-intelectual-logo.svg" width="30" height="30" class="d-inline-block align-top" alt="">
                    Asociación Vale
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                 <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                           <!-- @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif -->
                        @else
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('actividadesList')}}">Actividades disponibles</a>
                            </li>
                            <li>
                                <a class="nav-link" href="{{ route('Perfil') }}">Mi perfil</a>
                            </li>
                            <li>
                                <a class="nav-link" href="{{route('MisActividades')}}">Mis actividades apuntadas</a>
                            </li>
                            <li>
                                <a class="nav-link" href="{{route('MisActividadesCreadas')}}">Mis actividades creadas</a>
                            </li>


                            @if(Auth::user()->esGestor())
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    
                                    
                                    @if(Auth::user()->esGestor())
                                    <a class="dropdown-item" href="{{ route('usuariosList')}}">Gestión de usuarios</a>
                                    <a class="dropdown-item" href="{{ route('crearActividadGrupal')}}">Crear actividad</a>
                                    <a class="dropdown-item" href="{{ route('TodasActividades')}}">Todas las actividades</a>
                                    @endif
                                    
                                   <!-- @if(Auth::user()->esSocio())
                                    <a class="dropdown-item" href="{{ route('crearActividadSimple')}}">Crear actividad</a>
                                    @endif
                                    
                                    @if(Auth::user()->esVoluntario())
                                    <a class="dropdown-item" href="{{ route('crearActividadSimple')}}">Crear actividad</a>
                                    @endif -->

                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                            @endif

                            @if((Auth::user()->esSocio())||(Auth::user()->esVoluntario()))
                            <li>
                                <a class="nav-link" href="{{ route('crearActividadSimple')}}">Crear actividad</a>
                            </li>
                            <li>
                                <a class="nav-link" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                </form>
                            <li>
                            @endif
                            
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main >
            @yield('content')
        </main>
    </div>
</body>
<br>
<!-- Footer -->
<footer class="page-footer font-small">

  <!-- Copyright -->
  <div class="footer-copyright text-center py-3">© 2019 Copyright:
    <a href="http://www.asvale.org/"> Asociación Vale</a>
  </div>
  <!-- Copyright -->

</footer>
<!-- Footer -->
</html>
