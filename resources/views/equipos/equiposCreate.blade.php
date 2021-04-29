@extends('layout')


@section('title2','Creación de equipos')

@section('content')

<div style="color: silver;">
  <h2 class="col-auto p-5 text-center" >Creación de equipos <i class="fas fa-trophy"></i></h2>
  <h5 class="text-center m5">Aquí puedes editar los datos de los equipos</h5>

	<form method="post" action="{{route('equiposCreateStore')}}">
		@csrf
		<div class="form-group">
		    <label for="ciudad">Ciudad</label>
		    <input type="text" class="form-control" id="ciudad"name="ciudad" aria-describedby="ciudad" placeholder="Ciudad" value="{{old('ciudad')}}">

		</div>

		<div class="form-group">
		    <label for="estadio">Estadio</label>
		    <input type="text" class="form-control" id="estadio" name="estadio" placeholder="Estadio" value="{{old('estadio')}}">
		</div>

	    <div class="form-group col-3">
	    	<label for="foundation_year">Fundación</label>
	        <div class='input-group date' data-date-format="yyyy-mm-dd" id='fecha'>
	            <input type='text' class="form-control" id="foundation_year" name="foundation_year" value="{{old('foundation_year')}}"/>
	            <span class="input-group-addon">
	                <span class="glyphicon glyphicon-calendar"></span>
	            </span>
	        </div>
	    </div>
	    <button type="submit" class="btn btn-primary">Crear</button>
	</form>
	
</div>

@endsection