@extends('layouts.layout')
@section('title', 'Inicio de sesión')

@section('content')

<div class="container">
    <div class="row">
        <div class="card">
         <img src="panda-logo.png" class="card-img-top" style=" width: 20%; height: auto;">
            <div class="card-header bg-dark text-white">
                <h3 class=" bg-dark text-white">Regístrate</h3>
            </div>  
            <div class="card-body ">               
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="form-group">
                             <!-- Name -->         
                            <input id="name" type="text" class="form-control" name="name" :value="old('name')"  autofocus placeholder="Nombre"/>
              
                            <!-- Email Address -->        
                            <input id="email" class="form-control"  type="email" name="email" :value="old('email')"  placeholder="Email"/>

                            <!-- Password -->
                            <input id="password" class="form-control" type="password" name="password"  autocomplete="new-password" placeholder="Contraseña"/>
             
                            <!-- Confirm Password -->   
                            <input id="password_confirmation" class="form-control"  type="password" name="password_confirmation"  placeholder="Confirmar contraseña"/>
                            
                            <button type="submit" class="btn btn-primary">Registarse</button>
                        </div>
                    </form>

                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
               
                 </div>      
            </div>
        </div>
    </div>
</div>


@endsection
