@extends('admin.template.main')
@section('titulo', 'Lista de usuarios')
@section('contenido')

            <div class="col-xs-12">
                <a href="{{route('usuario.create')}}" class="btn btn-info">
                    <i class="glyphicon glyphicon-plus-sign"></i>
                Insertar Usuario
                </a>
            </div>
            <div class="col-xs-12">
                
                <hr>
            <div class="table-responsive">

                <table id="example" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
                    <thead>
                        <tr class="fondo-blanco">
                            @if(Auth::user()->id == 1)
                            <th>ID</th>
                            @endif
                            <th>Foto</th>
                            <th>Nombres</th>
                            <th>Apellidos</th>
                            <th>Email</th>
                            <th>Curso</th>
                            <th>Nivel</th>
                            <th>Estado</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tfoot class="fondo-blanco">
                        <tr class="fondo-blanco">
                            @if(Auth::user()->id == 1)
                            <th>ID</th>
                            @endif
                            <th>Foto</th>
                            <th>Nombres</th>
                            <th>Apellidos</th>
                            <th>Email</th>
                            <th>Curso</th>
                            <th>Nivel</th>
                            <th>Estado</th>
                            <th></th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach($users as $user)
                        <tr>
                            @if(Auth::user()->id == 1)
                            <td>{{ $user->id}}</td>
                            @endif
                            <td>
                                @if($user->foto)
                                    <img src="{{ asset('img/admin/usuarios/thumb150/')}}/{{$user->foto }}" width="50" alt="{{ ucwords($user->name)}}">
                                @else
                                    @if($user->sexo == 'm')
                                        <img src="{{asset('img/masculino.png')}}" alt="masculino" width="50">
                                    @else
                                        <img src="{{asset('img/femenino.png')}}" alt="femenino" width="50">
                                    @endif    
                                @endif
                            </td>
                            <td>{{ ucwords($user->name)}}</td>
                            <td>{{ ucwords($user->apellido)}}</td>
                            <td>{{ $user->email}}</td>
                            <td>{{ $user->curso}}</td>
                            <td>
                                @if(($user->nivel == 'admin') || ($user->nivel == 'profesor'))
                                    <span class="label label-info">{!! $user->nivel !!}</span>
                                @else
                                    <span class="label label-default">{!! $user->nivel !!}</span>
                                @endif
                            </td>
                            
                            <td>
                                @if($user->estado == 1)
                                    Activado
                                @else
                                    Bloqueado
                                @endif
                                
                            </td>
                            <td>
                                <a href="{{ route('usuario.edit', $user->id) }}" class="btn btn-success btn-sm" title="Modificar">
                                    <i class="glyphicon glyphicon-edit"></i>
                                </a>
                                @if(Auth::user()->id == 1)
                                <a href="{{ route('usuario.destroy', $user->id) }}" class="btn btn-danger btn-sm" title="Eliminar" onclick="return confirm('¿Seguro que de seas eliminarlo?')">
                                    <i class="glyphicon glyphicon-remove-circle"></i>
                                </a>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                {{-- <table class="table table-hover">



                    <thead>
                        <tr>
                            @if(Auth::user()->id == 1)
                            <th>ID</th>
                            @endif
                            <th>Foto</th>
                            <th>Nombres</th>
                            <th>Apellidos</th>
                            <th>Email</th>
                            <th>Nivel</th>
                            <th>Estado</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                        <tr>
                            @if(Auth::user()->id == 1)
                            <td>{{ $user->id}}</td>
                            @endif
                            <td>
                                @if($user->foto)
                                    <img src="{{ asset('img/admin/usuarios/thumb150/')}}/{{$user->foto }}" width="50" alt="{{ ucwords($user->name)}}">
                                @else
                                    @if($user->sexo == 'm')
                                        <img src="{{asset('img/masculino.png')}}" alt="masculino" width="50">
                                    @else
                                        <img src="{{asset('img/femenino.png')}}" alt="femenino" width="50">
                                    @endif    
                                @endif
                            </td>
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
                            
                            <td>
                                @if($user->estado == 1)
                                    Activado
                                @else
                                    Bloqueado
                                @endif
                                
                            </td>
                            <td>
                                <a href="{{ route('usuario.edit', $user->id) }}" class="btn btn-success btn-sm">
                                    <i class="glyphicon glyphicon-edit"></i>
                                </a>
                                @if(Auth::user()->id == 1)
                                <a href="{{ route('usuario.destroy', $user->id) }}" class="btn btn-danger btn-sm" onclick="return confirm('¿Seguro que de seas eliminarlo?')">
                                    <i class="glyphicon glyphicon-remove-circle"></i>
                                </a>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table> --}}
            {{-- </div>
                <div class="text-center">
                    {{ $users->links() }}
                </div>
            </div> --}}
@endsection