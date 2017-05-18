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
        $articulos = Articulo::orderBy('id','DESC')->paginate(20);
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
        $categorias = Categoria::orderBy('categoria', 'ASC')->pluck('categoria', 'id');
        $tags = Tag::orderBy('tag', 'ASC')->pluck('tag', 'id');

        return view('admin.articulos.create')
            ->with('categorias', $categorias)
            ->with('tags', $tags);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArticuloRequest $request)
    {
        if ($request->file('img'))
        {
            $file = $request->file('img');
            $name = 'ls_articulo_' .  time() . '.' .$file->getClientOriginalExtension();
            $path = public_path(). '/img/articulos/';
            $file->move($path, $name);

            //imagen 150
            $articulos = Image::make( public_path('img/articulos/'.$name) );
            $articulos->resize(350,null, function($c){
                $c->aspectRatio();
            });
            $articulos->save('img/articulos/thumb350/'.$name);

            //imagen 350
            $articulos = Image::make( public_path('img/articulos/'.$name) );
            $articulos->resize(150,null, function($c){
                $c->aspectRatio();
            });
            $articulos->save('img/articulos/thumb150/'.$name);

            $articulos = new Articulo($request->all());
            $articulos->foto = $name;
            $articulos->save();
            
            flash("Se ha insertado a " . $articulos->name . " de forma correcta");
            //dd($articulos);
            return redirect()->route('articulos.index');
        }

//Guardamos la Imagen
        //$name = 'ls_articulo_' .  time() . '.jpg';
        // $articulos->user_id = \Auth::user()->id;
        // dd($articulos->user_id);
        // dd($articulos->user_id);
        // $articulos = new Articulo($request->all());
        // $articulos->foto = $name;
        // $articulos->save();

        // $articulos->tags()->sync($request->tags);

        // flash("Se ha insertado a " . $articulos->name . " de forma correcta");
        // //dd($user);
        // return redirect()->route('articulos.index'); 
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
