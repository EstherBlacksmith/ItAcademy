@extends('layout')
@section('title', 'Página no encontrada')

@section('content')


<div class="container">
	<div class="row">
		<div class="card">
		 <img src="panda-logo.png" class="card-img-top" style=" width: 20%;
		  height: auto;">
			<div class="card-header bg-dark text-white">
				<h3 class=" bg-dark text-white">¡Error 404!</h3>
			</div>	
			<div class="card-body ">
				<h5 class="card-title">¡Error 404!</h5>
		    	<p class="card-text"> No hemos encontrado la página que buscas</p>				
			</div>
		</div>		
	</div>
</div>
@endsection