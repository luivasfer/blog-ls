@extends('frontend.template.main')

@section ('titulo', 'Blog')
@section ('contenido')



{{-- <div class="menu visibility fadeInDown wow animated" data-wow-delay=".2s">
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
</div> --}}
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
                <a href="{{route('frontend.articulos')}}"><img src="{{asset('img/bajar.png')}}" alt="entrar"></a>
            </div>
        </div>
    </div>
</div>