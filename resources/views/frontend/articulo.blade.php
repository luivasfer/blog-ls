@extends('frontend.template.main')

@section ('titulo', 'Articulo')
@section ('contenido')
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