<div class="menu-principal animated fadeInDown">
    <div class="row margin0 padding0">
        <div class="col-xs-12 padding0">
            @if(isset(Auth::user()->id))
                {{-- preguntamos si hay sesion --}}
                    @if((Auth::user()->nivel == "admin") != (Auth::user()->nivel == "profesor"))
                        <div class="usuario" style="background-image: url(img/admin/usuarios/thumb150/{{Auth::user()->foto}})">
                        </div>
                        <div class="menu-caja">
                            <div class="linea"></div>
                            <div class="linea"></div>
                            <div class="linea"></div>
                        </div>
                        <div class="opciones-menu-principal" style="display:none">
                            <ul>
                                <li>
                                    <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                        <div class="linea"></div>
                                        <img src="{{asset('img/candado-abierto.svg')}}" alt="Cerrar Sesión" width="12"> Cerrar Sesión
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                                <li>
                                    <a href="{{ route('admin.index') }}">
                                        <div class="linea animated fadeInUp"></div>
                                        <img src="{{asset('img/admin.svg')}}" alt="Cerrar Sesión" width="12"> Administración
                                    </a>
                                </li>
                            </ul>
                        </div>
                    
                    @else
                        <div class="usuario" style="background-image: url(img/admin/usuarios/thumb150/{{Auth::user()->foto}})">
                        </div>
                        <div class="menu-caja">
                            <div class="linea"></div>
                            <div class="linea"></div>
                            <div class="linea"></div>
                        </div>
                        <div class="opciones-menu-principal" style="display:none">
                            <ul>
                                <li>
                                    <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                        <div class="linea"></div>
                                        <img src="{{asset('img/candado-abierto.svg')}}" alt="Cerrar Sesión" width="12"> Cerrar Sesión
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                                <li>
                                    <a href="{{ route('admin.index') }}">
                                        <div class="linea animated fadeInUp"></div>
                                        <img src="{{asset('img/usuario.svg')}}" alt="Cerrar Sesión" width="12"> Perfil
                                    </a>
                                </li>
                            </ul>
                        </div>
                    @endif
                {{-- fin preguntamos si hay sesion --}}
            @else
                <div class="menu-caja">
                    <div class="linea"></div>
                    <div class="linea"></div>
                    <div class="linea"></div>
                </div>
                <div class="opciones-menu-principal" style="display:none">
                    <ul>
                        <li>
                            <a href="{{ route('login') }}">
                                <div class="linea animated fadeInUp"></div>
                                <img src="{{asset('img/candado-cerrado.svg')}}" alt="Iniciar Sesión" width="12"> Iniciar Sesióon
                            </a>
                        </li>
                    </ul>
                </div>
            @endif
            <div class="logo text-center">
                <a href="{{ route('frontend.index') }}">
                    <img src="{{asset('img/logo-lasalle.svg')}}" width="70px" alt="Logo La Salle La Paz" class="visibility fadeIn animated wow">
                </a>
            </div>
            <div class="titulo">
                Blog La Salle La Paz
            </div>
        </div>
    </div>
</div>
