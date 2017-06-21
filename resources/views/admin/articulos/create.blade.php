@extends ('admin.template.main')
@section('titulo', 'Crear articulo')
@section('contenido')
     {!! Form::open(['route' => 'articulos.store', 'method'=>'POST', 'files' => true]) !!}
     
        <div class="row">
            <div class="col-xs-12 col-sm-9">
                <div class="form-group">
                    {!! Form::label('articulo', 'Título del Articulo'); !!}
                    {!! Form::text('articulo', null, ['class'=>'form-control', 'placeholder' => 'Nombre de Articulo']); !!}
                </div>
            </div>
            <div class="col-xs-12 col-sm-3">
                <div class="form-group">
                    {!! Form::label('categoria_id', 'Categoria') !!}
                    {!! Form::select('categoria_id', $categorias, null, ['class'=>'form-control', 'placeholder'=>'Seleccionar...']) !!}
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-12 col-sm-9">
                <div class="form-group">
                    {!! Form::label('contenido', 'Contenido'); !!}
                    {!! Form::textarea('contenido', null, ['class'=>'form-control editor', 'placeholder' => 'Contenido', 'rows'=>5]); !!}
                </div>
            </div>
            <div class="col-xs-12 col-sm-3">
                <div class="form-group">
                    {!! Form::label('img', 'Imagen'); !!}
                    {!! Form::file('img',['class'=>'form-control', 'accept'=>'.png, .jpg, .jpeg']); !!}
                </div>

                <div class="switch-field">
                    <p><strong>¿Publicar Ahora?</strong></p>
                    <input type="radio" id="switch_left" name="estado" value="1"/>
                    <label for="switch_left">SI</label>
                    <input type="radio" id="switch_right" name="estado" value="0" checked/>
                    <label for="switch_right">NO</label>
                </div>
                <br>
                <div class="form-group">
                    <a href="{{ route('articulos.index') }}" class="btn btn-primary">
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