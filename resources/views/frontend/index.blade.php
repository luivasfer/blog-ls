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
           <h4>Articulos Blog La Salle La Paz</h4>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-9">
                {{-- GRID --}}
                 <div id="container-01">
                    @foreach($articulos as $articulo)
                    @foreach($categorias->where('id',$articulo->categoria_id) as $categoria)
                    @endforeach
                    
                    <div class="pinto visibility fadeInUp wow animated" data-wow-delay=".6s>
                        <a href="{{ url('articulo')}}/{{$categoria->slug}}/{{$articulo->id}}/{{$articulo->slug}}">
                            <img src="{{asset('img/articulos/thumb350/')}}/{{$articulo->img}}" class="img">
                        </a>
                        <div class="info">
                            <a href="{{ url('articulo')}}/{{$categoria->slug}}/{{$articulo->id}}/{{$articulo->slug}}">
                                <h2>{{ $articulo->articulo }}</h2>
                            </a>
                            <div class="publicado visibility fadeIn wow animated" data-wow-delay="1s">
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
            {{-- menu derecho --}}
            @include('frontend.partes.menu-derecho')
        </div>
    </div>
</div>
