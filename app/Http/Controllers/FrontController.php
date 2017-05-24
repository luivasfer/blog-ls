<?php

namespace App\Http\Controllers;
use App\Categoria;
use App\Articulo;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        //contamos Los articulos en las categprias
        $contarArticulos = Articulo::all();

        //dd($contarArticulos);

        $articulos = Articulo::orderBy('id','DESC')->paginate(10);
        $categorias = Categoria::all();

        $listaCategorias = Categoria::all();
         //simulamos el foreach
            // $productos->each(function($productos){
            //     //$productos->count();
            // });
            //dd($productos->id);
            //$productos->categoria;
           

        return view('frontend.index')
            ->with('articulos', $articulos)
            ->with('categorias', $categorias)
            ->with('listaCategorias', $listaCategorias)
            ->with('contarArticulos', $contarArticulos);

        //return view('frontend.repuestos');

        //return view('frontend.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
