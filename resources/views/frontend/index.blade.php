@extends('frontend.template.main')

@section ('titulo', 'Blog')
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
<div class="inicio-portada parallax">
    <div class="row alto100 margin0">
        <div class="intro">
            <div class="nube visibility flipInX wow animated" data-wow-delay="1s">
                <center>
                    <img src="{{asset('img/logo-lasalle.svg')}}" class="logo" width="130" alt="Logo La Salle La Paz">
                </center>
            </div>
            <h1 class="text-center visibility fadeInUp wow animated" data-wow-delay="1.3s">BLOG</h1>
            <h2 class="text-center visibility fadeInUp wow animated" data-wow-delay="1.6s">COLEGIO LA SALLE LA PAZ</h2>
            <div class="entrar text-center center-block visibility fadeInDown wow animated" data-wow-delay="1.6s">
                <a href="#blog"><img src="{{asset('img/bajar.png')}}" alt="entrar"></a>
            </div>
        </div>
    </div>
</div>

<div class="blog margin0" id="blog" >
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-9">
                {{-- GRID --}}
                 <div id="container-01">
                    @foreach($articulos as $articulo)
                    <div class="pinto">
                        <img src="{{asset('img/articulos/thumb350/')}}/{{$articulo->img}}" class="img">
                        <div class="info">
                            <h2>{{ $articulo->articulo }}</h2>
                        </div>
                        <div class="opciones">
                            <div class="row">
                                <div class="col-xs-4">
                                    @foreach($categorias->where('id',$articulo->categoria_id) as $categoria)
                                    @endforeach
                                    <img src="{{asset('img/categorias/')}}/{{$categoria->id}}.svg" width="18" alt="{{ucwords($categoria->categoria)}}" title="{{ucwords($categoria->categoria)}}">
                                </div>
                                <div class="col-xs-8 text-right">
                                    <img src="{{asset('img/compartir.svg')}}" class="img1" width="14" alt="Comentario"> 
                                    <span class="c-silver"> | </span> 
                                    <img src="{{asset('img/comentario.svg')}}" class="img1" width="15" alt="Comentario">  <span class="font-size12">15</span>      
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>


            </div>
            <div class="col-xs-12 col-sm-3">
                <h3>ÚLTIMOS ARTÍCULOS</h3>
                <div class="linea"></div>
                <div class="ultimo-articulo margin0">
                    <span class="text-left margin0">14 de marzo, el día del número Pi</span>
                    <span><i>Matemáticas</i></span>
                </div>
                <div class="ultimo-articulo margin0">
                    <span class="text-left margin0">Logran una forma de reducir tiempo y costos en el análisis del aire</span>
                    <span><i>Física</i></span>
                </div>
                <div class="ultimo-articulo margin0">
                    <span class="text-left margin0">Ocho escritores para sumergirse en la literatura portuguesa</span>
                    <span><i>Literatura</i></span>
                </div>
                <div class="ultimo-articulo margin0">
                    <span class="text-left margin0">La apuesta verde de Bioceres</span>
                    <span><i>Biología</i></span>
                </div>
                <h3>CATEGORIAS</h3>
                <div class="linea"></div>
                @foreach($listaCategorias as $listaCategoria)
                <div class="categorias-inicio margin0">
                    <img src="{{asset('img/categorias/')}}/{{ $listaCategoria->id }}.svg" width="18" alt="{{ $listaCategoria->categoria }}">
                    <span class="text-left margin0">{{ $listaCategoria->categoria }}<TICAS></TICAS></span>
                    <span class="numero-categoria">
                        @foreach($contarArticulos as $contarArticulo)
                        @endforeach
                        {{ $contarArticulo->where('categoria_id', $listaCategoria->id)->count() }}
                    </span>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
