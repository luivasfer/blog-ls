@extends('admin.template.main')
@section('titulo', 'Editar usuario')
@section('contenido')

<div class="col-xs-12 col-sm-6">
    {!! Form::open(['route'=>['usuario.update', $user], 'method'=>'PATCH', 'files' => true]) !!}
        <div class="form-group">
            {!! Form::label('name', 'Nombre(s)'); !!}
            {!! Form::text('name', $user->name, ['class'=>'form-control', 'placeholder' => 'Nombre(s)','required']); !!}
        </div>
</div>
<div class="col-xs-12 col-sm-6">
        <div class="form-group">
            {!! Form::label('apellido', 'Apellido'); !!}
            {!! Form::text('apellido', $user->apellido, ['class'=>'form-control', 'placeholder' => 'Apellido(s)','required']); !!}
        </div>
</div>
<div class="col-xs-12">
        <div class="form-group">
            {!! Form::label('email', 'Correo electrónico'); !!}
            {!! Form::email('email', $user->email, ['class'=>'form-control', 'placeholder' => 'tumail@gmail.com','required']); !!}
        </div>
        <div class="form-group">
            {!! Form::label('nivel', 'Nivel'); !!}
            {!! Form::select('nivel', ['profesor' => 'Profesor', 'alumno' => 'Alumno'], $user->nivel, ['class'=>'form-control']); !!}
        </div>
        <div class="form-group">
            {!! Form::label('estado', 'Estado'); !!}
            {!! Form::select('estado', [1 => 'Acivado', 0 => 'Desactivado'] , $user->estado,  ['class'=>'form-control' ]); !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-6">
        <div class="from-group">
            {!! Form::label('foto', 'Foto'); !!}
            {!! Form::file('foto',['class' => 'form-control', 'accept' => 'image/png, .jpeg, .jpg', 'id'=>'input10']); !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-6">
        <div class="form-group">
            {!! Form::label('sexo', 'Sexo'); !!}
            {!! Form::select('sexo', ['m' => 'Masculino', 'f' => 'Femenino'] , $user->sexo,  ['class'=>'form-control', 'placeholder' => 'Seleccionar...' ]); !!}
        </div>
    </div>
    <div class="col-xs-12">
        <div class="form-group">
            <a href="{{ route('usuario.index') }}" class="btn btn-primary">
                <i class="glyphicon glyphicon-hand-left"></i>
            </a>
            {!! Form::submit('Editar Usuario',['class'=>'btn btn-primary']); !!}
        </div>
     {!! Form::close() !!}
</div>
@endsection