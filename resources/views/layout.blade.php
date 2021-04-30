
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <link rel="icon" href="/pelota.ico" />
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>



<link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
<link href="{{ asset('css/app.css') }}" rel="stylesheet">                                                                                             
<!-- datepicler -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.5/css/bootstrap.min.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.min.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.min.js"></script>
<script>
    $( document ).ready(function() {

        $('#fecha').datepicker();
    });
</script>
<title>@yield('title')</title>
</head>

<body class="img-fluid" background="{{asset('campo.jpg')}}" style="background-size: cover; 
                               background-position: center center; 
                               background-attachment: fixed;
                               background-repeat: no-repeat;">                     
  <div class="container-fluid">
    <div class="row ">   

      <nav class="navbar navbar-expand-lg navbar-light bg-light fw-bold link-success">
        <div class="container-fluid">
          <a class="navbar-brand" href="{{route('welcome')}}">Liga de futbol <i class="fas fa-futbol"></i></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav"> 
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink1" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Equipos
                </a>
               <ul class="dropdown-menu  fw-bold shadow-lg p-3 mb-5 rounded"   data-bs-popper="none">
                  <li><a class="dropdown-item fw-bold link-success"  href="{{route('equiposIndex')}}">Mostrar</a></li>
                  <li><a class="dropdown-item fw-bold link-success"  href="{{route('equiposCreate')}}">Crear</a></li>
                </ul>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink2" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                 Partidos
                </a>
                <ul class="dropdown-menu  fw-bold shadow-lg p-3 mb-5 rounded"   data-bs-popper="none">
                  <li><a class="dropdown-item fw-bold link-success" href="{{route('partidosIndex')}}">Mostrar</a></li>
                  <li><a class="dropdown-item fw-bold link-success" href="{{route('partidosCreate')}}">Crear</a></li>
                </ul>
              </li>

              @if (Route::has('login'))
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink3" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Login
                  </a>
                  <ul class="dropdown-menu  fw-bold shadow-lg p-3 mb-5 rounded"   data-bs-popper="none">
                    @auth                    
                      <li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" >
                          @csrf
                          <button type="submit" class="btn">Cerrar sesión</button>
                      </form>

                    </li>
                    @else                     
                      <li><a class="dropdown-item fw-bold link-success" href="{{ route('login') }}">Log in</a></li>
                      @if (Route::has('register'))
                        <li><a class="dropdown-item fw-bold link-success" href="{{ route('register')}}">Register</a></li>
                      @endif
                    @endauth     
                  </ul>
                </li>
              @endif
             
            </ul>

          </div>
        </div>
      </nav>
    </div> 
  </div>

  <div class="container">
    <div class="col-md-8 fw-bold mb-5 rounded" >   
      @yield('content')
    

    @if ($errors->any())
      <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
    @endif
  </div>  

  </div>
</body>

<footer>
  <div class="mx-auto fixed-bottom bg-transparent" style="width: 500px; ">
    <a href='https://www.freepik.es/vectores/fondo' class="text-dark">Vector de Fondo creado por macrovector - www.freepik.es</a>
</footer>

</html>