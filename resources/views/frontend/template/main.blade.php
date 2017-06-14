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
    {{-- <link rel="stylesheet" href="{{asset('css/normalize.css')}}"> --}}
    <link rel="stylesheet" href="{{asset('css/propios.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/trumbowyg/ui/trumbowyg.min.css')}}">
    
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
    
    {{-- footer --}}
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <footer>
                    © La Salle La Paz - 2017
                </footer>
            </div>
        </div>
    </div>
    

    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/propios.js') }}"></script>
    <script>
        //$( "p" ).addClass( "visibility animated fadeIn wow" );
        new WOW().init();
    </script>
    <script src="{{ asset('plugins/trumbowyg/trumbowyg.min.js') }}"></script>

    {{-- editor --}}
    <script src="{{ asset('plugins/trumbowyg/langs/es.min.js') }}"></script>
    <script>
        $('.editor').trumbowyg({
            lang: 'es',
            btns: [['bold', 'italic'], ['superscript', 'subscript'], ['link'],
                'btnGrp-justify', 'btnGrp-lists',['horizontalRule']]
        });
                
    </script>
    {{-- para que funcione esta pagina --}}
    <script>
        $(function() {
            window.scrollTo(0, 2);
        });
    </script>
    {{-- scroll --}}
    {{-- MODAL --}}
    <script>
        function testAnim(x) {
            $('.modal .modal-dialog').attr('class', 'modal-dialog  ' + x + '  animated');
        };
        $('#myModal').on('show.bs.modal', function (e) {
        var anim = $('#entrada').val();
            testAnim(anim);
        })
        $('#myModal').on('hide.bs.modal', function (e) {
        var anim = $('#salida').val();
            testAnim(anim);
        })
    </script>
    <script>
        $(document).ready(function(){
            $("table").addClass("table table-striped table-hover");
        });
    </script>
    
   
    
    
</body>
</html>