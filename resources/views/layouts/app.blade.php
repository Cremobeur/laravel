<!DOCTYPE html>

<html lang="{{ app()->getLocale() }}">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>
        @section('title')
            Immo
        @show
    </title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ mix('css/app.css') }} ">

</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light nav-immo">
        <div class="container">
          <a class="navbar-brand" href="/">KOOL-T</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <div class="navbar-nav">
                <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="/">Home</a>
                <a class="nav-link {{ request()->is('about') ? 'active' : '' }}" href="/about">About</a>
                <a class="nav-link {{ request()->is('/nos-annonces') ? 'active' : '' }}" href="/nos-annonces">Annonces</a>
              </div>
          </div>
        </div>
      </nav>

    @yield('content')
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ mix('js/app.js') }} "></script>
</body>

</html>