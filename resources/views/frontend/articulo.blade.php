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
            <div class="col-xs-12">
                <h1>HOLAL COMO ESTA S</h1>
                @foreach($articulos as $articulo)
                    {{$articulo->articulo}}
                @endforeach
                <p></p>
            </div>
        </div>
    </div>
@endsection