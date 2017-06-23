@extends('admin.template.main')
@section('titulo', 'Lista de usuarios')
@section('contenido')
    <div class="col-xs-12 col-sm-6">
        {!! Form::open(['route'=>'usuario.store', 'method'=>'POST', 'files' => true]) !!}
            <div class="form-group">
                {!! Form::label('name', 'Nombre(s)'); !!}
                {!! Form::text('name', null, ['class'=>'form-control', 'placeholder' => 'Nombre(s)']); !!}
            </div>
    </div>
    <div class="col-xs-12 col-sm-6">
            <div class="form-group">
                {!! Form::label('apellido', 'Apellido(s)'); !!}
                {!! Form::text('apellido', null, ['class'=>'form-control', 'placeholder' => 'Apellido(s)']); !!}
            </div>
    </div>
    <div class="col-xs-12">
        <div class="form-group">
            {!! Form::label('email', 'Correo electrónico'); !!}
            {!! Form::email('email', null, ['class'=>'form-control', 'placeholder' => 'tumail@gmail.com']); !!}
        </div>  
        <div class="form-group">
            {!! Form::label('password', 'Contraseña'); !!}
            {!! Form::password('password', ['class'=>'form-control', 'placeholder' => '********']); !!}
        </div>
        <div class="form-group">
            {!! Form::label('nivel', 'Nivel'); !!}
            {!! Form::select('nivel', ['Profesor' => 'profesor', 'alumno' => 'Alumno'] , null,  ['class'=>'form-control', 'placeholder' => 'Seleccionar...' ]); !!}
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
            {!! Form::select('sexo', ['m' => 'Masculino', 'f' => 'Femenino'] , null,  ['class'=>'form-control', 'placeholder' => 'Seleccionar...' ]); !!}
        </div>
    </div>
    <div class="col-xs-12">
        <div class="form-group">
            <a href="{{ route('usuario.index') }}" class="btn btn-primary">
                <i class="glyphicon glyphicon-hand-left"></i>
            </a>
            {!! Form::submit('Crear Usuario',['class'=>'btn btn-primary']); !!}
        </div>
        {!! Form::close() !!}
     </div>
@endsection