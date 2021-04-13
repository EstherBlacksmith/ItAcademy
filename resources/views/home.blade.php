@extends('layouts.layout')
@section('title', 'Inicio')


@section('content')

<div class="container">
	<div class="row">
		<div class="card">
		 <img src="panda-logo.png" class="card-img-top" style=" width: 20%;
		  height: auto;">
			<div class="card-header bg-dark text-white">
				<h3 class=" bg-dark text-white">Inicio</h3>
			</div>	
			<div class="card-body ">
				<h5 class="card-title">¡Bienvenidos!</h5>
		    	<p class="card-text"> En esta web podéis crear, modificar, eliminar y consultar los empleados.</p>
			    <a href="{{ route('show')}}" class="btn btn-primary">Mostrar empleados</a>			
			</div>
		</div>		
	</div>
</div>
@endsection


