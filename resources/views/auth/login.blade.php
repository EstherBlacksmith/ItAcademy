 @extends('layouts.head')

    <div class="page-wrapper">
        <div class="page-content--bge5">
            <div class="container">
                <div class="login-wrap">
                    <div class="login-content">
                        <div class="login-logo">
                            <a href="#">
                                <img src="{{ asset('cool-admin-template/images/icon/logo.png')}}" alt="CoolAdmin">
                            </a>
                        </div>
                        <div class="login-form">
                            <form action="{{ route('login') }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label>Email</label>
                                    <input class="au-input au-input--full" type="email" name="email" :value="old('email')" placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <label>Contraseña</label>
                                    <input class="au-input au-input--full" type="password" name="password" placeholder="Contraseña">
                                </div>
                                <div class="login-checkbox">
                                    <label>
                                        <input type="checkbox" name="remember">Recuérdame
                                    </label>
                                     @if (Route::has('password.request'))
                                    <label>
                                        <a href="{{ route('password.request') }}">¿Contraseña olvidada?</a>
                                    </label>
                                       @endif
                                </div>
                                <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit">Inicia sesión</button>
                                <div class="social-login-content">
                                    <div class="social-button">
                                        <button class="au-btn au-btn--block au-btn--blue m-b-20">Inicia sesión con facebook</button>
                                        <button class="au-btn au-btn--block au-btn--blue2">Inicia sesión con twitter</button>
                                    </div>
                                </div>
                            </form>
                            <div class="register-link">
                                <p>¿Todavía no tienes una cuenta?
                                    <a href="{{route('register')}}">Regístrate aquí</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
     @include('layouts.scripts')