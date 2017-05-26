<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('titulo') :: La Salle La Paz</title>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="{{asset('css/normalize.css')}}">
    <link rel="stylesheet" href="{{asset('css/propios.css')}}">
    
    <link rel="stylesheet" href="{{asset('plugins/chosen/chosen.min.css')}}">
    <script src="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.js') }}"></script>
    <link href="https://fonts.googleapis.com/css?family=Archivo+Narrow|Fjalla+One|Ek+Mukta" rel="stylesheet">
</head>
<body>
    <!-- [if lt IE 9]>
        <p>
            Estás usando un navegador <strong>desactualizado</strong> por favor <a href="http://browsehappy.com/">actualiza tu navegador</a> para una mejor experiencia
        </p>
    <![endif]-->
    @yield('contenido')   
    
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/propios.js') }}"></script>

    {{-- scroll --}}
    
    <script>
        //$( "p" ).addClass( "visibility animated fadeIn wow" );
        new WOW().init();
    </script>
    <script>
        (function(){
            var parallax = document.querySelectorAll(".parallax"),
                speed = 0.5;

            window.onscroll = function(){
                [].slice.call(parallax).forEach(function(el,i){

                var windowYOffset = window.pageYOffset,
                    elBackgrounPos = "0 " + (windowYOffset * speed) + "px";
                
                el.style.backgroundPosition = elBackgrounPos;

                });
            };
        })();
    </script>
    
</body>
</html>