@extends('layouts.layout')

@section('title', 'Mostrar empleados')

@section('content')
<div class="container ">
	<div class="row ">
		<div class="col col-lg-2">	
			<div class="card">
				<div class="card-header bg-dark text-white">
					<h4 class=" bg-dark text-white">Filtrar por tarea</h4>
				</div>	
				<div class="card-body ">
					<div class="input-group">		
						@foreach ($tareas as $tarea)
							 @if ($loop->first)
								<form method="GET" action="{{route('show')}}">
								@csrf			   	
								<select id="id_tarea" name="id_tarea"  class="form-control">
								<option value="">Todas</option>
							@endif		    		
						    		<option value="{{$tarea->id}}">{{$tarea->tarea}}</option>				    			
						    @if ($loop->last)
				    			</select>
				    	  		   				
				   				<button type="submit" class="btn btn-warning" aria-current="true">Filtrar</button>
				   			</form>
				   			@endif	
						@endforeach  
					</div>
				</div>
			</div>
		</div>

		<div class="col col-lg-6">		
						
				<div class="card">
					<div class="card-header bg-dark text-white">
						<h3>Empleados</h3>
					</div>
					
					<div class="card-body ">
						<div class="row justify-content-md-center overflow-auto" style="max-width: 100%; max-height: 700px;">
							<ul class="list-group list-group-flush ">   	 	     

								@foreach($empleados as $empleado)
									<li class="list-group-item">							
										<div class="d-flex w-200 justify-content-between">	 		
											<h5 class="mb-1">{{$empleado->nombre}} {{$empleado->primerApellido}} {{$empleado->segundoApellido}}</h5>
										</div>
										@foreach($tareas as $tarea)
											@if($tarea->id == $empleado->id_tarea)
												<h6> {{$tarea->tarea}} </h6>
												<p> {{$tarea->descripcion }}  </p>
											@endif
										@endforeach
										<div class="row">											
											<div class="col-lg-2"> 
												<button type="button" class="btn btn-info" aria-current="true">
													<a href="{{route('updateView',$empleado->id)}}">
			  											<i class="icon-pencil icon-large"></i> 
			  										</a>	
		  										</button>
		  									</div>
											
			  								<div class="col-lg-2"> 
												<form method="POST" action="{{route('deleteEmpleado')}}">
													@csrf
													@method('delete')	
													<input type="hidden" name="id" id="id" value="{{$empleado->id}}">
													<button type="submit" class="btn btn-danger" aria-current="true">
				  										<i class="icon-trash icon-large"></i> 
													</button>    		
												</form>	
											</div>
										</div>									
									</li>	
								@endforeach	
								
							</ul>
						</div>
					</div>
				</div>


			</div>
		</div>
</div>


@endsection