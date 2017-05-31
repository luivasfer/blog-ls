<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Comentario;
use App\Categoria;
use App\Articulo;

class ComentariosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $articulo_id = $request->a;
        $user_id = $request->u;
        $categoria_id = $request->c;
        
        $categorias = Categoria::all()->where('id', $categoria_id);
        foreach ($categorias  as $categoria)
        {
        }

        $articulos = Articulo::all()->where('id', $articulo_id);
        foreach ($articulos  as $articulo)
        {
        }
        
        

        //$categorias = Categoria::all()->where('id', )

        $comentarios = new Comentario($request->all());
        $comentarios->user_id = $user_id;
        $comentarios->articulo_id = $articulo_id;
        $comentarios->save();

        flash("Se inserto tu comentario de forma correcta", "success");
        return redirect()->route('frontend.articulo' ,['comentario' => $categoria->slug, 'id' => $articulo->id, 'slug' => $articulo->slug]);
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
