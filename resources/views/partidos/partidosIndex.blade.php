@extends('layout')


@section('title2','Partidos')

@section('content')

<div style="color: silver;">
  <h2 class="col-auto p-5 text-center" >Listado de partidos <i class="fas fa-trophy"></i></h2>
  <h5 class="text-center m5">Aquí puedes ver cada partido con los goles marcados</h5>


  <table class="table table-striped " style="background-color: white">
    <thead>
      <tr style="color: green;" >
        <th scope="col"><strong>Equipo (Ciudad)</strong></th>
        <th scope="col"><strong>Gol local</strong></th>
        <th scope="col"><strong>Gol visitante</strong></th>
        <th scope="col"><strong>Fecha</strong></th>
        <th scope="col" class="text-center"><strong>Editar</strong></th>
        <th scope="col" class="text-center"><strong>Eliminar</strong></th>
      </tr>
    </thead>
    <tbody class="">
      @foreach ($partidos as $partido)
        <tr class="">     

        	@foreach($partidosEquipos as $id => $match)
        		@if($id == $partido->id)
        			<th scope="row" class="text-uppercase"> {{$match}} </th>
        			@endif
        	@endforeach
          
          <td class="text-uppercase">{{$partido->local_gol}}</td>
          <td>{{$partido->visitor_gol}}</td>
          <td>{{$partido->date}}</td>
          <td class="text-center"><a href="{{route('partidosUpdate',$partido->id)}}"><i class="fas fa-pencil-alt" style="color: green; font-size: 1.5rem"></i></a></td>
          <td class="text-center"><a href="{{route('partidosDelete',$partido->id)}}"><i class="fas fa-trash-alt" style="color: tomato; font-size: 1.5rem"></i></a></td>
        </tr>
      @endforeach
    </tbody>
  </table>
</div>
@stop