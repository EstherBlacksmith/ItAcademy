
@extends('layouts.layout')

@section('title', 'Tareas')


@section('content')


<div class="container ">
	<div class="row ">
		<div class="col col-lg-6">	
			<div class="card">
				<div class="card-header bg-dark text-white">
					<h3 class=" bg-dark text-white">Tareas</h3>
				</div>	
				<div class="card-body ">
					<dl>
						@foreach ($tareas as $tarea)
						  <dt class="list-group-item">{{$tarea->tarea}}</dt>
						  <dd >{{$tarea->descripcion}}</dd>
						@endforeach
					</dl>
				</div>
			</div>
		</div>


	    <div class="col col-lg-6">
			<div class="card">
				<div class="card-header bg-dark text-white">
					<h3 class=" bg-dark text-white">Nueva tarea</h3>
				</div>
				<div class="card-body ">
					<form method="POST" action="{{ route('storeTarea')}}">
					    @csrf
						
						<div class="card-body ">
						  	<div class="form-group">
							    <input type="text" class="form-control" name="tarea" id="tarea" aria-describedby="tarea" placeholder="Nueva tarea">
							    <input type="text" class="form-control" name="descripcion" id="descripcion" aria-describedby="descricion" placeholder="Descripción">
					  		</div>			  
				 			<button type="submit" class="btn btn-primary">Crear</button>
				 		</div>
				 	</form>
				</div>
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

@endsection