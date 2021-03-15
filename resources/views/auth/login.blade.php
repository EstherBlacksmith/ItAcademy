

@extends('layout')

@section('content')

<h1>Accede</h1>
<form method="post" action="{{action('App\Http\Controllers\LoginController@loginAuth')}}">
    
 {{ csrf_field() }}   
 
  <div class="form-group">
    <label for="inputUsuario">Usuario</label>
    <input type="text" class="form-control" id="usuario" placeholder="Usuario">
  </div>
    
  <div class="form-group">
    <label for="inputPassword1">Password</label>
    <input type="password" class="form-control" id="password" placeholder="Password">
  </div>   
    
   <button type="submit" class="btn btn-outline-info">Enviar</button>

</form>

@endsection
