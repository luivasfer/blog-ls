<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Articulo;
use App\Recurso;
use App\Categoria;
use App\Tag;
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
    public function store(Request $request)
    {
        //
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
