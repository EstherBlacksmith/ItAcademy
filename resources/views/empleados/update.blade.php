@extends('layouts.layout')

@section('title', 'Modificar empleado')
@section('title2', 'Modificar empleado')

@section('content')

<div class="container ">	

	<div class="row justify-content-md-center">
		<div class="col col-lg-6">
			<form method="POST" action="{{ route('updateEmpleado')}}">
			    @csrf
			    @method('put')
				<h3>Modificar empleado</h3>
			  	<div class="form-group">
				    <input type="text" class="form-control" name="nombre" id="nombre" aria-describedby="nombre" placeholder="Nombre" value="{{$empleado->nombre}}">
				    <input type="text" class="form-control" name="primerApellido" id="primerApellido" aria-describedby="Primer apellido" placeholder="Primer apellido" value="{{$empleado->primerApellido}}">
				    <input type="text" class="form-control" name="segundoApellido" id="segundoApellido" aria-describedby="Segundo apellido" placeholder="Segundo apellido" value="{{$empleado->segundoApellido}}">
				    <input  type ="hidden" name="id" id="id" value="{{$empleado->id}}">
				    <label for="Tarea">Tarea</label>	
			    	<div class="input-group">					   	
						<select id="id_tarea" name="id_tarea"  class="form-control">
					    	@foreach ($tareas as $tarea)
					    		@if ($tarea->id == $empleado->id_tarea)
					    			<option selected value="{{$tarea->id}}">{{$tarea->tarea}}</option>
					    		@else
					    			<option value="{{$tarea->id}}">{{$tarea->tarea}}</option>
					    		@endif
        					@endforeach        				
        	        	</select>
       			  	</div>
  			    </div>
		  
		 		<button type="submit" class="btn btn-primary">Modificar</button>
			</form>

			@if ($errors->any())
			    <div class="alert alert-danger">
			        <ul>
			            @foreach ($errors->all() as $error)
			                <li>{{ $error }}</li>
			            @endforeach
			        </ul>
			    </div>
			@endif
		</div>
	</div>
</div>
@endsection