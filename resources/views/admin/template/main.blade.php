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
    <link rel="stylesheet" href="{{asset('plugins/chosen/chosen.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/template.css')}}">

    <link href="https://fonts.googleapis.com/css?family=Archivo+Narrow|Fjalla+One|Ek+Mukta" rel="stylesheet">

</head>
<body>
    {{-- MENU --}}
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Blog Admin</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li><a href="#">Inicio <span class="sr-only">(current)</span></a></li>
                {{-- <li class="active"><a href="#">Inicio <span class="sr-only">(current)</span></a></li> --}}
                <li><a href="{{ route('usuario.index') }}">Usuarios</a></li>
                <li><a href="{{ route('categorias.index') }}">Categorias</a></li>
                <li><a href="{{ route('articulos.index') }}">Articulos</a></li>
                <li><a href="{{ route('recursos.index') }}">Recursos</a></li>
                <li><a href="{{ route('tags.index') }}">Tags</a></li>
                <li><a href="#">Comentarios</a></li>
            </ul>
           
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu" role="menu">
                        <li>
                            <a href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                Cerrar Sesion
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
    {{-- FIN MENU --}}
    <div class="container">
        <div class="row">
            @include('flash::message')
            @if(count($errors)>0)
                <div class="alert alert-danger" role="alert">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @yield('contenido')
        </div>
    </div>
    
    

    {{-- SCRIPTS --}}
    <script src="{{ asset('js/app.js') }}"></script>
     {{-- ALERTIFY --}}
    <script src="{{ asset('js/alert.js') }}"></script>
    <script>
        $('.alerta').click(function(){
            $.notify("Enlace copiado","success");
        })
            
    </script>
    {{-- TAGS CHOSEN --}}
    <script src="{{ asset('plugins/chosen/chosen.jquery.min.js') }}"></script>
    <script>
        $(".select-tag").chosen({
            placeholder_text_multiple: 'Seleccione palabras clave',
            max_selected_options:5,
            no_results_text: 'no se encontró este tag'
        });
       
    </script>

    <script src="{{ asset('plugins/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ asset('plugins/tinymce/langs/es.js') }}"></script>
    <script>
        tinymce.init({
            selector: '.editor',
            height: 500,
            theme: 'modern',
            content_style: "div, p { font-size: 1.2em; font-family: 'Ek Mukta', sans-serif;} h1, h2, h3, h4, h5, h5{color: black !important; font-weight: bold; font-family: 'Fjalla One', sans-serif !important; margin: 10px 0;} h1{ font-size: 20px !important; font-weight: 300 !important;} h2{font-size: 17px !important; font-weight: 300 !important;} h3{ font-size: 17px !important; font-weight: 300 !important;} h4{ font-size: 17px !important; font-weight: 300 !important;} h5{ font-size: 17px !important; font-weight: 300 !important;} h6{ font-size: 17px !important; font-weight: 300 !important;} hr{height:1px; background:#ccc; width:100%}",
            plugins: [
                'advlist autolink lists link image charmap print preview hr anchor pagebreak',
                'searchreplace wordcount visualblocks visualchars code fullscreen',
                'insertdatetime media nonbreaking save table contextmenu directionality',
                'emoticons template paste textcolor colorpicker textpattern imagetools codesample toc'
            ],
            toolbar1: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
            toolbar2: 'print media | forecolor backcolor emoticons',
            image_advtab: true,
            templates: [
                
                { title: 'Ejemplo', url: '/template/simple.html' },
                { title: 'Test template 2', url: 'Test 2' }
                //{ title: 'Test template 1', content: 'Test 1' },
                //{ title: 'Test template 2', content: 'Test 2' }
            ],
            //fonts.googleapis.com/css?family=Ek+Mukta
            content_css: [
                '//fonts.googleapis.com/css?family=Fjalla+One',
                '//fonts.googleapis.com/css?family=Ek+Mukta:200,300,400,500,600,700,800',
                '//www.tinymce.com/css/codepen.min.css'
                
            ]
        });
    </script>

    {{-- tooltip --}}
    <script>
        this.screenshotPreview = function(){	
            /* CONFIG */
                
                xOffset = 10;
                yOffset = 30;
                
                // these 2 variable determine popup's distance from the cursor
                // you might want to adjust to get the right result
                
            /* END CONFIG */
            $("a.screenshot").hover(function(e){
                this.t = this.title;
                this.title = "";	
                var c = (this.t != "") ? "<br/>" + this.t : "";
                $("body").append("<p id='screenshot'><img src='"+ this.rel +"' alt='url preview' />"+ c +"</p>");								 
                $("#screenshot")
                    .css("top",(e.pageY - xOffset) + "px")
                    .css("left",(e.pageX + yOffset) + "px")
                    .fadeIn("fast");						
            },
            function(){
                this.title = this.t;	
                $("#screenshot").remove();
            });	
            $("a.screenshot").mousemove(function(e){
                $("#screenshot")
                    .css("top",(e.pageY - xOffset) + "px")
                    .css("left",(e.pageX + yOffset) + "px");
            });			
        };


        // starting the script on page load
        $(document).ready(function(){
            screenshotPreview();
        });

        //COPIAR A PORTAPAPELES
        function copyToClipboard(elemento) {
            var $temp = $("<input>")
            $("body").append($temp);
            $temp.val($(elemento).text()).select();
            document.execCommand("copy");
            $temp.remove();
        }
    </script>
   

        
</body>
</html>