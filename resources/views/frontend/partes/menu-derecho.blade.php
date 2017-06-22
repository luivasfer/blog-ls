                <div class="col-xs-12 col-sm-3 menu-derecho">
                <h3>ÚLTIMOS ARTÍCULOS</h3>
                <div class="linea"></div>
                @foreach ($ultimosArticulos as $ultimosArticulo)
                @foreach($categorias->where('id',$ultimosArticulo->categoria_id) as $categoria)
                @endforeach
                    <a href="{{ url('articulo')}}/{{$categoria->slug}}/{{$ultimosArticulo->id}}/{{$ultimosArticulo->slug}}">
                        <div class="ultimo-articulo margin0">
                            <span class="text-left margin-bottom05">{{ ucfirst($ultimosArticulo->articulo) }}</span>
                            <span><i>{{ucwords($categoria->categoria)}}</i></span>
                        </div>
                    </a>
                @endforeach
                
                <h3>CATEGORIAS</h3>
                <div class="linea"></div>
                @foreach($listaCategorias as $listaCategoria)
                    <div class="categorias-inicio margin0">
                        <img src="{{asset('img/categorias/')}}/{{ $listaCategoria->id }}.svg" width="18" alt="{{ $listaCategoria->categoria }}">
                        <span class="text-left margin0">{{ $listaCategoria->categoria }}<TICAS></TICAS></span>
                        <span class="numero-categoria">
                            @foreach($contarArticulos as $contarArticulo)
                            @endforeach
                            {{ $contarArticulo->where('categoria_id', $listaCategoria->id)->count() }}
                        </span>
                    </div>
                @endforeach
                </div>