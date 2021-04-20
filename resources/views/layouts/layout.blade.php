
<!DOCTYPE html>
<html lang="en">
<head>
	<!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
    <style type="css/cssPropio.css"></style>
<title>@yield('title')</title>
</head>

<body style="background-color: white; background-image:url(43362.jpg)">
<nav class="navbar navbar-expand-sm navbar-dark bg-dark"> 
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" href="{{ route('home') }}">Inicio</a>
    </li>
  	<li class="nav-item">
      <a class="nav-link" href="{{ route('show') }}">Mostrar empleados</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{ route('createEmpleado') }}">Crear empleado</a>
    </li>       
    <li class="nav-item">
      <a class="nav-link" href="{{ route('createTarea') }}">Tareas</a>
    </li>
   <li class="nav-item">
      <a class="nav-link" href="{{ route('login') }}">Inicia sesión</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{ route('register') }}">Regístrate</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{ route('forgot-password') }}">Recuperar contraseña</a>
    </li>

  </ul>
</nav>

<h4>@yield('title2')</h4>

@yield('content')



</body>
<footer >
  <div class="mx-auto fixed-bottom bg-transparent" style="width: 500px;">
    <a href='https://www.freepik.es/vectores/fondo' class="text-dark">Vector de Fondo creado por rawpixel.com - www.freepik.es</a>
  </div>
</footer>

</html>