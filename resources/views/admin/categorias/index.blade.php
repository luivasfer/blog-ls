@extends('admin.template.main')
@section('titulo', 'Lista de usuarios')
@section('contenido')

    <a href="{{ route('categorias.create') }}" class="btn btn-info">
        <i class="glyphicon glyphicon-plus-sign"></i>
     Insertar nueva categoria
    </a>
    <hr>
    <table class="table table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th></th>
                <th>Categoria</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categorias as $categoria)
            <tr>
                <td>{{ $categoria->id}}</td>
                <td><img src="{{ asset('img/categorias')}}/{{$categoria->id}}.svg" width="20" alt="{{$categoria->categoria}}"></td>
                <td>{{ ucwords($categoria->categoria) }}</td>
                <td>
                     <a href="{{ route('categorias.edit', $categoria->id) }}" class="btn btn-success btn-sm">
                        <i class="glyphicon glyphicon-edit"></i>
                    </a>
                    
                    <a href="{{ route('categorias.destroy', $categoria->id) }}" class="btn btn-danger btn-sm" onclick="return confirm('多Seguro que de seas eliminarlo?')">
                        <i class="glyphicon glyphicon-remove-circle"></i>
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="text-center">
        {{ $categorias->links() }}
    </div>

    
    

@endsection