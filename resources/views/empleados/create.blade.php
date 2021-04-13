
@extends('layouts.layout')

@section('title', 'Crear empleado')

@section('content')


<div class="container">
	<div class="row">
	 	 <div class="col-sm-6">
			<div class="card">	
				<div class="card-header bg-dark text-white">
					<h3 class=" bg-dark text-white">Nuevo empleado</h3>
				</div>	
				<div class="card-body ">
			
				<form method="POST" action="{{ route('storeEmpleado')}}">
				    @csrf
					
				  	<div class="form-group">
					    <input type="text" class="form-control" name="nombre" id="nombre" aria-describedby="nombre" placeholder="Nombre">
					    <input type="text" class="form-control" name="primerApellido" id="primerApellido" aria-describedby="Primer apellido" placeholder="Primer apellido">
					    <input type="text" class="form-control" name="segundoApellido" id="segundoApellido" aria-describedby="Segundo apellido" placeholder="Segundo apellido">
					     
					    <label for="Tarea">Tarea</label>	
				    	<div class="input-group">					   	
							<select id="id_tarea" name="id_tarea"  class="form-control">
						    	@foreach ($tareas as $tarea)
						    		<option value="{{$tarea->id}}">{{$tarea->tarea}}</option>
	        					@endforeach        				
	        	        	</select>
	       			  	</div>
	  			    </div>
			  
			 		<button type="submit" class="btn btn-primary">Crear</button>
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
	</div>
</div>

@endsection