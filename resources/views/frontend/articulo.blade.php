@extends('frontend.template.main')

@section ('titulo')
    @foreach($articulos as $articulo)
    @endforeach
    @foreach($categorias->where('id',$articulo->categoria_id) as $categoria)
    @endforeach
    {{ ucfirst($articulo->articulo) }} | Blog
@endsection

@section ('redes-sociales')
	<!-- REDES SOCIALES-->
    <meta name="description" content="Nuestros artículos son elaborados por nuestros estudiantes, profesores">
    <meta name="keywords" content="la salle, colegio, la paz, bolivia, articulos, blog, educacion, estudiantes, establecimiento, primaria, secundaria">
    <!-- Diseño y Desarrollo, Ing. Luis Vasquez Fernandez -->
    <meta property="og:url"           content="{{ url('articulo')}}/{{$categoria->slug}}/{{$articulo->id}}/{{$articulo->slug}}" />
    <meta property="og:type"          content="website"/>
    <meta property="og:title"         content="{{ ucfirst($articulo->articulo) }} | Blog La Salle" />
    <meta property="og:description"   content="Nuestros artículos son elaborados por nuestros estudiantes, profesores" />
    <meta property="og:image" content="http://blog.lasalle.edu.bo/img/articulos/original/{{ $articulo->img }}"/>
    
    <!-- Twitter Card data -->
    <meta name="twitter:site" content="@lasallelapaz">
    <meta name="twitter:title" content="{{ ucfirst($articulo->articulo) }} | Blog La Salle">
    <meta name="twitter:description" content="Nuestros artículos son elaborados por nuestros estudiantes, profesores">
    <meta name="twitter:creator" content="@lasallelapaz">
    <!-- Resumen Twitter Card con una imagen grande con al menos 280x150px -->
    <meta name="twitter:image:src" content="http://blog.lasalle.edu.bo/img/articulos/original/{{ $articulo->img }}">
@endsection


@section ('contenido')

@include('frontend.partes.menu-principal')

<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="titulo-blog margin-top5em">
                
            </div>
        </div>
    </div>
</div>

    @foreach($articulos as $articulo)
    @endforeach
    @foreach($categorias->where('id', $articulo->categoria_id) as $categoria)
    @endforeach
    @foreach($users->where('id', $articulo->user_id) as $user)
    @endforeach
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <ol class="breadcrumb">
                    <li><a href="{{route('frontend.articulos')}}">Articulos</a></li>
                    <li class="active">{{ ucfirst($articulo->articulo)}}</li>
                </ol>
            </div>
            <div class="col-xs-12 col-sm-9 articulo"   style="padding:0 2.5em">
                
                <h1>{{ ucfirst($articulo->articulo)}}</h1>
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
                    @yield('contenido')
                <div class="comentarios">
                    <center><h3>Añadir Comentario</h3></center>
                    @if(isset(Auth::user()->id))
                        {!! Form::open(['route' => 'comentarios.store', 'method'=>'POST', 'files' => true]) !!}
                            <div id="comentario"></div>
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

                                    @if($usuario->foto)
                                        <div class="foto" style="background-image:url('/img/admin/usuarios/thumb150/{{$usuario->foto}}')"></div>
                                    @else
                                        @if($usuario->sexo == 'm')
                                            <div class="foto" style="background-image:url('/img/masculino.png')"></div>
                                        @else
                                            <div class="foto" style="background-image:url('/img/femenino.png')"></div>
                                        @endif    
                                    @endif

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
    @include('frontend.partes.footer')
@endsection