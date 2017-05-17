@extends ('admin.template.main')
@section('titulo', 'Lista de productos')
@section('contenido')
    <div class="row">
        <div class="col-xs-6"><a href="{{route('articulos.create')}}" class="btn btn-info">
        <i class="glyphicon glyphicon-plus-sign"></i>
     Insertar nuevo articulo
    </a></div>
        <div class="col-xs-6">
            {!! Form::open(['route'=>'articulos.index', 'method' => 'GET', 'class'=>'navbar-form pull-right']) !!}
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-addon">
                            <span class="glyphicon glyphicon-search"></span>
                        </div>
                        {!! Form::text('titulo', null, ['class' => 'form-control','placeholder'=>'Buscar articulo...']) !!}
                    </div>
                </div>
            {{ Form::close() }}
        </div>
    </div>
    <hr>
    <table class="table table-hover">
        <thead>
            <tr>
                @if(Auth::user()->name == 'admin')
                    <th>ID</th>
                @endif
                <th>Imagen</th>
                <th>Artículo</th>
                <th>Categoria</th>
                @if(Auth::user()->name == 'admin')
                    <th>Usuario</th>
                @endif
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($articulos as $articulo)
            <tr>
                @if(Auth::user()->name == 'admin')
                    <td>{{ $articulo->id}}</td>
                @endif
                <td>
                    @foreach($imagenes->where('articulo_id','=',$articulo->id) as $imagen)
                    @endforeach
                    <img src="{{ asset('img/articulos/thumb200/') }}/{{$imagen->nombre}}" alt="{{$articulo->titulo}}" width="60">
                    
                </td>
                <td>{{ ucfirst($articulo->titulo) }}</td>
                <td>{{ ucwords($articulo->categoria->marca) }}</td>
                @if(Auth::user()->name == 'admin')
                    <td>{{ ucwords($articulo->user->name) }}</td>
                @endif
                <td>
                    {{-- <a href="{{ route('articulos.edit', $articulo->id) }}" class="btn btn-success btn-sm">
                        <i class="glyphicon glyphicon-edit"></i>
                    </a>
                    <a href="{{ route('articulos.destroy', $articulo->id) }}" class="btn btn-danger btn-sm" onclick="return confirm('¿Seguro que de seas eliminarlo?')">
                        <i class="glyphicon glyphicon-remove-circle"></i>
                    </a> --}}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="text-center">
        {{ $articulos->links() }}
    </div>
    

@endsection
