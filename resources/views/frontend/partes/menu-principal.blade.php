<div class="menu visibility fadeInDown animated wow">
        <div class="row">
            <div class="col-xs-6 logo">
                <a href="{{ route('frontend.index') }}">
                    <img src="{{ asset('img/logo-lasalle.svg') }}" width="75" alt="Logo La Salle La Paz">
                </a>
            </div>
            <div class="col-xs-6 text-right">
                <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        {{-- Si esta logueado --}}
                        @if(isset(Auth::user()->id))
                        <img src="{{ asset('img/admin/usuarios')}}/{{Auth::user()->foto}}" width="28" alt="{{ ucfirst(Auth::user()->name) }}" class="img-menu">
                        {{-- ucfirst(Auth::user()->name) --}}
                        @endif
                        <img src="{{ asset('img/menu-puntos.svg') }}" width="20" alt="menu">
                        {{-- <span class="caret"></span> --}}
                    </a>
                    <ul class="dropdown-menu" role="menu">
                        <li>
                            @if(isset(Auth::user()->id))
                                <a href="{{ route('admin.index') }}">
                                        <p class="boton-menu"><i class="glyphicon glyphicon-cog c-azul margin-right1em"></i> Configurar </p>
                                    </a>
                                <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                     <p class="boton-menu"><i class="glyphicon glyphicon-log-in c-azul margin-right1em"></i> Cerrar Sesion </p>
                                </a>
                            @else
                                <div data-toggle="modal" data-target="#myModal" class="cursor">
                                    <p class="boton-menu"><i class="glyphicon glyphicon-log-in c-azul margin-right1em"></i> Iniciar Sesión </p>
                                </div>
                            @endif
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
            </div>
        </div>
    </div>