<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'White Collar') }}</title>

    <!-- Scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/jquery.tabledit.js" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
</head>

<body>
<script>
    $( document ).ready(function() {
        if(!localStorage.getItem('token')){
            let token = "<?php echo isset($token) ? $token : ''; ?>";
            localStorage.token = token;
        }
    });       
</script>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('home') }}">
                    {{ config('app.name', 'White Collar') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                          <!--  <a class="nav-link" href="{{ route('index.shops') }}">{{ __('Shops') }}</a> !-->
                            <button onClick="route('/api/shops')">{{ __('Shops') }}</button>
                        </li>
                        <li class="nav-item">
                            <!-- <a class="nav-link" href="{{ route('create.shops') }}">{{ __('Create shops') }}</a> !-->
                            <button onClick="route('create.shops')">{{ __('Create shops') }}</button>
                        </li>
                        <li class="nav-item">
                             <!--  <a class="nav-link" href="{{ route('index.collars') }}">{{ __('Collars') }}</a> !-->
                             <button onClick="route('index.collars')">{{ __('Collars') }}</button>
                        </li>
                        <li class="nav-item">
                             <!--  <a class="nav-link" href="{{ route('create.collars') }}">{{ __('Create collars') }}</a> !-->
                             <button onClick="route('create.collars')">{{ __('Create collars') }}</button>
                        </li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
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
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
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

       
    </div>
    <div class="container" >
            
        <div class="row">
        @yield('content')
        
        @if(session('success'))
            <div class="alert alert-light" role="alert">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger" role="alert">
                {{ session('error') }}
            </div>
        @endif
        </div>
    </div>       
  <script>
          function route(route) {
              alert(route);
              console.log(route);
            axios.defaults.headers.common = {
                Authorization: "Bearer " + localStorage.getItem("token")
            };
          
            axios({
                method: 'get',
                url: route
                            
            })
            .then(function (response) {
                //handle success
                console.log(response);
                //window.location =route;
            })
            .catch(function (response) {
                //handle error
                console.log(response);
            });           
        }
       
    </script>
</body>
</html>
