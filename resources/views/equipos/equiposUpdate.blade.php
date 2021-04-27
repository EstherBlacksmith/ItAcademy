@extends('layout')


@section('title2','Edición de equipos')

@section('content')
<script>
    $( document ).ready(function() {

        $('#fecha').datepicker();
    });
</script>

<div style="color: silver;">
  <h2 class="col-auto p-5 text-center" >Edición de equipos <i class="fas fa-trophy"></i></h2>
  <h5 class="text-center m5">Aquí puedes editar los datos de los equipos</h5>

	<form method="post" action="{{route('equiposUpdateStore')}}">
		@csrf
		<div class="form-group">
		    <label for="ciudad">Ciudad</label>
		    <input type="text" class="form-control" id="ciudad"name="ciudad" aria-describedby="ciudad" placeholder="Ciudad" value="{{$equipo->city}}">
		</div>

		<div class="form-group">
		    <label for="estadio">Estadio</label>
		    <input type="text" class="form-control" id="estadio" name="estadio" placeholder="Estadio" value="{{$equipo->stadium}}">
		</div>

	    <div class="form-group col-3">
	    	<input type="hidden" name="id" id="id" value="{{$equipo->id}}">
	    	<label for="foundation_year">Fundación</label>
	        <div class='input-group date' data-date-format="yyyy-mm-dd" id='fecha'>
	            <input type='text' class="form-control" id="foundation_year" name="foundation_year" value="{{$equipo->foundation_year}}"/>
	            <span class="input-group-addon">
	                <span class="glyphicon glyphicon-calendar"></span>
	            </span>
	        </div>
	    </div>
	    <button type="submit" class="btn btn-primary">Guardar</button>
	</form>
	
</div>

@stop