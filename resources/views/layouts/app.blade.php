<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->

    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="http://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script src="{{ asset('js/jquery.imageuploader.js') }}"></script>
    <script src="{{ asset('js/lozad.min.js') }}"></script>
    <script src="{{ asset('js/wow.min.js') }}"></script>
    
    
    
    @yield('script')
    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/styles.imageuploader.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/datepicker.css') }}">
    <link rel="shortcut icon" href="{{asset('img/favicon.ico')}}" type="image/x-icon">
    
    @yield('stylesheet')
</head>
<body>
    <div id="app">
        <div class="d-flex justify-content-center">
            <a href="#">
                <img src="/img/facebook.jpg" class="img-fluid d-block   m-0" alt="" style="width: auto; height: 30px;">
            </a>
            <a href="#">
                <img src="/img/twitter.jpg" class="img-fluid d-block  m-0" alt="" style="width: auto; height: 30px;">
            </a>
            <a href="#">
                <img src="/img/instagram.jpg" class="img-fluid d-block   m-0" alt="" style="width: auto; height: 30px;">
            </a>
        </div>
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel sticky-top">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="/img/watermark.png" class="img-fluid d-block   m-0" alt="" style="width: auto; height: 40px;">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto"></ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        <li class="nav-item ">
                                <a class="nav-link btn btn-danger text-white" data-toggle="modal" data-target="#exampleModal" style="cursor: pointer">{{ __('Contacto') }}</a>
                            </li>
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Iniciar Sesión') }}</a>
                            </li>
                            <li class="nav-item">
                                @if (Route::has('register'))
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Crear cuenta') }}</a>
                                @endif
                            </li>
                        @else
                            
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <img src="/img/profiles/{{ Auth::user()->profile_img}}" alt="" class="fluid-img float-left mr-1" style="height: 24px; width: 24px; border-radius: 50%; object-fit: contain;"> {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <div>
                                        <a class="dropdown-item" href="{{ url('profile') }}">Mi Cuenta</a>
                                    </div>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        Cerrar Sesión
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
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
</html>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Contáctanos</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Información de contacto
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>