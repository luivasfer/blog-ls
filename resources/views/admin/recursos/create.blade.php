@extends ('admin.template.main')
@section('titulo', 'Crear recurso')
@section('contenido')
     {!! Form::open(['route' => 'recursos.store', 'method'=>'POST', 'files' => true]) !!}
     
        <div class="form-group">
            {!! Form::label('recurso', 'Título del Recurso'); !!}
            {!! Form::text('recurso', null, ['class'=>'form-control', 'placeholder' => 'Nombre de Recurso']); !!}
        </div>

        <div class="form-group">
            {!! Form::label('archivo', 'Seleccionar tu recurso (formatos permitidos, .png, .jpg, .jpeg, .pdf)'); !!}
            {!! Form::file('archivo',['class'=>'form-control', 'accept'=>'.png, .jpg, .jpeg, .pdf']); !!}
        </div>

        <div class="form-group">
            <a href="{{ route('recursos.index') }}" class="btn btn-primary">
                <i class="glyphicon glyphicon-hand-left"></i>
            </a>
            {!! Form::submit('Crear recurso',['class'=>'btn btn-primary']); !!}
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