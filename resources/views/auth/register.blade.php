 @extends('layouts.head')

 <div class="page-wrapper">
        <div class="page-content--bge5">
            <div class="container">
                <div class="login-wrap">
                    <div class="login-content">
                        <div class="login-logo">
                            <a href="#">
                                <img src="{{asset('cool-admin-template/images/icon/logo.png')}}" alt="CoolAdmin">
                            </a>
                        </div>
                        <div class="login-form">
                            <form action="{{ route('register') }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label>Nombre de usuario</label>
                                    <input class="au-input au-input--full" type="text" name="username" :value="old('name')" placeholder="Nombre de usuario">
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input class="au-input au-input--full" type="email" name="email" :value="old('email')" placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <label>Contraseña</label>
                                    <input class="au-input au-input--full" type="password" name="password" placeholder="Contraseña">
                                </div>
                                <div class="form-group">
                                    <label>Confirmar contraseña</label>
                                    <input class="au-input au-input--full" type="password" name="password_confirmation" placeholder="Contraseña">
                                </div>
                                <div class="login-checkbox">
                                    <label>
                                        <input type="checkbox" name="aggree">He leido y estoy de acuerdo con la política de términos y condiciones
                                    </label>
                                </div>
                                <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit">Regístrate</button>
                                <div class="social-login-content">
                                    <div class="social-button">
                                        <button class="au-btn au-btn--block au-btn--blue m-b-20">Regístrate con facebook</button>
                                        <button class="au-btn au-btn--block au-btn--blue2">Regístrate con twitter</button>
                                    </div>
                                </div>
                            </form>
                            <div class="register-link">
                                <p>
                                    ¿Ya tienes una cuenta?
                                    <a href="{{route('login')}}">Inicia sesión aquí</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
 @include('layouts.scripts')