<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Articulo;
use App\Recurso;
use App\Categoria;
use App\Tag;
use App\Http\Requests\ArticuloRequest;
use Laracasts\Flash\Flash;
use Image;


class ArticulosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        //$productos = Articulo::buscador($request->articulo)->orderBy('id','DESC')->paginate(20);
            $usuario = auth()->user()->id;
            if($usuario == 1){
                $articulos = Articulo::all();
            }else{
                $articulos = Articulo::where('user_id', $usuario)->orderBy('updated_at', 'DESC')->get();
            }
            
            
            $recursos = Recurso::all();
            $articulos->each(function($articulos){
                $articulos->categoria;
                $articulos->user;
            });

            return view('admin.articulos.index')
                ->with('recursos', $recursos)
                ->with('articulos', $articulos);
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(\Auth::user()->nivel == "admin" || \Auth::user()->nivel == "profesor")
        {
            $categorias = Categoria::orderBy('categoria', 'ASC')->pluck('categoria', 'id');
            $tags = Tag::orderBy('tag', 'ASC')->pluck('tag', 'id');

            return view('admin.articulos.create')
                ->with('categorias', $categorias)
                ->with('tags', $tags);
        }else{
            echo"
                <script>
                    window.history.back(-1);
                </script>
            ";
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArticuloRequest $request)
    {
        //dd($request->tags);
       
        

        if ($request->file('img'))
        {
            $file = $request->file('img');
            $name = 'ls_articulo_' .  time() . '.' .$file->getClientOriginalExtension();
            $path = public_path(). '/img/articulos/original/';
            $file->move($path, $name);

            //imagen 150
            $articulos = Image::make( public_path('img/articulos/original/'.$name) );
            $articulos->resize(350,null, function($c){
                $c->aspectRatio();
            });
            $articulos->save('img/articulos/thumb350/'.$name);

            //imagen 350
            $articulos = Image::make( public_path('img/articulos/original/'.$name) );
            $articulos->resize(150,null, function($c){
                $c->aspectRatio();
            });
            $articulos->save('img/articulos/thumb150/'.$name);

            $articulos = new Articulo($request->all());
            $articulos->user_id = \Auth::user()->id;
            
            $articulos->img = $name;
            $articulos->save();
            
            //llamamos al metodo tags()
            //sync -> rellena la tabla pibote 
            $articulos->tags()->sync($request->tags);
            

            flash("Se inserto el artículo " . $articulos->articulo . " de forma correcta");
            //dd($articulos);
            return redirect()->route('articulos.index');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $articulo = Articulo::find($id);
        //relacion con categoria
        $articulo->categoria;
        //dd($articulo->categoria);
        $categorias = Categoria::orderBy('categoria', 'DESC')->pluck('categoria','id');
        $tags = Tag::orderBy('tag', 'DESC')->pluck('tag','id');

        //realcion con tags (transformamos objeto a un arrar ToArray)
        //pluck -> listamos los obtjetos y convertimos en array
        $my_tags = $articulo->tags->pluck('id')->ToArray();
        //dd($my_tags);
        
        //dd($articulo->user_id);
        //dd (\Auth::user()->id);

        if((\Auth::user()->id == $articulo->user_id) OR (\Auth::user()->id == 1) ){

            return view('admin.articulos.edit')
            ->with('categorias', $categorias)
            ->with('articulo', $articulo)
            ->with('tags', $tags)
            ->with('my_tags', $my_tags);
        }

        echo '
            <script>
                window.history.back(); 
            </script>
        ';

        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $articulo = Articulo::find($id);
        if ($request->file('img'))
        {
            $nombreImagen = explode(".", $articulo->img);

            $file = $request->file('img');
            $name = $nombreImagen[0]. '.' .$file->getClientOriginalExtension();

            //ELIMINAMOS IMG ALMACENADA
            $path = public_path(). '/img/articulos/original/'.$articulo->img;
            unlink($path);
                
            $path2 = public_path(). '/img/articulos/thumb150/'.$articulo->img;
            unlink($path2);

            $path3 = public_path(). '/img/articulos/thumb350/'.$articulo->img;
            unlink($path3);

            $path = public_path(). '/img/articulos/original/';

            $file->move($path, $name);

            //INSTALAR omposer require intervention/image
            $articulo1 = Image::make( public_path('img/articulos/original/'.$name) );
            $articulo1->resize(150,null, function($c){
                $c->aspectRatio();
            });
            $articulo1->save('img/articulos/thumb150/'.$name);

            $articulo2 = Image::make( public_path('img/articulos/original/'.$name) );
            $articulo2->resize(350,null, function($c){
                $c->aspectRatio();
            });
            $articulo2->save('img/articulos/thumb350/'.$name);

            $articulo->articulo = $_POST['articulo'];
            $articulo->categoria_id = $_POST['categoria_id'];
            $articulo->contenido = $_POST['contenido'];
            $articulo->estado = $_POST['estado'];
            $articulo->img = $name;
            
            $articulo->save();
            
            //llamamos al metodo tags()
            //sync -> rellena la tabla pibote 
            $articulo->tags()->sync($request->tags);
            

            flash("Se modificó el artículo " . $articulo->articulo . " de forma correcta");
            //dd($articulos);
            return redirect()->route('articulos.index');
        }
        //dd($articulo->img);


        $articulo->articulo = $_POST['articulo'];
        $articulo->categoria_id = $_POST['categoria_id'];
        $articulo->contenido = $_POST['contenido'];
        $articulo->estado = $_POST['estado'];
        



        $articulo->save();
        //llamamos al metodo tags()
        //sync -> rellena la tabla pibote 
        $articulo->tags()->sync($request->tags);
        flash("Se modificó el articulo " . $articulo->articulo . " de forma correcta");
            //dd($articulos);
            return redirect()->route('articulos.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $articulo = Articulo::find($id);
        

        //$articulo = Articulo::all()->where('id', $id)->first();

        $direccion =  public_path(). '/img/articulos/original/'.$articulo->img;
        if(is_file($direccion))
        {
            //dd($articulo);
            $path = public_path(). '/img/articulos/original/'.$articulo->img;
            unlink($path);
                
            $path2 = public_path(). '/img/articulos/thumb150/'.$articulo->img;
            unlink($path2);
            
            $path3 = public_path(). '/img/articulos/thumb350/'.$articulo->img;
            unlink($path3);
            
            $articulo->delete();
            flash('Se eliminó el artículo ' . ucwords($articulo->articulo) . ' de forma correcta' ,'danger');
            return redirect()->route('articulos.index');
        }else{
            
            $articulo->delete();
            flash('Se eliminó el artículo ' . ucwords($articulo->articulo) . ' de forma correcta' ,'danger');
            return redirect()->route('articulos.index');
        }
    }
}
