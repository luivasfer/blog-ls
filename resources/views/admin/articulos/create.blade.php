@extends ('admin.template.main')
@section('titulo', 'Crear articulo')
@section('contenido')
     {!! Form::open(['route' => 'articulos.store', 'method'=>'POST', 'files' => true]) !!}
     
        <div class="form-group">
            {!! Form::label('articulo', 'Articulo'); !!}
            {!! Form::text('articulo', null, ['class'=>'form-control', 'placeholder' => 'Nombre de Articulo']); !!}
        </div>

        <div class="form-group">
            {!! Form::label('categoria_id', 'Categoria') !!}
            {!! Form::select('categoria_id', $categorias, null, ['class'=>'form-control', 'placeholder'=>'Seleccionar...']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('descripcion', 'Descripción'); !!}
            {!! Form::textarea('descripcion', null, ['class'=>'form-control', 'placeholder' => 'Descripcion del Producto', 'rows'=>5]); !!}
        </div>

        <div class="form-group">
            {!! Form::label('nombre', 'Imagen'); !!}
            {!! Form::file('nombre',['class'=>'form-control', 'accept'=>'.png, .jpg, .jpeg']); !!}
        </div>
        
        <div class="form-group">
            {!! Form::label('tags', 'Tags') !!}
            {!! Form::select('tags[]', $tags, null, ['class'=>'form-control select-tag', 'multiple']) !!}
        </div>

        <div class="form-group">
            <a href="{{ route('articulos.index') }}" class="btn btn-primary">
                <i class="glyphicon glyphicon-hand-left"></i>
            </a>
            {!! Form::submit('Crear producto',['class'=>'btn btn-primary']); !!}
        </div>
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