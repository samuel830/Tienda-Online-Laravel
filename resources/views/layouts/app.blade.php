<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />

    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css"
      rel="stylesheet"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="{{ asset('css/app.css') }}" />
    
    <title>Título</title>
  <link rel="stylesheet" type="text/css" href="https://www3.gobiernodecanarias.org/educacion/cau_ce/cookies/cookieconsent.min.css"/><script  type="text/javascript" src="https://www3.gobiernodecanarias.org/educacion/cau_ce/cookies/cookieconsent.min.js"></script><script type="text/javascript" src="https://www3.gobiernodecanarias.org/educacion/cau_ce/cookies/cauce_cookie.js"></script><script type="text/javascript" src="https://www3.gobiernodecanarias.org/educacion/cau_ce/estadisticasweb/scripts/piwik-base.js"></script><script type="text/javascript" src="https://www3.gobiernodecanarias.org/educacion/cau_ce/estadisticasweb/scripts/piwik-eforma.js"></script></head>
  <body style="font-family: {{session("tipo_Letra","Arial")}}!important">
    <!-- header -->
    
    <nav class="navbar navbar-expand-lg navbar-dark bg-secondary py-4">
      <div class="container">
        <a class="navbar-brand" href="{{ route('home.index') }}">@yield('title', 'Tienda online')</a>
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarNavAltMarkup"
          aria-controls="navbarNavAltMarkup"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
          <div class="navbar-nav ms-auto">
            <a class="nav-link active" href="{{ route('home.index') }}">Home</a>
            <a class="nav-link active" href="{{ route('home.about') }}">About</a>
            <a class="nav-link active" href="{{ route('products.index') }}">Products</a>
            @if (!(Auth::check()))
              <a class="nav-link active" href="{{ route('login') }}">Login</a>
              <a class="nav-link active" href="{{ route('register') }}">Register</a>
            @endif
            @if (Auth::check())
              <a class="nav-link active" href="{{ route('admin.home.index') }}">Admin</a>
              <a class="nav-link active" href="{{ route('home.conf') }}">Configuracion</a>
              <a class="nav-link active" href="{{ route('logout') }}">Logout</a>
            @endif
          </div>
        </div>
      </div>
    </nav>

    <header style="background-color: {{session("color_encabezado","#1abc9c")}}!important" class="masthead text-white text-center py-4">
      <div class="container d-flex align-items-center flex-column">
        <h2>@yield('subtitle', 'Una Tienda Online Laravel')</h2>
      </div>
    </header>
    
    <!-- header -->
    
    <div class="container my-4">@yield('content')</div>

    <!-- footer -->
    <div class="copyright py-4 text-center text-white">
        <div class="container">
          <small>
            Desarrollo web en entorno servidor - 2º DAW
          </small>
          <br>
          <small>
            {{now()}}
          </small>
        </div>
    </div>
    
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
      crossorigin="anonymous"
    ></script>
  </body>
</html>