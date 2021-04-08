
@extends('layouts.layout')

@section('title', 'Tareas')
@section('title2', 'Tareas')

@section('content')


<div class="container ">
	<div class="row justify-content-md-center">
	    <div class="col col-lg-6">
			<h3>Tareas</h3>

			<dl>
			@foreach ($tareas as $tarea)
			  <dt class="list-group-item">{{$tarea->tarea}}</dt>
			  <dd >{{$tarea->descripcion}}</dd>
			@endforeach
			</dl>
		</div>
	</div>

	<div class="row justify-content-md-center">
		<div class="col col-lg-6">
			<form method="POST" action="{{ route('storeTarea')}}">
			    @csrf
				<h3>Nueva tarea</h3>
			  	<div class="form-group">
				    <input type="text" class="form-control" name="tarea" id="tarea" aria-describedby="tarea" placeholder="Nueva tarea">
				    <input type="text" class="form-control" name="descripcion" id="descripcion" aria-describedby="descricion" placeholder="Descripción">
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
@endsection