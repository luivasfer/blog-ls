@extends('admin.template.main')
@section('titulo', 'Editar usuario')
@section('contenido')
    {!! Form::open(['route'=>['categorias.update', $categoria], 'method'=>'PATCH']) !!}
        <div class="form-group">
            {!! Form::label('categoria', 'Categoria'); !!}
            {!! Form::text('categoria', $categoria->categoria, ['class'=>'form-control', 'placeholder' => 'Categoria','required']); !!}
        </div>

        <div class="form-group">
            <a href="{{ route('categorias.index') }}" class="btn btn-primary">
                <i class="glyphicon glyphicon-hand-left"></i>
            </a>
            {!! Form::submit('Editar categoria',['class'=>'btn btn-primary']); !!}
        </div>
     {!! Form::close() !!}
@endsection