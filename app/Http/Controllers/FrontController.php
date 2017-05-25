<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Categoria;
use App\Articulo;
use View;

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

    
    public function articulo($categoria, $id, $slug )
    {
        // dd($slug);
        
        //dd($categorias);
        $articulos = Articulo::all()->where('id','=',$id);
        

        //$categorias = Categoria::all()->where('slug','=',$categoria);

        //dd($articulos);
        return view('frontend.articulo')
            //->with('categorias', $categorias)
            ->with('articulos', $articulos);


        //dd($categoria. "-" . $id . "-". $slug);
        //return view('frontend.articulos');
    }
}
