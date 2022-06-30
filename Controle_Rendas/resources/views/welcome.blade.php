<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Controle de Rendas</title>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

     <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
     <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>

    <body class="antialiased">
    <div>

@if (Route::has('login'))
<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
  <div class="container">
     <a class="navbar-brand" href="/">
     Controle de Rendas
     </a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
           <span class="navbar-toggler-icon"></span>
     </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
       <!-- Left Side Of Navbar -->
            <ul class="navbar-nav me-auto">

             </ul>
      <ul class=" navbar-nav ms-auto"> 
       @auth 
        <li class="nav-item">
          <a class="nav-link " aria-current="page" href="{{ url('/home') }}">Home</a>
        </li>
        @else
        <li class="nav-item">
          <a class="nav-link" href="{{ route('login') }}">Log in</a>
        </li>
        @if (Route::has('register'))
          <li class="nav-item">
          <a class="nav-link" href="{{ route('register') }}">Register</a>
        </li>
         @endif
       @endauth
    </div>
  </div>
</nav>
@endif


<div class="card py-5 px-5">
  <div class="card-header">
    Controle de Rendas
  </div>
  <div class="card-body">
    <h5 class="card-title">Seja Bem Vindo</h5>
    <p class="card-text">Faça aqui o controle das suas rendas, tendo informaçoes sobre seus inclinos e histórico de pagamento.</p>
  </div>
</div>

    </body>
</html>
