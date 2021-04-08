
<!DOCTYPE html>
<html lang="en">
<head>
	<!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
<title>@yield('title')</title>
</head>

<body>
 <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

<nav class="navbar navbar-expand-sm bg-light"> 
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" href="{{ route('home') }}">Inicio</a>
    </li>
  	<li class="nav-item">
      <a class="nav-link" href="{{ route('show') }}">Mostrar empleado</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{ route('createEmpleado') }}">Crear empleado</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{ route('delete') }}">Eliminar empleado</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{ route('update') }}">Modificar empelado</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{ route('createTarea') }}">Tareas</a>
    </li>
  </ul>
</nav>

<h4>@yield('title2')</h4>

@yield('content')



</body>
</html>