@extends('frontend.template.main')

@section ('titulo', 'Blog')
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
                    <div class="nube">
                        <img src="{{ asset('img/logo-lasalle.svg') }}" width="107" alt="Logo La Salle La Paz" class="logo-lasalle">
                    </div>
                    <div class="recursos">
                        <img src="{{ asset('img/portada/computadora.svg') }}" alt="" class="computadora">
                        <img src="{{ asset('img/portada/foco.svg') }}" alt="" class="foco">
                        <img src="{{ asset('img/portada/usuario.svg') }}" alt="" class="usuario">
                        <img src="{{ asset('img/portada/mundo.svg') }}" alt="" class="mundo">
                        <img src="{{ asset('img/portada/comentario.svg') }}" alt="" class="comentario">
                    </div>
                </div>
                <div class="linea-inicio">
                    <div class="linea"></div>
                </div>
                <div class="carrusel">
                    <div class="main-carousel">
                        <div class="carousel" style="width:100%">Ahora podrás aportar con tus conocimientos a la comunidad</div>
                        <div class="carousel" style="width:100% !important">Ahora podrás aportar con tus conocimientos a la comunidad</div>
                        <div class="carousel" style="width:100%">Ahora podrás aportar con tus conocimientos a la comunidad</div>
                    
                    </div>                
                </div>
                <div class="btn-entrar">
                    <a href="#">ENTRAR</a> 
                </div>
            </div>
        </div>
    </div>

@endsection