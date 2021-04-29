@extends('layout')


@section('title2','Creación de partidos')

@section('content')

<div style="color: silver;">
  <h2 class="col-auto p-5 text-center" >Creación de equipos <i class="fas fa-trophy"></i></h2>
  <h5 class="text-center m5">Aquí puedes crear los datos de los partidos</h5>

	<form method="post" action="{{route('partidosCreateStore')}}">
		@csrf
		<div class="form-group input-group-lg">
		   <label for="ciudad">Equipo (Ciudad)</label>
		    <select class="form-select " id="ciudad" name="ciudad" >
				@foreach($equipos as $equipo)  	
				   	<option value="{{$equipo->id}}">{{$equipo->city}}</option>				    
			 	@endforeach
			</select>
		</div>
		
		<div class="form-group">
		    <label for="local_gol">Gol local</label>
		    <input type="text" class="form-control" id="local_gol" name="local_gol" placeholder="Gol local" value="{{old('local_gol')}}">
		</div>

		<div class="form-group">
		    <label for="visitor_gol">Gol visitante</label>
		    <input type="text" class="form-control" id="visitor_gol" name="visitor_gol" placeholder="Gol visitante" value="{{old('visitor_gol')}}">
		</div>

	    <div class="form-group col-3">
	    	<label for="foundation_year">Fecha del partido</label>
	        <div class='input-group date' data-date-format="yyyy-mm-dd" id='fecha'>
	            <input type='text' class="form-control" id="date" name="date" value="{{old('date')}}"/>
	            <span class="input-group-addon">
	                <span class="glyphicon glyphicon-calendar"></span>
	            </span>
	        </div>
	    </div>
	    <button type="submit" class="btn btn-primary">Guardar</button>
	</form>
	
	
</div>

@endsection