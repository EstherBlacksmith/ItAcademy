@extends('layout')
@section('title','Editar libro')
@section('title2','Editar libro')
@section('content')

<form  method="POST" action="{{ route('updateOK') }}">
      @csrf
  <div class="mb-3">            
    <label for="titulo" class="form-label">Título del libro</label>
    <input type="text" class="form-control" name="titulo" id="titulo"  value="{{ old('titulo') }}">
  </div>
     
  <div class="mb-3">               
    <label for="tituloNew" class="form-label">Nuevo título del libro</label>
    <input type="text" class="form-control" name="tituloNew" id="tituloNew">
  </div>
        
   <div class="mb-3">
    <label for="autor" class="form-label">Autor</label>
    <input type="text" class="form-control" name="autor" id="autor"  value="{{ old('autor') }}">
  </div>            
    
   <div class="mb-3">
    <label for="autorNew" class="form-label">Nuevo autor</label>
    <input type="text" class="form-control" name="autorNew" id="autorNew">
  </div>    
        
  <div class="mb-3">
    <label for="anyo" class="form-label">Año de edición</label>
    <input type="text" class="form-control" name="anyo" id="anyo"  value="{{ old('anyo') }}">
  </div> 

  <div class="mb-3">
    <label for="anyoNew" class="form-label">Nuevo año de edición</label>
    <input type="text" class="form-control" name="anyoNew" id="anyoNew">
  </div> 
        
  <div class="mb-3">
    <label for="contenido" class="form-label">Contenido del libro</label>
    <input type="text" class="form-control" name="contenido" id="contenido" value="{{ old('contenido') }}">
  </div>
    
  <div class="mb-3">
    <label for="contenidoNew" class="form-label">Nuevo contenido del libro</label>
    <input type="text" class="form-control" name="contenidoNew" id="contenidoNew">
  </div>
    
  <button type="submit" class="btn btn-primary">Enviar</button>
  
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
  
</form>


@endsection