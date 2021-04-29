@extends('layout')


@section('title2','Edición de partidos')

@section('content')

<div style="color: silver;">
  <h2 class="col-auto p-5 text-center" >Edición de partidos <i class="fas fa-trophy"></i></h2>
  <h5 class="text-center m5">Aquí puedes editar los datos de los partidos</h5>

	<form method="post" action="{{route('partidosUpdateStore')}}">
		@csrf

		<div class="form-group input-group-lg">
		   <label for="ciudad">Equipo (Ciudad)</label>
		    <select class="form-select " id="ciudad" name="ciudad" >
				@foreach($equipos as $equipo)
				 	@if($partido->teams_id == $equipo->id)
				   		<option selected  value="{{$equipo->id}}">{{$equipo->city}}</option>
				   	@else
				   		<option value="{{$equipo->id}}">{{$equipo->city}}</option>
				    @endif
			 	@endforeach
			</select>
		</div>
		
		<div class="form-group">
		    <label for="local_gol">Gol local</label>
		    <input type="text" class="form-control" id="local_gol" name="local_gol" placeholder="Gol local" value="{{$partido->local_gol}}">
		</div>

		<div class="form-group">
		    <label for="visitor_gol">Gol visitante</label>
		    <input type="text" class="form-control" id="visitor_gol" name="visitor_gol" placeholder="Gol visitante" value="{{$partido->visitor_gol}}">
		</div>

	    <div class="form-group col-3">
	    	<input type="hidden" name="id" id="id" value="{{$partido->id}}">
	    	<label for="foundation_year">Fecha del partido</label>
	        <div class='input-group date' data-date-format="yyyy-mm-dd" id='fecha'>
	            <input type='text' class="form-control" id="date" name="date" value="{{$partido->date}}"/>
	            <span class="input-group-addon">
	                <span class="glyphicon glyphicon-calendar"></span>
	            </span>
	        </div>
	    </div>
	    <button type="submit" class="btn btn-primary">Guardar</button>
	</form>
	
</div>

@endsection