@extends('frontend.template.main')

@section ('titulo', 'Login Bolg')
@section('contenido')
    @include('frontend.partes.menu-principal')
    <div class="fondo-login">
        <div class="login-caja">
            <div class="titulo">
                <span class="c-rojo">Blog</span> La Salle La Paz
            </div>
            <div class="linea-login">
                <div class="col-xs-5">
                    <div class="linea" style="margin-top:10px;"></div>
                </div>
                <div class="col-xs-2">
                    <center>O</center>
                </div>
                <div class="col-xs-5">
                    <div class="linea" style="margin-top:10px;"></div>
                </div>
            </div>
            <div class="form">
                <div class="recuperar-pass">
                    <h5>Login</h5>
                </div>
                <form role="form" method="POST" action="{{ route('login') }}">
                    {{ csrf_field() }}
                    <div class="error">
                        @if ($errors->has('email'))
                            <span>
                                {{ $errors->first('email') }}
                            </span>
                        @endif
                    </div>
                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <input id="email" class="input" type="email" name="email" value="{{ old('email') }}" placeholder="Correo electrónico" required>
                    </div>

                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <input id="password" type="password" class="input" name="password" placeholder="Contraseña" required>

                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <div class="checkbox checkbox checkbox-info">
                                <input type="checkbox" name="remember" id="checkbox8" {{ old('remember') ? 'checked' : '' }}> 
                                <label for="checkbox8" style="margin-bottom:5px;">
                                Recuérdame
                                </label>
                        </div>
                    </div>
                    <button type="submit" class="btn-login">
                        LOGIN
                    </button>
                    <div class="recuperar">
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                            ¿Olvidaste tu contraseña?
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
        {{-- <div class="panel panel-default">
            <div class="panel-heading">Login</div>
            <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Login
                                </button>

                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    Forgot Your Password?
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div> --}}
@endsection
