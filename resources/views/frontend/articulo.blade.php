@extends('frontend.template.main')

@section ('titulo', 'Articulo')
@section ('contenido')
    
    <div class="menu visibility fadeInDown wow animated" data-wow-delay=".2s">
        <div class="row">
            <div class="col-xs-6 logo">
                <img src="{{ asset('img/logo-lasalle.svg') }}" width="75" alt="Logo La Salle La Paz">
            </div>
            <div class="col-xs-6">
                <div class="btn-menu text-right  pull-right">
                    <img src="{{ asset('img/menu.svg') }}" width="25" alt="">
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-9 articulo">
                @foreach($articulos as $articulo)
                @endforeach
                @foreach($categorias->where('id', $articulo->categoria_id) as $categoria)
                @endforeach
                @foreach($users->where('id', $articulo->user_id) as $user)
                @endforeach
                <h1>{{$articulo->articulo}}</h1>
                {{-- Fecha --}}
                <div class="row">
                    <div class="col-xs-8">
                        <p class="autor"><img src="{{asset('img/reloj.svg')}}" width="10" alt="publicado"> {{ucfirst($articulo->created_at->diffForHumans())}} | Por:
                            <span class="c-azul">
                                <?php
                                    $nombre = $user->name; 
                                    $nombre = explode(" ",$nombre);
                                    $apellido = $user->apellido; 
                                    $apellido = explode(" ",$apellido);
                                    echo ucwords($nombre[0] . "  " . $apellido[0]); // esto muestra la primera palabra 
                                ?>
                               
                            </span>
                            | Categoria: <span class="c-azul"> {{ucwords($categoria->categoria) }}</span>
                        </p> 
                    </div>
                    <div class="col-xs-4 text-right">
                        <p class="autor"> <img src="{{asset('img/compartir.svg')}}" width="18" alt="Compartir" title="Compartir"></p>
                        
                    </div>
                </div>
                <hr>
                <div class="contenido">
                    <?php   
                        echo $articulo->contenido;
                    ?>
                </div>
                <hr>
                
                        @include('flash::message')
                        @if(count($errors)>0)
                            <div class="alert alert-danger" role="alert">
                                <ul>
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        @yield('contenido')
                    
                <div class="comentearios">
                    {!! Form::open(['route' => 'comentarios.store', 'method'=>'POST', 'files' => true]) !!}
                        <div class="form-group">
                            {!! Form::label('comentario', 'Comentario'); !!}
                            {!! Form::textarea('comentario', null, ['class'=>'form-control editor', 'placeholder' => 'comentario', 'rows'=>5]); !!}
                            
                            <input type="hidden" name="a" value="{{$articulo->id}}" id="a">
                            <input type="hidden" name="u" value="{{Auth::user()->id}}" id="u">
                            <input type="hidden" name="c" value="{{$categoria->id}}" id="c">
                        </div>

                        <div class="form-group">
                            {!! Form::submit('Crear producto',['class'=>'btn btn-primary']); !!}
                        </div>
                    {!! Form::close() !!}
                </div>
                @foreach($comentarios as $comentario)
                    @foreach($usuarios as $usuario)
                    @endforeach
                    <p>{{$comentario->comentario}}</p>
                    <p>escrito por: {{$usuario->name}} - {{$usuario->nivel}}</p>
                @endforeach

            </div>

            {{-- menu derecho --}}
            @include('frontend.partes.menu-derecho')
            
        </div>
    </div>
@endsection