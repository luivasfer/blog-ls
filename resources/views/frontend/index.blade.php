@extends('frontend.template.main')

@section ('titulo', 'Blog')
@section ('contenido')
<div class="menu">
    <p>Hola como estas</p>
</div>
<div class="inicio-portada">
    <div class="row alto100 margin0">
        <div class="intro">
            <div class="nube">
                <center>
                    <img src="{{asset('img/logo-lasalle.svg')}}" class="logo" width="130" alt="Logo La Salle La Paz">
                </center>
            </div>
            <h1 class="text-center">BLOG</h1>
            <h2 class="text-center">COLEGIO LA SALLE LA PAZ</h2>
            <div class="entrar text-center center-block">
                <a href="#"><img src="{{asset('img/bajar.png')}}" alt="entrar"></a>
            </div>
        </div>
    </div>
</div>
<div class="blog margin0">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-9">
                {{-- GRID --}}
                 <div id="container-01">
                    <div class="pinto">
                        <img src="{{asset('recursos/thumb350/ls_recurso_1495312257.JPG')}}" class="img">
                        <div class="info">
                            <h2>Logran una forma de reducir tiempo y costos en el análisis del aire</h2>
                        </div>
                        <div class="opciones">
                            <div class="row">
                                <div class="col-xs-4">
                                    <img src="{{asset('img/categorias/biologia.svg')}}" width="18" alt="">
                                </div>
                                <div class="col-xs-8 text-right">
                                    <img src="{{asset('img/compartir.svg')}}" class="img1" width="14" alt="Comentario"> 
                                    <span class="c-silver"> | </span> 
                                    <img src="{{asset('img/comentario.svg')}}" class="img1" width="15" alt="Comentario">  <span class="font-size12">15</span>      
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="pinto">
                        <img src="{{asset('recursos/thumb350/ls_recurso_1495256219.JPG')}}" class="img">
                        <div class="info">
                            <h2>Logran una forma de reducir tiempo y costos en el análisis del aire</h2>
                        </div>
                        <div class="opciones">
                            <div class="row">
                                <div class="col-xs-4">
                                    <img src="{{asset('img/categorias/matematicas.svg')}}" width="18" alt="">
                                </div>
                                <div class="col-xs-8 text-right">
                                    <img src="{{asset('img/compartir.svg')}}" class="img1" width="14" alt="Comentario"> 
                                    <span class="c-silver"> | </span> 
                                    <img src="{{asset('img/comentario.svg')}}" class="img1" width="15" alt="Comentario"> <span class="font-size12">15</span> 
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="pinto">
                        <img src="{{asset('recursos/thumb350/ls_recurso_1495312257.JPG')}}" class="img">
                        <div class="info">
                            <h2>Logran una forma de reducir tiempo y costos en el análisis del aire</h2>
                        </div>
                        <div class="opciones">
                            <div class="row">
                                <div class="col-xs-4">
                                    <img src="{{asset('img/categorias/biologia.svg')}}" width="18" alt="">
                                </div>
                                <div class="col-xs-8 text-right">
                                    <img src="{{asset('img/compartir.svg')}}" class="img1" width="14" alt="Comentario"> 
                                    <span class="c-silver"> | </span> 
                                    <img src="{{asset('img/comentario.svg')}}" class="img1" width="15" alt="Comentario"> <span class="font-size12">15</span>  
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="pinto">
                        <img src="{{asset('recursos/thumb350/ls_recurso_1495256219.JPG')}}" class="img">
                        <div class="info">
                            <h2>Logran una forma de reducir tiempo y costos en el análisis del aire</h2>
                        </div>
                        <div class="opciones">
                            <div class="row">
                                <div class="col-xs-4">
                                    <img src="{{asset('img/categorias/matematicas.svg')}}" width="18" alt="">
                                </div>
                                <div class="col-xs-8 text-right">
                                    <img src="{{asset('img/compartir.svg')}}" class="img1" width="14" alt="Comentario"> 
                                    <span class="c-silver"> | </span> 
                                    <img src="{{asset('img/comentario.svg')}}" class="img1" width="15" alt="Comentario"> <span class="font-size12">15</span> 
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="pinto">
                        <img src="{{asset('recursos/thumb350/ls_recurso_1495312257.JPG')}}" class="img">
                        <div class="info">
                            <h2>Logran una forma de reducir tiempo y costos en el análisis del aire</h2>
                        </div>
                        <div class="opciones">
                            <div class="row">
                                <div class="col-xs-4">
                                    <img src="{{asset('img/categorias/biologia.svg')}}" width="18" alt="">
                                </div>
                                <div class="col-xs-8 text-right">
                                    <img src="{{asset('img/compartir.svg')}}" class="img1" width="14" alt="Comentario"> 
                                    <span class="c-silver"> | </span> 
                                    <img src="{{asset('img/comentario.svg')}}" class="img1" width="15" alt="Comentario"> <span class="font-size12">15</span>  
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="pinto">
                        <img src="{{asset('recursos/thumb350/ls_recurso_1495256219.JPG')}}" class="img">
                        <div class="info">
                            <h2>Logran una forma de reducir tiempo y costos en el análisis del aire</h2>
                        </div>
                        <div class="opciones">
                            <div class="row">
                                <div class="col-xs-4">
                                    <img src="{{asset('img/categorias/matematicas.svg')}}" width="18" alt="">
                                </div>
                                <div class="col-xs-8 text-right">
                                    <img src="{{asset('img/compartir.svg')}}" class="img1" width="14" alt="Comentario"> 
                                    <span class="c-silver"> | </span> 
                                    <img src="{{asset('img/comentario.svg')}}" class="img1" width="15" alt="Comentario"> <span class="font-size12">15</span> 
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="pinto">
                        <img src="{{asset('recursos/thumb350/ls_recurso_1495312257.JPG')}}" class="img">
                        <div class="info">
                            <h2>Logran una forma de reducir tiempo y costos en el análisis del aire</h2>
                        </div>
                        <div class="opciones">
                            <div class="row">
                                <div class="col-xs-4">
                                    <img src="{{asset('img/categorias/biologia.svg')}}" width="18" alt="">
                                </div>
                                <div class="col-xs-8 text-right">
                                    <img src="{{asset('img/compartir.svg')}}" class="img1" width="14" alt="Comentario"> 
                                    <span class="c-silver"> | </span> 
                                    <img src="{{asset('img/comentario.svg')}}" class="img1" width="15" alt="Comentario"> <span class="font-size12">15</span>  
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="pinto">
                        <img src="{{asset('recursos/thumb350/ls_recurso_1495256219.JPG')}}" class="img">
                        <div class="info">
                            <h2>Logran una forma de reducir tiempo y costos en el análisis del aire</h2>
                        </div>
                        <div class="opciones">
                            <div class="row">
                                <div class="col-xs-4">
                                    <img src="{{asset('img/categorias/matematicas.svg')}}" width="18" alt="">
                                </div>
                                <div class="col-xs-8 text-right">
                                    <img src="{{asset('img/compartir.svg')}}" class="img1" width="14" alt="Comentario"> 
                                    <span class="c-silver"> | </span> 
                                    <img src="{{asset('img/comentario.svg')}}" class="img1" width="15" alt="Comentario"> <span class="font-size12">15</span> 
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="pinto">
                        <img src="{{asset('recursos/thumb350/ls_recurso_1495312257.JPG')}}" class="img">
                        <div class="info">
                            <h2>Logran una forma de reducir tiempo y costos en el análisis del aire</h2>
                        </div>
                        <div class="opciones">
                            <div class="row">
                                <div class="col-xs-4">
                                    <img src="{{asset('img/categorias/biologia.svg')}}" width="18" alt="">
                                </div>
                                <div class="col-xs-8 text-right">
                                    <img src="{{asset('img/compartir.svg')}}" class="img1" width="14" alt="Comentario"> 
                                    <span class="c-silver"> | </span> 
                                    <img src="{{asset('img/comentario.svg')}}" class="img1" width="15" alt="Comentario"> <span class="font-size12">15</span> 
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="pinto">
                        <img src="{{asset('recursos/thumb350/ls_recurso_1495256219.JPG')}}" class="img">
                        <div class="info">
                            <h2>Logran una forma de reducir tiempo y costos en el análisis del aire</h2>
                        </div>
                        <div class="opciones">
                            <div class="row">
                                <div class="col-xs-4">
                                    <img src="{{asset('img/categorias/matematicas.svg')}}" width="18" alt="">
                                </div>
                                <div class="col-xs-8 text-right">
                                    <img src="{{asset('img/compartir.svg')}}" class="img1" width="14" alt="Comentario"> 
                                    <span class="c-silver"> | </span> 
                                    <img src="{{asset('img/comentario.svg')}}" class="img1" width="15" alt="Comentario"><span class="font-size12">15</span> 
                                </div>
                            </div>
                        </div>
                    </div>

                </div>


            </div>
            <div class="col-xs-12 col-sm-3">
                <h3>ÚLTIMOS ARTÍCULOS</h3>
                <div class="linea"></div>
                <div class="ultimo-articulo margin0">
                    <span class="text-left margin0">14 de marzo, el día del número Pi</span>
                    <span><i>Matemáticas</i></span>
                </div>
                <div class="ultimo-articulo margin0">
                    <span class="text-left margin0">Logran una forma de reducir tiempo y costos en el análisis del aire</span>
                    <span><i>Física</i></span>
                </div>
                <div class="ultimo-articulo margin0">
                    <span class="text-left margin0">Ocho escritores para sumergirse en la literatura portuguesa</span>
                    <span><i>Literatura</i></span>
                </div>
                <div class="ultimo-articulo margin0">
                    <span class="text-left margin0">La apuesta verde de Bioceres</span>
                    <span><i>Biología</i></span>
                </div>
                <h3>CATEGORIAS</h3>
                <div class="linea"></div>
                <div class="categorias-inicio margin0">
                    <img src="{{asset('img/categorias/matematicas.svg')}}" width="18" alt="">
                    <span class="text-left margin0">MATEMÁTICAS<TICAS></TICAS></span>
                    <span class="numero-categoria">15</span>
                </div>
                <div class="categorias-inicio margin0">
                    <img src="{{asset('img/categorias/biologia.svg')}}" width="18" alt="">
                    <span class="text-left margin0">BIOLOGÍA<TICAS></TICAS></span>
                    <span class="numero-categoria">12</span>
                </div>
                <div class="categorias-inicio margin0">
                    <img src="{{asset('img/categorias/literatura.svg')}}" width="18" alt="">
                    <span class="text-left margin0">LITERATURA<TICAS></TICAS></span>
                    <span class="numero-categoria">21</span>
                </div>
                <div class="categorias-inicio margin0">
                    <img src="{{asset('img/categorias/geografia.svg')}}" width="18" alt="">
                    <span class="text-left margin0">GEOGRAFÍA<TICAS></TICAS></span>
                    <span class="numero-categoria">7</span>
                </div>
            </div>
        </div>
    </div>
    
</div>