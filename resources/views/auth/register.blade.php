@extends('layout')
@section('title','Registro')

@section('content')

@section('title2','Registro')

<form action="{{ route('loginRegister')}}" method="POST">
    
  <div class="mb-3">      
        @csrf 
    <label for="email" class="form-label">Correo electrónico</label>
    <input type="email" class="form-control" name="email" id="email">
  </div>
    
  <div class="mb-3">
    <label for="password" class="form-label">Contraseña</label>
    <input type="password" class="form-control" name="password" id="password">
  </div>
      
  <div class="mb-3">
    <label for="password2" class="form-label">Confirme la contraseña</label>
    <input type="password" class="form-control" name="password2" id="password">
  </div>
    
  <button type="submit" class="btn btn-primary">Enviar</button>
  
</form>

@endsection
