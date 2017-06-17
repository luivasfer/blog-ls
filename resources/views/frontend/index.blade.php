@extends('frontend.template.main')

@section ('titulo', 'Blog')
@section ('contenido')
    @include('frontend.partes.menu-principal')
    <div class="video-container">
        <video autoplay loop class="fillWidth" poster="{{asset('video/fondo.jpg')}}" autoplay loop>
            <source src="{{asset('video/fondo.mp4')}}" type="video/mp4" />Su navegador no soporta la etiqueta de vídeo. Le sugiero que actualice su navegador.
            <source src="{{asset('video/fondo.webm')}}" type="video/webm" />Su navegador no soporta la etiqueta de vídeo. Le sugiero que actualice su navegador.
        </video>
        <div class="contenido-inicio">
            <div class="inicio">
                <div class="main-carousel" >
                <div class="carousel" style="width:100%; border:1px solid red">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugiat placeat quae error, enim inventore cumque iste, voluptatem quos soluta eos laboriosam excepturi. Obcaecati quis, quas dolor, aperiam earum in consequuntur.</div>
                <div class="carousel" style="width:100% !important; border:1px solid red">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugiat placeat quae error, enim inventore cumque iste, voluptatem quos soluta eos laboriosam excepturi. Obcaecati quis, quas dolor, aperiam earum in consequuntur.</div>
                <div class="carousel" style="width:100%; border:1px solid red">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugiat placeat quae error, enim inventore cumque iste, voluptatem quos soluta eos laboriosam excepturi. Obcaecati quis, quas dolor, aperiam earum in consequuntur.</div>
                ...
                </div>
            </div>
        </div>
        {{-- <div class="filter"></div>
        <video autoplay loop class="fillWidth">
            <source src="{{asset('video/fondo.mp4')}}" type="video/mp4" />Your browser does not support the video tag. I suggest you upgrade your browser.
            <source src="{{asset('video/fondo.webm')}}" type="video/webm" />Your browser does not support the video tag. I suggest you upgrade your browser.
        </video>
        <div class="poster hidden">
            <img src="{{asset('video/fondo.jpg')}}" alt="Fondo - pagina">
        </div> --}}
    </div>



{{-- <div class="inicio-portada parallax">
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
                <a href="{{route('frontend.articulos')}}"><img src="{{asset('img/enter.svg')}}" alt="entrar" title="entrar" width="30"></a>
            </div>
        </div>
    </div>
</div> --}}

@endsection