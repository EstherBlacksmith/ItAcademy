@extends('layout')


@section('title2','Equipos')

@section('content')

<div style="color: silver;">
	<h2 class="col-auto p-5 text-center" >¡Bienvenid@! @if(Auth::user()) {{ Auth::user()->name }} @endif</h2>
	<h5 class="text-center m5">Esta la liga de futbol imaginaria de ItAcademy</h5>
	<div class="col-auto text-center" >
		<img style="height: 500px;" class="img-thumbnail" src="{{asset('CF_11900_cffddcc6e38145b8b67f99b8de7bc5f5_gatos_quieres_jugar_al_futbol_con_nosotros.jpg')}}">
	</div>
</div>
@endsection


