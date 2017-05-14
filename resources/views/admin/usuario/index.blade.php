@extends('admin.template.main')
@section('titulo', 'Lista de usuarios')
@section('contenido')

            <div class="col-xs-6">
                <a href="{{route('usuario.create')}}" class="btn btn-info">
                    <i class="glyphicon glyphicon-plus-sign"></i>
                Insertar Usuario
                </a>
            </div>
            <div class="col-xs-6">
                <form class="navbar-form navbar-left  pull-right" role="search">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Search">
                    </div>
                    <button type="submit" class="btn btn-default glyphicon glyphicon-search"></button>
                </form>
            </div>
            <div class="col-xs-12">
                
                <hr>
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Foto</th>
                            <th>Nombres</th>
                            <th>Apellidos</th>
                            <th>Email</th>
                            <th>Nivel</th>
                            <th>Estado</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                        <tr>
                            <td>{{ $user->id}}</td>
                            <td>{{ $user->foto}}</td>
                            <td>{{ ucwords($user->name)}}</td>
                            <td>{{ ucwords($user->apellido)}}</td>
                            <td>{{ $user->email}}</td>
                            <td>
                                @if(($user->nivel == 'admin') || ($user->nivel == 'profesor'))
                                    <span class="label label-info">{!! $user->nivel !!}</span>
                                @else
                                    <span class="label label-default">{!! $user->nivel !!}</span>
                                @endif
                            </td>
                            <td><td>{{ $user->estado}}</td></td>
                            <td>
                                <a href="{{ route('usuario.edit', $user->id) }}" class="btn btn-success btn-sm">
                                    <i class="glyphicon glyphicon-edit"></i>
                                </a>
                                
                                <a href="{{ route('usuario.destroy', $user->id) }}" class="btn btn-danger btn-sm" onclick="return confirm('¿Seguro que de seas eliminarlo?')">
                                    <i class="glyphicon glyphicon-remove-circle"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
             </div>
                <div class="text-center">
                    {{ $users->links() }}
                </div>
            </div>

    
    

@endsection