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
										<label for="planta" class="form-control-label">Planta</label>
										<input type="text" id="planta" name="planta" placeholder="Introduzca una planta" class="form-control" value="{{ old('planta') }}">
									</div>
									@if ($errors->has('planta'))
				                    	<div class="alert alert-danger">{{ $errors->first('planta') }}</div>
				                    @endif
									<div class="form-group">
										<label for="puerta" class=" form-control-label">Puerta</label>
										<input type="text" id="puerta" name="puerta" placeholder="Introduzca una puerta" class="form-control" value="{{ old('puerta') }}">
									</div>
									@if ($errors->has('puerta'))
				                    	<div class="alert alert-danger">{{ $errors->first('puerta') }}</div>
				                    @endif
									<div class="form-group">
										<label for="precio" class=" form-control-label">Precio</label>
										<input type="text" id="precio" name="precio" placeholder="Introduzca un precio por noche" class="form-control" value="{{ old('precio') }}">
									</div>
									@if ($errors->has('precio'))
				                    	<div class="alert alert-danger">{{ $errors->first('precio') }}</div>
				                    @endif

				                  @if($errors->any())
				                    	<div class="alert alert-danger">{{ $errors->first('existe') }}</div>
				                    @endif

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

												<td><button type="button" class="btn mb-1"  data-backdrop="false" data-toggle="modal" data-target="#mediumModal-{{$habitacion->id}}">

													<a class="far fa-edit fa-2x" style="color: DodgerBlue"></a></button></td>
														<!-- MODAL-->

														<div class="modal" id="mediumModal-{{$habitacion->id}}" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true" >
															<div class="modal-dialog modal-md" role="document">
																<div class="modal-content">
																	<div class="modal-header">
																		<h5 class="modal-title" id="mediumModalLabel">Modificar precio habitación</h5>
																		<button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
																			<span aria-hidden="true">×</span>
																		</button>
																	</div>
																	<div class="modal-body">	                                            				

																		<div class="card-body card-block">	 
																		    <form action="{{route('habitacionesUpdate',$habitacion->id)}}" method="post"  name="update">
																			@csrf
																			@method('put')																		
																			<label for="plantaEdit" class="form-control-label">Planta</label>
																			<input type="text" id="plantaEdit" name="plantaEdit" placeholder="{{$habitacion->planta}}" class="form-control" value="{{ $habitacion->planta }}" disabled>
																		
																			<label for="puertaEdit" class="form-control-label">Puerta</label>
																			<input type="text" id="puertaEdit" name="puertaEdit" placeholder="{{$habitacion->puerta}}" class="form-control" value="{{$habitacion->puerta}}" disabled >
																			<div class="form-group">
																				<label for="precioEdit" class="form-control-label">Precio</label>
																				<input type="text" id="precioEdit" name="precioEdit" placeholder="{{$habitacion->precio}}"   class="form-control" value="{{$habitacion->precio}}">
																			</div>     
																			@if ($errors->has('precio'))
														                    	<div class="alert alert-danger">{{ $errors->first('precio') }}</div>
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
													</form>
													<!-- END MODAL--> 


													<td><button type="button" class="btn mb-1" ><a href="{{route('habitacionesDelete',$habitacion->id)}}" class="far fa-trash-alt fa-2x" style="color:tomato"></a></button></td>                                             
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


@include('layouts.scripts')