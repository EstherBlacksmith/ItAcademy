<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Exercicios</title>
          
        <script src="{{ asset('js/app.js') }}" defer></script>

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
    </head>
    
    <!-- Body -->
    <body>        
        <div class="card-body">
            <div class="card alert alert-info">
             @yield('content')
            </div>
        </div>
      
      
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    </body>
    
    <!-- Footer-->
    <footer>       
        <div class="card-body">
            <div class="card alert alert-info">
                itAcademy 2021
            </div>
        </div>
    </footer>
</html>
