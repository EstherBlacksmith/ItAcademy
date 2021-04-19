@extends('layouts.layout')

@section('title', 'Recuperar contraseña')

@section('content')
<div class="container">
    <div class="row">
        <div class="card">
            <img src="panda-logo.png" class="card-img-top" style=" width: 20%; height: auto;">
            <div class="card-header bg-dark text-white">
                <h3 class=" bg-dark text-white">Recuperar contraseña</h3>
            </div>  
            <div class="card-body ">               
                <div class="mb-4 text-sm text-gray-600">
                    ¿Has perdido la contraseña? No hay problema. Solo debes indicarnos el email con el que te registraste y nosotros nos encargamos de enviarte un enlace para que elijas una nueva
                </div>
                <form method="POST" action="{{ route('password-email') }}">
                    @csrf

                    <!-- Email Address -->
                    <input id="email" class="form-control"  type="email" name="email" :value="old('email')" autofocus placeholder="Email"/>

                    <button type="submit" class="btn btn-primary">Recuperar contraseña</button>
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



@endsection