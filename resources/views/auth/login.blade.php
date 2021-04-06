@extends('layout')
@section('title','Login')

@section('content')

@section('title2','Login')

<form  method="POST" action="{{ route('login')}}">
    
  <div class="mb-3">      
        @csrf 
    <label for="email" class="form-label">Correo electrónico</label>
    <input type="email" class="form-control" name="email" id="email">
  </div>
    
  <div class="mb-3">
    <label for="password" class="form-label">Contraseña</label>
    <input type="password" class="form-control" name="password" id="password">
  </div>
  <button type="submit" class="btn btn-primary">Enviar</button>
  
</form>

@endsection