@extends('frontend.template.main')

@section ('titulo', 'Recuperar Contraseña Blog')
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
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif

                <div class="recuperar-pass">
                    <h5>Recuperar contraseña</h5>
                </div>
                <form role="form" method="POST" action="{{ route('password.email') }}">
                    {{ csrf_field() }}
                    <div class="error">
                        @if ($errors->has('email'))
                            <span>
                                {{ $errors->first('email') }}
                            </span>
                        @endif
                    </div>
                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <input id="email" class="input" value="{{ old('email') }}" type="email" name="email" value="{{ old('email') }}" placeholder="Correo electrónico" required>
                    </div>

                    {{-- @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif --}}
                    
                    <button type="submit" class="btn-login">
                        ENVIAR
                    </button>
                    
                </form>
                <div class="recuperar">
                    <a class="btn btn-link" href="{{ route('login') }}">
                        Volver
                    </a>
                </div>
        </div>
    </div>
    {{-- <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Reset Passwords</div>
                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form class="form-horizontal" role="form" method="POST" action="{{ route('password.email') }}">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Send Password Reset Link
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
@endsection
