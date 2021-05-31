@extends('layouts.head')
@include('layouts.body')
<!-- PAGE CONTAINER-->
<div class="page-container">
	<!-- MAIN CONTENT-->
	<div class="main-content">
		<div class="section__content section__content--p30">

			<div class="container-fluid">

				<div class="row">

					<div class="col-md-4">
						<div class="card">
							<div class="card-header">
								<strong>Habitaciones</strong> 
							</div>
							<form action="{{route('habitacionesCreateStore')}}" method="post">
								<div class="card-body card-block">

									@csrf
									<div class="form-group">
										<label for="planta_id" class="form-control-label">Planta</label>
										<select name="planta_id" placeholder="Introduzca una planta" class="form-control" value="{{ old('planta_id') }}">
										@foreach($plantas as $planta)
											@if( old('planta_id') == $planta->id)
											<option selected>{{$planta->planta}}</option>	
											@else							
												<option>{{$planta->planta}}</option>								
											@endif
										@endforeach
										</select>
									</div>

									@error('planta')
				                    	<div class="alert alert-danger">{{  $message }}</div>
				                    @enderror

									<div class="form-group">
										<label for="puerta_id" class=" form-control-label">Puerta</label>
										<select name="puerta_id" placeholder="Introduzca una puerta" class="form-control" value="{{ old('puerta_id') }}">

										@foreach($puertas as $puerta)
											@if( old('puerta_id') == $puerta->id)
												<option selected>{{$puerta->puerta}}</option>	
											@else							
												<option>{{$puerta->puerta}}</option>								
											@endif
										@endforeach
										</select>
									</div>

									@error('puerta')
				                    	<div class="alert alert-danger">{{  $message }}</div>
				                    @enderror

									<div class="form-group">
										<label for="precio" class=" form-control-label">Precio</label>
										<input type="text" id="precio" name="precio" placeholder="Introduzca un precio por noche" class="form-control" value="{{ old('precio') }}">
									</div>
									@error('precio')
				                    	<div class="alert alert-danger">{{ $message }}</div>
				                    @enderror


									@if(Session::has('existe'))
										<div class="alert alert-danger">{{  Session::get('existe') }}</div>				                   
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

							
						</div>
					</div>

					<div class="col-md-6">
						<div class="card">
							<div class="card-header">
								<strong>Habitaciones existentes</strong> 
							</div>
							<div class="card-body card-block">
								<div class="table-responsive m-b-40">
									<table class="table table-borderless table-data3">
										<thead>
											<tr>
												<th>Planta</th>
												<th>Puerta</th>
												<th>Precio</th> 
												<th>Modificar</th>   
												<th>Eliminar</th>               
											</tr>
										</thead>
										<tbody>
											@foreach ($habitaciones as $habitacion)		
												<tr>															
											
															<td>{{$habitacion->planta}}</td>

												
															<td>{{$habitacion->puerta}}</td>
												
								
													<td>{{$habitacion->precio}}</td> 

													<td>													
														<button type="button" class="btn " data-toggle="modal" data-target="#updateModal-{{$habitacion->id}}">

														<a class="far fa-edit fa-2x" style="color: DodgerBlue"></a></button>
													</td>

													<td>
														<button type="button" class="btn" data-toggle="modal" data-target="#deleteModal-{{$habitacion->id}}"><a  class="far fa-trash-alt fa-2x" style="color:tomato"></a></button>
													</td>
												</tr> 

											@endforeach                              
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>	
	</div>	
</div>

@foreach ($habitaciones as $habitacion)

<!-- MODAL MODIFICAR-->
	<div  class="modal fade" id="updateModal-{{$habitacion->id}}" tabindex="2" role="dialog" aria-labelledby="updateModalLabel" aria-hidden="true" >
		<div class="modal-dialog modal-md" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Modificar precio habitación</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
						<span aria-hidden="true">×</span>
					</button>
				</div>
				<div class="modal-body">	                                            				
					    <form action="{{route('habitacionesUpdate',$habitacion->id)}}" method="post"  name="update">

					<div class="card-body card-block">	 
							@csrf
							@method('put')																		
							<label for="plantaEdit" class="form-control-label">Planta</label>
							@foreach($plantas as $planta)
								@if($planta->id = $habitacion->planta_id)
									@if($loop->first)
									<input type="text" name="plantaEdit" placeholder="{{$habitacion->planta}}" class="form-control" value="{{ $habitacion->planta_id }}" readonly>
									@endif
								@endif
							@endforeach
						
							<label for="puertaEdit" class="form-control-label">Puerta</label>
							@foreach($puertas as $puerta)
								@if($puerta->id = $habitacion->puerta_id)
									@if($loop->first)
									<input type="text" name="puertaEdit" placeholder="{{$habitacion->puerta}}" class="form-control" value="{{$habitacion->puerta_id}}" readonly >
									@endif
								@endif
							@endforeach
							<div class="form-group">
								<label for="precioEdit" class="form-control-label">Precio</label>
								<input type="text" name="precioEdit" placeholder="{{$habitacion->precio}}"   class="form-control" value="{{$habitacion->precio}}">
							</div>     
							@if ($errors->has('precio'))
		                    	<div class="alert alert-danger">{{ $errors->first('precio') }}</div>
		                    @endif
		                    @if ($errors->has('reservas'))
							    <div class="alert alert-danger">{{ $errors->first('reservas') }}</div>
							@endif	
						
						
					</div>
					<div class="modal-footer">
						<button type="reset" class="btn btn-danger btn-lg">
							<i class="fas fa-redo"></i>
						</button>
						<button type="submit" class="btn btn-secondary btn-lg" style="background-color:green;">
							<i class="far fa-check-circle" style="color: white;"  ></i> 
						</button>
						<button type="button" class="btn btn-secondary btn-md" data-dismiss="modal">Cancel</button>
					</div>		
					</form>						
				</div>
			</div>
		</div>
	</div>

<!-- END MODAL--> 
	<!-- MODAL MODIFICAR-->
	<div  class="modal fade" id="deleteModal-{{$habitacion->id}}" tabindex="2" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true" >
		<div class="modal-dialog modal-md" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Eliminar habitación</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
						<span aria-hidden="true">×</span>
					</button>
				</div>
				<div class="modal-body">	                                            				

					<div class="card-body card-block">	 
						<p>Se va a eliminar la habitacíón, ¿desea continuar?</p>
					    <form action="{{route('habitacionesDelete',$habitacion->id)}}" method="post"  name="delete">
							@csrf
							@method('post')																		
							<label for="plantaDelete" class="form-control-label">Planta</label>
							<input type="hidden" name="id" placeholder="{{$habitacion->id}}" class="form-control" value="{{ $habitacion->id }}" >	     
								                
					</div>	
						<div class="modal-footer">						
							<button type="submit" class="btn btn-secondary btn-lg" style="background-color:green;">
								<i class="far fa-check-circle" style="color: white;"  ></i> 
							</button>
							<button type="button" class="btn btn-secondary btn-md" data-dismiss="modal">Cancel</button>
						</div>		
					</form>				
				</div>
			</div>
		</div>
	</div>

<!-- END MODAL--> 
	
@endforeach

@include('layouts.scripts')