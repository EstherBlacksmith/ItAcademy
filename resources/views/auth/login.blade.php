@extends('layouts.layout')
@section('title', 'Inicio de sesión')

@section('content')


<div class="container">
    <div class="row">
        <div class="card">
         <img src="panda-logo.png" class="card-img-top" style=" width: 20%; height: auto;">
            <div class="card-header bg-dark text-white">
                <h3 class=" bg-dark text-white">Inicia sesión</h3>
            </div>  
            <div class="card-body ">

                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="form-group">

                        <!-- Email Address -->        
                        <input id="email" class="form-control"  type="email" name="email"  placeholder="Email"/>

                        <!-- Password -->
                        <input id="password" class="form-control" type="password" name="password"   placeholder="Contraseña"/>            
                    

                        <!-- Remember Me -->
                        <div class="block mt-4">
                            <label for="remember_me" class="inline-flex items-center">
                                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                                <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                            </label>
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            @if (Route::has('password.request'))
                                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                                    {{ __('Forgot your password?') }}
                                </a>
                            @endif

                            <button type="submit" class="btn btn-primary">Inicia sesión</button>
                        </div>
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



@endsection