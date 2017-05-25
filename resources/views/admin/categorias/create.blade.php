@extends('admin.template.main')
@section('titulo', 'Lista de usuarios')
@section('contenido')
    {!! Form::open(['route'=>'categorias.store', 'method'=>'POST', 'files' => false]) !!}
        <div class="form-group">
            {!! Form::label('categoria', 'Categoria (Nombre de la materia)'); !!}
            {!! Form::text('categoria', null, ['class'=>'form-control', 'placeholder' => 'Nombre de Categoria']); !!}
        </div>

        <div class="form-group">
            <a href="{{ route('categorias.index') }}" class="btn btn-primary">
                <i class="glyphicon glyphicon-hand-left"></i>
            </a>
            {!! Form::submit('Crear categoria',['class'=>'btn btn-primary']); !!}
        </div>
     {!! Form::close() !!}
@endsection