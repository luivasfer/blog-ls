<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Categoria;
use App\Articulo;
use App\Comentario;
use App\User;
use View;
use Carbon\Carbon;

class FrontController extends Controller
{
    /*CAMBIAMOS de idioma*/
    public function __construct()
    {
        //Carbon::setLocale('es');
        Carbon::setLocale('es');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('frontend.index');

    }

    public function articulos()
    {
        //Comentarios
        $comentarios = Comentario::all();
        
        //contamos Los articulos en las categprias
        $contarArticulos = Articulo::all();

        //dd($contarArticulos);
        $ultimosArticulos = Articulo::where('estado','=','1')->orderBy('updated_at','DESC')->limit(3)->get();
        $listaCategorias = Categoria::all();


        $articulos = Articulo::orderBy('created_at','DESC')->paginate(10);
        $categorias = Categoria::all();

         //simulamos el foreach
            // $productos->each(function($productos){
            //     //$productos->count();
            // });
            //dd($productos->id);
            //$productos->categoria;

        return view('frontend.articulos')
            ->with('comentarios', $comentarios)
            ->with('articulos', $articulos)
            ->with('categorias', $categorias)
            ->with('listaCategorias', $listaCategorias)
            ->with('ultimosArticulos', $ultimosArticulos)
            ->with('contarArticulos', $contarArticulos);

        //return view('frontend.repuestos');

        //return view('frontend.index');
    }
    
    public function articulo($categoria, $id, $slug )
    {
        //* BARRRA DER/
        $contarArticulos = Articulo::all();
        $ultimosArticulos = Articulo::orderBy('id','DESC')->limit(5)->get();
        $listaCategorias = Categoria::all();
        $categorias = Categoria::all();
        $users = User::all();

        /*COMENTARIOS*/
        $comentarios = Comentario::where('articulo_id', $id)->orderBy('id','DESC')->get();
        foreach($comentarios as $comentario){}

        //dd($comentario->user_id);

        $usuarios = User::all();
        $articulos = Articulo::all()->where('id','=',$id);

        //$categorias = Categoria::all()->where('slug','=',$categoria);

        //dd($articulos);
        return view('frontend.articulo')
            ->with('articulos', $articulos)
            ->with('categorias', $categorias)
            ->with('listaCategorias', $listaCategorias)
            ->with('ultimosArticulos', $ultimosArticulos)
            ->with('contarArticulos', $contarArticulos)
            ->with('users', $users)
            ->with('comentarios', $comentarios)
            ->with('usuarios', $usuarios);

        //dd($categoria. "-" . $id . "-". $slug);
        //return view('frontend.articulos');
    }
}
