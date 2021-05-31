@extends('layouts.head')

@include('layouts.body')
<div class="page-container">
<div class="page-container">

<!-- MAIN CONTENT-->

<div class="main-content">
	<div class="section__content section__content--p30">
		<div class="container-fluid">
			<h3>Crea las plantas y puertas que serán las habitaciones del hotel</h3>
			<div class="row">
				<div class="col-md-4">
					
					<form action="{{route('plantasCreate')}}" method="post">
						<div class="card-body card-block">

							@csrf
							<div class="form-group">
								<label for="planta" class="form-control-label">Planta</label>
								<input type="text" name="planta" placeholder="Introduzca una planta" class="form-control" value="{{ old('planta') }}">
							</div>

							@error('planta')
					        	<div class="alert alert-danger">{{  $message }}</div>
					        @enderror						


							@if(Session::has('existePlanta'))
								<div class="alert alert-danger">{{  Session::get('existePlanta') }}</div>				                   
							@enderror

						</div>

						<div class="card-footer"> 
							<button type="reset" class="btn btn-danger btn-lg">
								<i class="fas fa-redo"></i>
							</button>
							<button type="submit" class="btn btn-secondary btn-lg" style="background-color:green;" name="create">
								<i class="far fa-check-circle" style="color: white;"></i> 
							</button>

						</div>	
					</form>
					@if(session()->has('successPlanta'))
					    <div class="alert alert-success">
					        {{ session()->get('successPlanta') }}
					    </div>
					@endif
				</div>
				<div class="col-md-4">
					<form action="{{route('puertasCreate')}}" method="post">
						<div class="card-body card-block">

							@csrf
							<div class="form-group">
								<label for="puerta" class="form-control-label">Puerta</label>
								<input type="text" name="puerta" placeholder="Introduzca una puerta" class="form-control" value="{{ old('puerta') }}">
							</div>

							@error('puerta')
					        	<div class="alert alert-danger">{{  $message }}</div>
					        @enderror

							@if(Session::has('existePuerta'))
								<div class="alert alert-danger">{{  Session::get('existePuerta') }}</div>				                   
							@enderror

						</div>
						
						<div class="card-footer"> 
							<button type="reset" class="btn btn-danger btn-lg">
								<i class="fas fa-redo"></i>
							</button>
							<button type="submit" class="btn btn-secondary btn-lg" style="background-color:green;" name="create">
								<i class="far fa-check-circle" style="color: white;"></i> 
							</button>

						</div>								

					</form>
					@if(session()->has('successPuerta'))
					    <div class="alert alert-success">
					        {{ session()->get('successPuerta') }}
					    </div>
					@endif
				</div>
			</div>
		</div>
	</div>
</div>
</div>
@include('layouts.scripts')