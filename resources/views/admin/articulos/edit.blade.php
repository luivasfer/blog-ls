@extends ('admin.template.main')
@section('titulo', 'Editar producto - '. $producto->titulo)
@section('contenido')
     {!! Form::open(['route' => ['productos.update', $producto], 'method'=>'PATCH']) !!}
     
        <div class="form-group">
            {!! Form::label('titulo', 'Producto'); !!}
            {!! Form::text('titulo', $producto->titulo, ['class'=>'form-control', 'placeholder' => 'Nombre de Producto']); !!}
        </div>

        <div class="form-group">
            {!! Form::label('categoria_id', 'Categoria') !!}
            {!! Form::select('categoria_id', $categorias, $producto->categoria->id, ['class'=>'form-control', 'placeholder'=>'Seleccionar...']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('descripcion', 'Descripción'); !!}
            {!! Form::textarea('descripcion', $producto->descripcion, ['class'=>'form-control textarea-content', 'placeholder' => 'Descripcion del Producto', 'rows'=>5]); !!}
        </div>

        <div class="form-group">
            {!! Form::label('precio', 'Precio  (Se mostrará en la sección de Ofertas)'); !!}
            {!! Form::text('precio', $producto->precio, ['class'=>'form-control', 'placeholder' => 'Precio', 'style'=>'width:6em']); !!}
        </div>

        <div class="form-group">
            {!! Form::label('tags', 'Tags') !!}
            {!! Form::select('tags[]', $tags, $my_tags, ['class'=>'form-control select-tag', 'multiple']) !!}
        </div>

        <div class="form-group">
            <a href="{{ route('productos.index') }}" class="btn btn-primary">
                <i class="glyphicon glyphicon-hand-left"></i>
            </a>
            {!! Form::submit('Editar producto',['class'=>'btn btn-primary']); !!}
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

        $('.textarea-content').trumbowyg({
            autogrow: true,
            lang: 'es',
            btns: [['bold', 'italic'], ['link'], 'btnGrp-justify', 'btnGrp-lists',['viewHTML']]
        });
       
    </script>
@endsection