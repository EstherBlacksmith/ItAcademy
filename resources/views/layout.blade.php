<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!--  Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!-- Axios -->
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>

    <title>Gambling</title>
  </head>
  <body>   
  <ul class="nav">
    <li class="nav-item">
        <a class="nav-link active" href="{{Route('loginView')}}">Login</a>
    </li>  

    <li class="nav-item">
        <button type="button" onclick="logout()"  class="btn btn-info">Logout</button>
    </li>

   <!-- <li class="nav-item">
        <button type="button" onclick="play()"  class="btn btn-info">Play!</button>
    </li>-->

    <li class="nav-item">
        <button type="button" onclick="Delete()"  class="btn btn-info">Delete</button>
    </li>
   
    <li class="nav-item">
        <button type="button" onclick="PlayersList()" class="btn btn-info">PlayersList</button>
    </li>
 
    <li class="nav-item">
        <button type="button"  onclick="myGames()"  class="btn btn-info">myGames</button>
    </li>

    <li class="nav-item">
        <button type="button"  onclick="ranking()"  class="btn btn-info">Ranking</button>
    </li>

    <li class="nav-item">
        <button type="button" onclick="loser()"  class="btn btn-info">Loser</button>
    </li>
    
    <li class="nav-item">
        <button type="button" onclick="winner()" class="btn btn-info">Winner</button>
    </li>
</ul>

    @yield('content')

<div><p id="tittle"></p></div>
<div class="col col-3"><p id="score"></p>
</div>
<div class="col col-6">
<button type="button" id="shakeButton" onClick="Shake()" type="hidden">Shake!!</button>


</div>
@include('scripts')
 
</body>
    
    