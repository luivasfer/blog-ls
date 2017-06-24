@extends('frontend.template.main')
@section ('titulo', 'Articulos')

@section ('redes-sociales')
	<!-- REDES SOCIALES-->
    <meta name="description" content="A través de nuestros artículos ampliaras tus conocimientos, aprenderás cotidianamente y mejoraras tu hábito de lectura. ">
    <meta name="keywords" content="la salle, colegio, la paz, bolivia, articulos, blog, educacion, estudiantes, establecimiento, primaria, secundaria">
    <!-- Diseño y Desarrollo, Ing. Luis Vasquez Fernandez -->
    <meta property="og:url"           content="http://blog.lasalle.edu.bo/articulos" />
    <meta property="og:type"          content="website"/>
    <meta property="og:title"         content="Articulos :: Blog La Salle La Paz" />
    <meta property="og:description"   content="A través de nuestros artículos ampliaras tus conocimientos, aprenderás cotidianamente y mejoraras tu hábito de lectura. " />
    <meta property="og:image" content="http://blog.lasalle.edu.bo/img/redes-sociales/articulos.jpg"/>
    
    <!-- Twitter Card data -->
    <meta name="twitter:site" content="@lasallelapaz">
    <meta name="twitter:title" content="Articulos :: Blog La Salle La Paz">
    <meta name="twitter:description" content="A través de nuestros artículos ampliaras tus conocimientos, aprenderás cotidianamente y mejoraras tu hábito de lectura. ">
    <meta name="twitter:creator" content="@lasallelapaz">
    <!-- Resumen Twitter Card con una imagen grande con al menos 280x150px -->
    <meta name="twitter:image:src" content="http://blog.lasalle.edu.bo/img/redes-sociales/articulos.jpg">
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

<div class="blog" id="blog">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-9">
                <div class="row">
                    <div class="col-xs-12 text-center bienvenido">
                        <h4>Bienvenido</h4>
                        <div class="linea"></div>
                        <p>Ahora podrás buscar, obtener, procesar y comunicar información para transformarla en conocimiento y poder compartir con toda la comunidad estudiantil.</p>
                    </div>
                </div>
                <div class="row titulos">
                    <div class="col-xs-6"><span class="bolita"></span> ARTÍCULOS</div>
                    <div class="col-xs-6 text-right">La Paz, 19 Junio 2017</div>
                </div>
                
                {{-- GRID --}}
                 <div id="container-01">
                    @foreach($articulos as $articulo)
                    @foreach($categorias->where('id',$articulo->categoria_id) as $categoria)
                    @endforeach
                    <div class="pinto visibility fadeInUp animated wow" data-wow-delay=".5s">
                        <a href="{{ url('articulo')}}/{{$categoria->slug}}/{{$articulo->id}}/{{$articulo->slug}}">
                            <img src="{{asset('img/articulos/thumb350/')}}/{{$articulo->img}}" class="img">
                        </a>
                        <div class="info">
                            <a href="{{ url('articulo')}}/{{$categoria->slug}}/{{$articulo->id}}/{{$articulo->slug}}">
                                <h2>{{ ucfirst($articulo->articulo) }}</h2>
                            </a>
                            <div class="publicado visibility fadeIn wow animated" data-wow-delay="1.5s">
                                <p> {{$articulo->created_at->diffForHumans()}}
                                    <img src="{{asset('img/reloj.svg')}}" width="10" alt="Publicado">
                                </p>
                            </div>
                        </div>
                        <div class="opciones">
                            <div class="row">
                                <div class="col-xs-4">
                                    <img src="{{asset('img/categorias/')}}/{{$categoria->id}}.svg" width="18" alt="{{ucwords($categoria->categoria)}}" title="{{ucwords($categoria->categoria)}}">
                                </div>
                                <div class="col-xs-8 text-right">
                                    <img src="{{asset('img/compartir.svg')}}" class="img1 margin-right1em" title="compartir" width="14"  alt="Comentario"> 
                                    <span class="c-silver"> | </span> 
                                    <img src="{{asset('img/comentario.svg')}}" title="Comentarios" class="img1 margin-left1em" width="15" alt="Comentario">
                                    @foreach($comentarios as $comentario)
                                    @endforeach
                                    <span class="font-size12">
                                    @if(isset($comentario))
                                        {{ $comentario->where('articulo_id', $articulo->id)->count() }}
                                    @else
                                        0
                                    @endif
                                    </span>      
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="text-center">
                    {{ $articulos->links() }}
                </div>
            </div>
            {{-- menu derecho --}}
            @include('frontend.partes.menu-derecho')
        </div>
    </div>
    @include('frontend.partes.modal-login')
    @include('frontend.partes.footer')
</div>
@endsection
 