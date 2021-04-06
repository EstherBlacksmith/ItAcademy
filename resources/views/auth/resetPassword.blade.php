@extends('layout')
@section('title','Recuperar contraseña')

@section('content')
@section('title2','Recuperar contraseña')

<form action="{{ route('loginReset')}}" method="POST">
   <h5>Se le enviará un link si el email que indique aparece en nuestras bases de datos</h5>
<br>
 
  <div class="mb-3">      
        @csrf 
    <label for="email" class="form-label">Correo electrónico con el que se registró</label>
    <input type="email" class="form-control" name="email" id="email">
  </div>

  <button type="submit" class="btn btn-primary">Enviar</button>
  
</form>

@endsection
