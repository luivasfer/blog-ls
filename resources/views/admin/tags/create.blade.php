@extends ('admin.template.main')
@section('titulo', 'Crear Tag')
@section('contenido')
     {!! Form::open(['route'=>'tags.store', 'method'=>'POST']) !!}
        <div class="form-group">
            {!! Form::label('tag', 'Tag'); !!}
            {!! Form::text('tag', null, ['class'=>'form-control', 'placeholder' => 'Nombre del Tag']); !!}
        </div>

        <div class="form-group">
            <a href="{{ route('tags.index') }}" class="btn btn-primary">
                <i class="glyphicon glyphicon-hand-left"></i>
            </a>
            {!! Form::submit('Crear tag',['class'=>'btn btn-primary']); !!}
        </div>
     {!! Form::close() !!}
@endsection