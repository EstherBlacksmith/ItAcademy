@extends('layout')


@section('title2','Equipos')

@section('content')
<div style="color: silver;">
  <h2 class="col-auto p-5 text-center" >Listado de equipos <i class="fas fa-trophy"></i></h2>
  <h5 class="text-center m5">Aquí puedes ver cada equipo con su ciudad, el nombre del estadio y cuándo fué fundado</h5>


  <table class="table table-striped " style="background-color: white">
    <thead>
      <tr style="color: green;" >
        <th scope="col"><strong>Equipo</strong></th>
        <th scope="col"><strong>Campo</strong></th>
        <th scope="col" class="col-xs-2"><strong>Fundación</strong></th>
        <th scope="col" class="text-center"><strong>Editar</strong></th>
        <th scope="col" class="text-center"><strong>Eliminar</strong></th>
      </tr>
    </thead>
    <tbody class="">
      @foreach ($equipos as $equipo)
        <tr class="">
        
          <th scope="row" class="text-uppercase">{{$equipo->city}}</th>
          <td class="text-uppercase">{{$equipo->stadium}}</td>
          <td>{{$equipo->foundation_year}}</td>
          <td class="text-center"><a href="{{route('equiposUpdate',$equipo->id)}}"><i class="fas fa-pencil-alt" style="color: green; font-size: 1.5rem"></i></a></td>
          <td class="text-center"><a href="{{route('equiposDelete',$equipo->id)}}"><i class="fas fa-trash-alt" style="color: tomato; font-size: 1.5rem"></i></a></td>
        </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection