<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css" >

        <script src="https://code.jquery.com/jquery-3.3.0.js"
                integrity="sha256-TFWSuDJt6kS+huV+vVlyV1jM3dwGdeNWqezhTxXB/X8="
                crossorigin="anonymous" >
        </script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js" ></script>
        <link rel="stylesheet" href="{{asset('css/main.css') }}" >
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" >
        <script src="{{ asset('js/lazysizes.min.js') }}" async ></script>
        <script>
            $(document).ready(function(){
            $('.dropdown-trigger').dropdown();
            $('.sidenav').sidenav();
            $('.parallax').parallax();
          });
        </script>
        <style>
            nav{
                background: white;

                box-shadow: none !important;
            }
            .color-principal{
                color:#3668A6 !important;
            }
            .fondo-principal{
             background: #3668A6;
            }
            .button-search-principal{
                
                color:white;
            }
            ul li  a {
                color:#3668A6 !important;
                font-weight: bold;
            }
            .bold{
                font-weight: bold;
            }
            .padding-1{
               padding: .7em !important;
            }
            .padding-search{
               padding: 1.2em !important;

            }
            .block{
                width: 75%;
            }
            .border-radius{
                border-radius: 1em !important;
            }
            .block-100{
              width: 100%;
            }
        </style>

</head>


<body>      
  <div id="app">
      <nav>
        <div class="nav-wrapper">
          <a href="/" class="brand-logo center color-principal bold">Terrazas</a>
          <a href="#" data-target="mobile-demo" class="sidenav-trigger color-principal "><i class="material-icons">menu</i></a>
          <ul class="right hide-on-med-and-down">
            <ul class="right hide-on-med-and-down">
            
             @guest
              <li><a href="{{ route('login') }}">Ingresar</a></li>
              @if (Route::has('register'))
              <li><a href="{{ route('register') }}">Registrar</a></li>
              @endif
            @else
              <li style="width:auto !important;min-width: 100px;">
                <a class='dropdown-trigger right-align' href='#' data-target='dropdown1'> {{ Auth::user()->name }}</a>
              </li>
              <ul id='dropdown1' class='dropdown-content' >
                <li><a href="{{ route('profile') }}"><i class="fas fa-user blue-text"></i>perfil</a></li>
                <li class="divider" tabindex="-1"></li>
                <li class="divider" tabindex="-1"></li>
                <li class="red">
                  <a class="dropdown-item white-c" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                      <i class="fas fa-sign-out-alt"></i>Salir</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                    </form>      
                </li>                            
              </ul>
            @endguest

          </ul>
        </div>
      </nav>
    

  <ul class="sidenav" id="mobile-demo">
    <li><a href="{{ route('login') }}" >Iniciar</a></li>
    <li><a href="{{ route('register') }}" >Registrate</a></li>
    <li>
      <a class="btn  " style="background: #D72638 !important;" href="{{ route('logout') }}"  onclick="event.preventDefault();  document.getElementById('logout-form').submit();">
        salir
      </a>
      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
       @csrf
      </form>
    </li>
  </ul>
        <main>
            @yield('content')
        </main>

  </div>
        
</body>
</html>
