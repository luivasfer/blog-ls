@extends ('admin.template.main')
@section('titulo', 'Lista de productos')
@section('contenido')
    <div class="row">
        <div class="col-xs-12">
            <a href="{{route('articulos.create')}}" class="btn btn-primary">
                <i class="glyphicon glyphicon-plus-sign"></i>
                Insertar articulo
            </a>
        </div>
    </div>
    <hr>
    <div class="table-responsive">
        <table id="example" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
            <thead>
                <tr class="fondo-blanco">
                    @if(Auth::user()->id == 1)
                        <th>ID</th>
                    @endif
                    <th>Imagen</th>
                    <th>Artículo</th>
                    <th>Categoria</th>
                    <th>Usuario</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tfoot class="fondo-blanco">
                <tr>
                    @if(Auth::user()->id == 1)
                        <th>ID</th>
                    @endif
                    <th>Imagen</th>
                    <th>Artículo</th>
                    <th>Categoria</th>
                    <th>Usuario</th>
                    <th>Acciones</th>
                </tr>
            </tfoot>
            <tbody>
                @foreach($articulos as $articulo)
                <tr>
                    @if(Auth::user()->id == 1)
                        <td>{{ $articulo->id}}</td>
                    @endif
                    <td>
                        <center>
                            <img src="{{ asset('img/articulos/thumb150/')}}/{{$articulo->img }}" width="80" alt="{{ ucfirst($articulo->articulo) }}">
                        </center>
                    </td>
                    <td>{{ ucfirst($articulo->articulo) }}</td>
                    <td>{{ ucwords($articulo->categoria->categoria) }}</td>
                    <td>
                        <?php
                            $nombre = $articulo->user->name; 
                            $nombre = explode(" ",$nombre);
                            $apellido = $articulo->user->apellido; 
                            $apellido = explode(" ",$apellido);
                            echo ucwords($apellido[0] . "  " . $nombre[0]); // esto muestra la primera palabra 
                        ?>
                    </td>
                    <td>
                        <a href="{{ route('articulos.edit', $articulo->id) }}" class="btn btn-success btn-sm">
                            <i class="glyphicon glyphicon-edit"></i>
                        </a>
                        
                        <a href="{{ route('articulos.destroy', $articulo->id) }}" class="btn btn-danger btn-sm" onclick="return confirm('¿Seguro que de seas eliminarlo?')">
                            <i class="glyphicon glyphicon-remove-circle"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <div class="text-center">
        {{ $articulos->links() }}
    </div>
    

@endsection
