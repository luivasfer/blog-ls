@extends('admin.template.main')
@section('titulo', 'Lista de recursos')
@section('contenido')
            <div class="col-xs-12">
                <a href="{{route('recursos.create')}}" class="btn btn-info">
                    <i class="glyphicon glyphicon-plus-sign"></i>
                Insertar recurso
                </a>
            </div>
            <div class="col-xs-12">
                <hr>
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Copiar</th>
                            <th>Recurso</th>
                            <th>Usuario</th>
                            <th></th>
                            
                        </tr>
                    </thead>
                    <tbody>
                     
                        @foreach($recursos as $recurso)
                        <tr>
                            <td>{{ $recurso->id}}</td>
                            <td width="100">
                                <span class="alerta" style="cursor:pointer" onclick="copyToClipboard('#p{{ $recurso->id }}')"><img src="{{ asset('recursos/copiar.svg')}}" width="18" alt="Copiar Link" title="Copiar recurso">
                                </span>
                                <p id="p{{ $recurso->id }}" style="display:none">{{ asset('recursos/original/')}}/{{$recurso->archivo}}</p>
                                
                            </td>
                           
                            <td>
                                <?php $extension = strtolower($recurso->tipo); ?>
                                @if(($extension == 'jpg') || ($extension == 'jpeg') || ($extension == 'png') || ($extension == 'gif'))
                                    <img src="{{ asset('recursos/img.svg')}}" height="20" alt="{{ $recurso->recurso }}">
                                    <a href="" class="screenshot" rel="{{ asset('recursos/thumb150/')}}/{{$recurso->archivo }}">{{ ucwords($recurso->recurso)}}</a>
                                @else
                                    <img src="{{ asset('recursos/pdf.png')}}" height="20" alt="{{ $recurso->recurso }}">
                                    <a href="{{ asset('recursos/original/')}}/{{$recurso->archivo}}" target="_blank">{{ ucwords($recurso->recurso)}}</a>
                                @endif
                            </td>
                            
                            <td>

                                

                                <?php
                                    $nombre = $recurso->user->name; 
                                    $nombre = explode(" ",$nombre);
                                    $apellido = $recurso->user->apellido; 
                                    $apellido = explode(" ",$apellido);
                                    echo ucwords($apellido[0] . "  " . $nombre[0]); // esto muestra la primera palabra 
                                ?>
                            </td>
                            
                            <td>
                                <a href="{{ route('recursos.destroy', $recurso->id) }}" title="Eliminar" class="btn btn-danger btn-sm" onclick="return confirm('¿Seguro que de seas eliminarlo?')">
                                    <i class="glyphicon glyphicon-remove-circle"></i>
                                </a>
                            </td>

                        </tr>
                        @endforeach
                        
                    </tbody>
                </table>
                <div class="text-center">
                    {{ $recursos->links() }}
                </div>
            </div>

    
    

@endsection