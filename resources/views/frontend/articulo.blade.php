@extends('frontend.template.main')

@section ('titulo', 'Articulo')
@section ('contenido')

    @include('frontend.partes.menu-principal')

    @foreach($articulos as $articulo)
    @endforeach
    @foreach($categorias->where('id', $articulo->categoria_id) as $categoria)
    @endforeach
    @foreach($users->where('id', $articulo->user_id) as $user)
    @endforeach
    <div class="container margin-top5em">
        <div class="row">
            <div class="col-xs-12">
                <ol class="breadcrumb">
                    <li><a href="{{route('frontend.articulos')}}">Articulos</a></li>
                    <li class="active">{{$articulo->articulo}}</li>
                </ol>
            </div>
            <div class="col-xs-12 col-sm-9 articulo">
                
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
                    
                <div class="comentarios">
                    <center><h3>Añadir Comentario</h3></center>
                    
                    @if(isset(Auth::user()->id))
                        {!! Form::open(['route' => 'comentarios.store', 'method'=>'POST', 'files' => true]) !!}
                            <div class="form-group">
                                {!! Form::textarea('comentario', null, ['class'=>'form-control editor', 'placeholder' => 'Escribe aquí', 'rows'=>5]); !!}
                                <input type="hidden" name="a" value="{{$articulo->id}}" id="a">
                                <input type="hidden" name="u" value="{{Auth::user()->id}}" id="u">
                                <input type="hidden" name="c" value="{{$categoria->id}}" id="c">
                            </div>

                            <div class="form-group">
                                {!! Form::submit('Añadir Comentario',['class'=>'btn btn-primary']); !!}
                            </div>
                        {!! Form::close() !!}
                    @else
                        <center><p class="btn btn-default c-azul" data-toggle="modal" data-target="#myModal">
                            <i class="glyphicon glyphicon-log-in c-azul margin-right1em"></i>
                            Inicia Sesión para comentar</p></center>
                    @endif
                    
                </div>
                <div class="comentarios-usuarios">

                    @foreach($comentarios as $comentario)
                    @endforeach

                    @if(isset($comentario))
                        <p class="numero"><span class="c-azul"><strong> {{ $comentario->where('articulo_id', $articulo->id)->count() }} </strong></span>  COMENTARIOS </p>
                    @else
                        <p class="numero"><span class="c-azul"><strong> 0 </strong></span>  COMENTARIOS
                        <p>Se el primero en comentar...</p> 
                    @endif
                    
                    

                    @foreach($comentarios as $comentario)
                        @foreach($usuarios->where('id', $comentario->user_id) as $usuario)
                        @endforeach
                            <div class="usuario">
                                <div class="datos">
                                    <div class="foto" style="background-image:url('/img/admin/usuarios/thumb150/{{$usuario->foto}}')"></div>
                                    <?php
                                        $nombre = $usuario->name; 
                                        $nombre = explode(" ",$nombre);
                                        $apellido = $usuario->apellido; 
                                        $apellido = explode(" ",$apellido);
                                        echo ucwords($nombre[0] . "  " . $apellido[0]); // esto muestra la primera palabra 
                                    ?>
                                    <span class="c-silver fecha">  | {{ucfirst($comentario->created_at->diffForHumans())}}</span>
                                    @if($usuario->nivel == 'alumno')
                                        <div class="nivel alumno"></div>
                                    @else
                                        <div class="nivel profesor"></div>
                                    @endif
                                </div>
                                <p><?php echo ($comentario->comentario); ?></p>
                            </div>
                    @endforeach
                </div>
                

            </div>

            {{-- menu derecho --}}
            @include('frontend.partes.menu-derecho')
            
        </div>
    </div>
    @include('frontend.partes.modal-login')
@endsection