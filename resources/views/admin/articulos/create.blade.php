@extends ('admin.template.main')
@section('titulo', 'Crear articulo')
@section('contenido')
     {!! Form::open(['route' => 'articulos.store', 'method'=>'POST', 'files' => true]) !!}
     
        <div class="row">
            <div class="col-xs-12 col-sm-9">
                <div class="form-group">
                    {!! Form::label('articulo', 'Título del Artículo', ['class' => 'subtitulos']); !!}
                    {!! Form::text('articulo', null, ['class'=>'form-control', 'placeholder' => 'Título del artículo']); !!}
                </div>
            </div>
            <div class="col-xs-12 col-sm-3">
                <div class="form-group">
                    {!! Form::label('categoria_id', 'Categoria', ['class' => 'subtitulos']) !!}
                    {!! Form::select('categoria_id', $categorias, null, ['class'=>'form-control mayusculas',  'placeholder'=>'Seleccionar...']) !!}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-9">
                <div class="plantilla-enlace">
                    <a class="btn btn-primary" data-toggle="collapse"  href="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                        Ver plantillas 
                    </a>
                    {{-- PLANTILLA  1 --}}
                    <div id="pantilla1" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    Plantilla 1
                                </div>
                                <div class="modal-body">
                                    <center>
                                        <img src="{{ asset('img/plantillas/plantilla1.jpg') }}" class="img-responsive">
                                        <hr>
                                        <p>Contiente texto, 2 imagenes alineado a la izquierda y derecha</p>
                                    </center>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- PLANTILLA  2 --}}
                    <div id="pantilla2" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    Plantilla 2
                                </div>
                                <div class="modal-body">
                                    <center>
                                        <img src="{{ asset('img/plantillas/plantilla2.jpg') }}" class="img-responsive">
                                        <hr>
                                        <p>Contiente texto, imagenes alineado a izquierda y video</p>
                                    </center>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- PLANTILLA  3 --}}
                    <div id="pantilla3" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    Plantilla 3
                                </div>
                                <div class="modal-body">
                                    <center>
                                        <img src="{{ asset('img/plantillas/plantilla3.jpg') }}" class="img-responsive">
                                        <hr>
                                        <p>Contiente texto, una tabla y dos imagenes</p>
                                    </center>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- PLANTILLA  4 --}}
                    <div id="pantilla4" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    Plantilla 4
                                </div>
                                <div class="modal-body">
                                    <center>
                                        <img src="{{ asset('img/plantillas/plantilla4.jpg') }}" class="img-responsive">
                                        <hr>
                                        <p>Contiente texto, dos imagenes alineado a la derecha y una tabla</p>
                                    </center>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                    
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="row plantillas collapse"  id="collapseExample">
                    <div class="col-xs-6 col-sm-3">
                        <center><img src="{{ asset('img/plantillas/plantilla1.jpg') }}" width="150" alt="Plantilla1" data-toggle="modal" data-target="#pantilla1" class="cur-zoom">
                            <h6>Plantilla 1</h6>
                        </center>
                    </div>
                    <div class="col-xs-6 col-sm-3">
                        <center><img src="{{ asset('img/plantillas/plantilla2.jpg') }}" width="150" alt="Plantilla2" data-toggle="modal" data-target="#pantilla2" class="cur-zoom">
                            <h6>Plantilla 2</h6>
                        </center>
                    </div>
                    <div class="col-xs-6 col-sm-3">
                        <center><img src="{{ asset('img/plantillas/plantilla3.jpg') }}" width="150" alt="Plantilla3" data-toggle="modal" data-target="#pantilla3" class="cur-zoom">
                            <h6>Plantilla 3</h6>
                        </center>
                    </div>
                    <div class="col-xs-6 col-sm-3">
                        <center><img src="{{ asset('img/plantillas/plantilla4.jpg') }}" width="150" alt="Plantilla4" data-toggle="modal" data-target="#pantilla4" class="cur-zoom">
                            <h6>Plantilla 4</h6>
                        </center>
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('contenido', 'Contenido',  ['class' => 'subtitulos']); !!}
                    {!! Form::textarea('contenido', null, ['class'=>'form-control editor', 'placeholder' => 'Contenido', 'rows'=>5]); !!}
                </div>
            </div>
            <div class="col-xs-12 col-sm-3">
                <div class="form-group">
                    {!! Form::label('img', 'Imagen Principal', ['class' => 'subtitulos']); !!}
                    {!! Form::file('img',['class'=>'form-control', 'accept'=>'.png, .jpg, .jpeg', 'id'=>'input10']); !!}
                </div>

                <div class="switch-field">
                    <p class="subtitulos">¿Publicar Ahora?</p>
                    <input type="radio" id="switch_left" name="estado" value="1"/>
                    <label for="switch_left">SI</label>
                    <input type="radio" id="switch_right" name="estado" value="0" checked/>
                    <label for="switch_right">NO</label>
                </div>
                <hr>
                <div class="form-group">
                    <a href="{{ route('articulos.index') }}"  title="Volver" class="btn btn-primary">
                        <i class="glyphicon glyphicon-hand-left"></i>
                    </a>
                    {!! Form::submit('Crear artículo',['class'=>'btn btn-primary']); !!}
                </div>
            </div>
        </div>

        {{-- <div class="form-group">
            {!! Form::label('tags', 'Tags') !!}
            {!! Form::select('tags[]', $tags, null, ['class'=>'form-control select-tag', 'multiple']) !!}
        </div> --}}

        
     {!! Form::close() !!}
     

@endsection

@section('js')
    <script>
        $(".select-tag").chosen({
            placeholder_text_multiple: 'Seleccione un maximo de 1 tags',
            max_selected_options:5,
            no_results_text: 'no se encontró este tag'
        });
       
    </script>
@endsection