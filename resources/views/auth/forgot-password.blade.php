
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
                        <div class="mb-4 text-sm text-gray-600">
                            <p>¿Has olvidado la contraseña? No pasa nada. Déjano la dirección de email con la que te registraste, y nosotros te enviaremos un link para que elijas una nueva contraseña</p>
                        </div>
<x-auth-session-status class="mb-4" :status="session('status')" />

<!-- Validation Errors -->
<x-auth-validation-errors class="mb-4" :errors="$errors" />
                        <div class="login-form">
                            <form action="{{ route('password.email') }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label>Email</label>
                                    <input class="au-input au-input--full" type="email" :value="old('email')" name="email" placeholder="Email">
                                </div>
                                <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit">Enviar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
   @include('layouts.scripts')