@extends('admin.template.main')
@section('titulo', 'Lista de recursos')
@section('contenido')
            <div class="col-xs-6">
                <a href="{{route('recursos.create')}}" class="btn btn-info">
                    <i class="glyphicon glyphicon-plus-sign"></i>
                Insertar recurso
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
                            <th>Recurso</th>
                            <th>Archivo</th>
                            <th>Tipo</th>
                            <th>Usuario</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                     
                        @foreach($recursos as $recurso)
                        <tr>
                            <td>{{ $recurso->id}}</td>
                            <td>{{ ucwords($recurso->recurso)}}</td>
                            <td>
                                <?php  $extension = explode(".", $recurso->archivo); 
                                 $extension = strtolower($extension[1])
                                ?>

                                @if(($extension == 'jpg') || ($extension == 'jpeg') || ($extension == 'png') || ($extension == 'gif'))
                                    <img src="{{ asset('recursos/thumb150/')}}/{{$recurso->archivo }}" height="30" alt="{{ $recurso->recurso }}">
                                @endif

                            </td>
                            <td>
                                <?php $extension = strtolower($recurso->tipo); ?>
                                @if(($extension == 'jpg') || ($extension == 'jpeg') || ($extension == 'png') || ($extension == 'gif'))
                                    <img src="{{ asset('recursos/img.svg')}}" height="30" alt="{{ $recurso->recurso }}">
                                @else
                                    <img src="{{ asset('recursos/pdf.png')}}" height="30" alt="{{ $recurso->recurso }}">
                                @endif
                            </td>
                            <td>{{ $recurso->user->name}}</td>
                            <td>
                                {{--<a href="{{ route('usuario.edit', $user->id) }}" class="btn btn-success btn-sm">
                                    <i class="glyphicon glyphicon-edit"></i>
                                </a>
                                
                                <a href="{{ route('usuario.destroy', $user->id) }}" class="btn btn-danger btn-sm" onclick="return confirm('¿Seguro que de seas eliminarlo?')">
                                    <i class="glyphicon glyphicon-remove-circle"></i>
                                </a> --}}
                            </td>
                        </tr>
                        @endforeach
                        
                    </tbody>
                </table>
             </div>
                <div class="text-center">
                    {{-- $recursos->links() --}}
                </div>
            </div>

    
    

@endsection