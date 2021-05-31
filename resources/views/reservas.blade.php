
@extends('layouts.head')
@include('layouts.body')


 <!-- PAGE CONTAINER-->
<div class="page-container">
    <!-- MAIN CONTENT-->
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col col-6">
                        <div class="au-card">   
                                <table class="table table-borderless table-data3">
                                    <thead>
                                        <tr>
                                            <th>Planta</th>
                                            <th>Puerta</th>
                                            <th>Precio</th> 
                                            <th>Fecha</th>    
                                            <th>Reservar</th>                                                
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($habitaciones as $habitacion)                                         
                                            <tr>
                          
                                                <td>{{$habitacion->planta}}</td>                                             
                                                <td>{{$habitacion->puerta}}</td>
                                                <td>{{$habitacion->precio}}</td> 
                                                <td><form action="{{ route('reservaStore')}}" method="POST"> @csrf
                                                    <input type="hidden"  value="{{$habitacion->id}}" name="habitacion_id">
                                                    <input type="date" id="fecha" name="fecha"></td>
                                                <td><input type="submit" class="btn btn-primary" > </form></td>
                                            </tr> 

                                        @endforeach       
                                        @if(session()->has('success'))
                                            <div class="alert alert-success">
                                                {{ session()->get('success') }}
                                            </div>
                                        @endif   
                                         @if(session()->has('errors'))
                                            <div class="alert alert-danger">
                                                {{ session()->get('errors') }}
                                            </div>
                                        @endif                       
                                    </tbody>
                                </table>  

                        </div>
                    </div><!-- .col -->

                    <div class="col col-6">
                        <div class="au-card">   
                                <table class="table table-borderless table-data3">
                                    <thead>
                                        <tr>
                                            <th>Fecha</th>  
                                            <th>Planta</th>
                                            <th>Puerta</th>
                                            
                                            <th>Eliminar</th>                                                
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($reservas as $reserva)                                         
                                            <tr>
                                                <td>{{$reserva->fecha}}</td>

                                                 <td>{{ $habitacion->where('id', $reserva->habitacion_id)->first()->planta }}</td>
                                                 <td>{{ $habitacion->where('id', $reserva->habitacion_id)->first()->puerta }}</td>
                                          
                                                <td><form action="{{ route('reservaDelete')}}" method="POST"> @csrf
                                                    <input type="hidden" value="{{$reserva->id}}" id="reserva_id" name="reserva_id">
                                                <button type="submit"><i class="fas fa-calendar-times" style="color:tomato;"></i></button></form></td>
                                            </tr> 

                                        @endforeach       
                                        @if(session()->has('successDelete'))
                                            <div class="alert alert-success">
                                                {{ session()->get('successDelete') }}
                                            </div>
                                        @endif   
                                         @if(session()->has('errorsDelete'))
                                            <div class="alert alert-danger">
                                                {{ session()->get('successDelete') }}
                                            </div>
                                        @endif                       
                                    </tbody>
                                </table>  

                        </div>
                    </div><!-- .col -->
                </div>               
            </div>
        </div>
    </div>
</div>
 
  


@include('layouts.scripts')
