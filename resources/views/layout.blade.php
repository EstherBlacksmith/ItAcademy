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
    </head>
    <body>
        <div class="card-body">
            <div class="card alert-danger">
             @yield('content')
            </div>
        </div>
    </body>
    <footer> 
        <div class="card-body">
            <div class="card alert-dark">
                itAcademy 2021
            </div>
        </div>
    </footer>
</html>
