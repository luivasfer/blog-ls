@extends ('admin.template.main')
@section('titulo', 'Editar tag ' . $tag->nombre)
@section('contenido')
     {!! Form::open(['route'=>['tags.update', $tag], 'method'=>'PATCH']) !!}
        <div class="form-group">
            {!! Form::label('tag', 'Tags'); !!}
            {!! Form::text('tag', $tag->tag, ['class'=>'form-control', 'placeholder' => 'Tag','required']); !!}
        </div>

        <div class="form-group">
            <a href="{{ route('tags.index') }}" class="btn btn-primary">
                <i class="glyphicon glyphicon-hand-left"></i>
            </a>
            {!! Form::submit('Editar tag',['class'=>'btn btn-primary']); !!}
        </div>
     {!! Form::close() !!}
@endsection