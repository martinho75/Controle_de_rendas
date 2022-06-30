<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Controle de Rendas') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Controle de Rendas') }}
                    @guest
                    <a href="{{ url()->previous() }}"><small>Back</small></a> 
                    @endguest
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                @auth
                    <!-- centro Side Of Navbar -->
                    <ul class="navbar-nav mx-auto">
                     <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle px-3" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        Inclino
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
                                        <li><a class="dropdown-item" href="{{ route('inclino.index') }}">listar</a></li>
                                        <li><a class="dropdown-item" href="{{ route('inclino.create') }}">cadastrar</a></li>
                                        <li><hr class="dropdown-divider"></li>
                                        <li><a class="dropdown-item" href="{{ route('inclino.pesquisar') }}">Pesquisar</a></li>
                                    </ul>
                                    </li>

                                     <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle px-3" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            Imovel
                                        </a>
                                        <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
                                            <li><a class="dropdown-item" href="{{route('imovel.index')}}">Listar</a></li>
                                            <li><a class="dropdown-item" href="{{route('imovel.create')}}">cadastrar</a></li>
                                        </ul>
                                        </li>

                                         <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle px-3" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            Fatura
                                        </a>
                                        <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
                                            <li><a class="dropdown-item" href="{{route('fatura.index')}}">listar</a></li>
                                            <li><a class="dropdown-item" href="{{route('fatura.create')}}">cadastrar</a></li>
                                            <li><hr class="dropdown-divider"></li>
                                            <li><a class="dropdown-item" href="{{route('fatura.pesquisar')}}">Pesquisar</a></li>
                                        </ul>
                                        </li>

                    </ul>
                    @endauth

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else

                            <a href="{{ url()->previous() }}" class=" mx-2 my-2">Voltar</a>

                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        
        @auth
        <nav aria-label="breadcrumb" class="mx-2  my-2">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{Route::currentRouteName()}}</li>
            </ol>
            </nav>
        @endauth

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
