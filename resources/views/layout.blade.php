
<!doctype html>
<html lang="es">

<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous"></head>

    <title>@yield('title')</title>
</head>
<body> 
 
    <div>
        <nav class="navbar navbar-light bg-light navbar-expand-lg">
            <div>
                <i class="fas fa-cat" style="font-size:60px;color:lightblue;text-shadow:2px 2px 4px #000000;"></i> 
            </div>
            
            <div>        
   
                <a class="navbar-brand" href="/home">Home</a>
                <a class="navbar-brand" href="/login">Login</a>
                <a class="navbar-brand" href="/logout">Logout</a>
                <a class="navbar-brand" href="/catalog">Index</a>
                <a class="navbar-brand" href="/catalog/show">Show</a>
                <a class="navbar-brand" href="/catalog/create">Create</a>
                <a class="navbar-brand" href="/catalog/delete">Delete</a>
                <a class="navbar-brand" href="/catalog/update">Update</a>
            </div>
        </nav>             
    </div>    
   
    <div class="container">
        <header class="row">            
            <h2>@yield('title2')</h2>
        </header>        
   </div>
    
    <div class="container">

        <div id="main" class="row">            
            @yield('content')
        </div>

      
    </div>
    
    <footer class="row">
        <h5>ItAcademy 2021</h5>
    </footer>

</body>
</html>

