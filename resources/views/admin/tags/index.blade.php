@extends ('admin.template.main')
@section('titulo', 'Tags')
@section('contenido')
    <div class="row">
        <div class="col-xs-6"><a href="{{ route('tags.create') }}" class="btn btn-info">
        <i class="glyphicon glyphicon-plus-sign"></i>
     Insertar nuevo Tag
    </a></div>
        <div class="col-xs-6">
            {!! Form::open(['route'=>'tags.index', 'method' => 'GET', 'class'=>'navbar-form pull-right']) !!}
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-addon">
                            <span class="glyphicon glyphicon-search"></span>
                        </div>
                        {!! Form::text('nombre', null, ['class' => 'form-control','placeholder'=>'Buscar...']) !!}
                    </div>
                </div>
            {{ Form::close() }}
        </div>
    </div>
    
    <hr>
    <table class="table table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tags</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tags as $tag)
            <tr>
                <td>{{ $tag->id}}</td>
                <td>{{ ucwords($tag->tag) }}</td>
                <td>
                    <a href="{{ route('tags.edit', $tag->id) }}" class="btn btn-success btn-sm">
                        <i class="glyphicon glyphicon-edit"></i>
                    </a>
                     <a href="{{ route('tags.destroy', $tag->id) }}" class="btn btn-danger btn-sm" onclick="return confirm('¿Seguro que de seas eliminarlo?')">
                        <i class="glyphicon glyphicon-remove-circle"></i>
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="text-center">
        {{ $tags->links() }}
    </div>
@endsection