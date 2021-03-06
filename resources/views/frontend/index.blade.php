@extends('frontend.template.main')
@section ('titulo', 'Blog')

@section ('redes-sociales')
	<!-- REDES SOCIALES-->
    <meta name="description" content="El Blog nos permitirá intercambiar ideas trabajar en equipo, diseñar y visualizar de manera inmediata.">
    <meta name="keywords" content="la salle, colegio, la paz, bolivia, blog, educacion, estudiantes, establecimiento, primaria, secundari">
    <!-- Diseño y Desarrollo, Ing. Luis Vasquez Fernandez -->
    <meta property="og:url"           content="http://blog.lasalle.edu.bo" />
    <meta property="og:type"          content="website"/>
    <meta property="og:title"         content="Blog Colegio La Salle, La Paz - Bolivia" />
    <meta property="og:description"   content="El Blog nos permitirá intercambiar ideas trabajar en equipo, diseñar y visualizar de manera inmediata." />
    <meta property="og:image" content="http://blog.lasalle.edu.bo/img/redes-sociales/index.png"/>
    
    <!-- Twitter Card data -->
    <meta name="twitter:site" content="@lasallelapaz">
    <meta name="twitter:title" content="Blog Colegio La Salle, La Paz - Bolivia">
    <meta name="twitter:description" content="El Blog nos permitirá intercambiar ideas trabajar en equipo, diseñar y visualizar de manera inmediata.">
    <meta name="twitter:creator" content="@lasallelapaz">
    <!-- Resumen Twitter Card con una imagen grande con al menos 280x150px -->
    <meta name="twitter:image:src" content="http://blog.lasalle.edu.bo/img/redes-sociales/index.png">
@endsection

@section ('contenido')
    @include('frontend.partes.menu-principal')
    <div class="video-container">
        <div class="capa-roja"></div>
        <video autoplay loop class="fillWidth" poster="{{asset('video/fondo.jpg')}}" autoplay loop>
            <source src="{{asset('video/fondo.mp4')}}" type="video/mp4" />Su navegador no soporta la etiqueta de vídeo. Le sugiero que actualice su navegador.
            <source src="{{asset('video/fondo.webm')}}" type="video/webm" />Su navegador no soporta la etiqueta de vídeo. Le sugiero que actualice su navegador.
        </video>
        <div class="contenido-inicio">
            <div class="inicio">
                <div class="contenido-nube">
                    <div class="nube visibility  animated wow fadeInUp" data-wow-delay=".5s">
                        <img src="{{ asset('img/logo-lasalle.svg') }}" width="107" alt="Logo La Salle La Paz" class="logo-lasalle">
                    </div>
                    <div class="recursos">
                        <img src="{{ asset('img/portada/computadora.svg') }}" alt="computadora" class="computadora visibility animated wow fadeInUp" data-wow-delay="1.7s">
                        <img src="{{ asset('img/portada/foco.svg') }}" alt="idea" class="foco visibility animated wow fadeInUp"  data-wow-delay="1.4s">
                        <img src="{{ asset('img/portada/usuario.svg') }}" alt="usuario" class="usuario computadora visibility animated wow fadeInUp" data-wow-delay="1s">
                        <img src="{{ asset('img/portada/mundo.svg') }}" alt="mundo" class="mundo visibility animated wow fadeInUp"  data-wow-delay="1.4s">
                        <img src="{{ asset('img/portada/comentario.svg') }}" alt="comentarios" class="comentario visibility animated wow fadeInUp" data-wow-delay="1.7s">
                    </div>
                </div>
                <div class="linea-inicio">
                    <div class="linea  visibility animated wow fadeIn" data-wow-delay="3s"></div>
                </div>
                <div class="carrusel visibility animated wow fadeIn" data-wow-delay="2.5s">
                    <div class="main-carousel">
                        <div class="carousel" style="width:100%">El <strong>Blog</strong> permite intercambiar ideas, trabajar en equipo, diseñar y visualizar de manera inmediata </div>
                        <div class="carousel" style="width:100% !important">Facilita el auto-conocimiento a través del <strong> feedback </strong> que proporciona los comentarios </div>
                        <div class="carousel" style="width:100%">Incorporación de diferentes <strong> recursos multimedia </strong> para un mejor entendimiento del tema</div>
                        <div class="carousel" style="width:100%">Posibilita nuevas formas de <strong>comunicación</strong> entre la comunidad estudiantil</div>
                    </div>                
                </div>
                <div class="btn-entrar  visibility animated wow fadeIn" data-wow-delay="3.4s">
                    <a href="{{ route('frontend.articulos') }}">ENTRAR</a> 
                </div>
            </div>
        </div>
    </div>

@endsection