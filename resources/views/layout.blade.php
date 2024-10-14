<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Autos @yield('title')</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body>
<nav class="navbar navbar-expand-lg shadow-lg" style="background-color: #000000;">
  <div class="container-fluid">
    <a class="navbar-brand fw-bold text-uppercase" style="letter-spacing: 2px; color: #f8f9fa;">Autos</a>
    
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{ url('autos') }}" style="color: #f8f9fa; font-weight: 500; transition: color 0.3s;">Lista de Autos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ url('autos/create') }}" style="color: #f8f9fa; font-weight: 500; transition: color 0.3s;">Crear Auto</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ url('alumnos') }}" style="color: #f8f9fa; font-weight: 500; transition: color 0.3s;">Registro de Usuarios</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ url('alumnos/create') }}" style="color: #f8f9fa; font-weight: 500; transition: color 0.3s;">Lista de Usuarios</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<style>
    .navbar-nav .nav-link:hover {
        color: #ffcc00 !important; 
    }

    .navbar {
        background-color: #007bff; 
    }
</style>

<div class="container mt-3">
    @yield('body')
</div>
</body>
</html>
