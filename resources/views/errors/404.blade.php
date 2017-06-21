@extends('frontend.template.main')

@section ('titulo', 'Página no encontrada')
@section ('contenido')

    @include('frontend.partes.menu-principal')
    <div class="contenido-error">
        <div class="error">
            <div class="icono"></div>
            <p>PÁGINA NO ENCONTRADA</p>
            <hr>
            <a href="{{ route('frontend.index') }}">PÁGINA DE INICIO</a>
        </div>
    </div>

@endsection