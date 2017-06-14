<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Recurso;
use App\Http\Requests\RecursoRequest;
use Laracasts\Flash\Flash;
use Image;


class RecursosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuario = auth()->user()->id;
        if($usuario == 1){
            $recursos = Recurso::orderBy('id','DESC')->paginate(20);
        }else{
            $recursos = Recurso::where('user_id', $usuario)->orderBy('id','DESC')->paginate(20);
        }
        
        return view('admin.recursos.index')
            ->with('recursos', $recursos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('admin.recursos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RecursoRequest $request)
    {
         $file = $request->file('archivo');
         
         $name = 'ls_recurso_' .  time() . '.' .$file->getClientOriginalExtension();
         
         $extension =  explode(".", $name);
         
         if($extension[1] == 'pdf'){
            $path = public_path(). '/recursos/original/';
            $file->move($path, $name);

            $recursos = new Recurso($request->all());
            $recursos->user_id = \Auth::user()->id;

            $recursos->archivo = $name;
            $recursos->tipo = $extension[1];
            $recursos->save();

            flash("Se insertó el recurso " . $recursos->recurso . " de forma correcta");
            //dd($articulos);
            return redirect()->route('recursos.index');

         }else{
            $path = public_path(). '/recursos/original/';
            $file->move($path, $name);

            //imagen 350
            $recursos = Image::make( public_path('recursos/original/'.$name) );
            $recursos->resize(350,null, function($c){
                $c->aspectRatio();
            });
            $recursos->save('recursos/thumb350/'.$name);

            //imagen 150
            $recursos = Image::make( public_path('recursos/original/'.$name) );
            $recursos->resize(150,null, function($c){
                $c->aspectRatio();
            });
            $recursos->save('recursos/thumb150/'.$name);
            
            $recursos = new Recurso($request->all());
            $recursos->user_id = \Auth::user()->id;

            $recursos->archivo = $name;
            $recursos->tipo = $extension[1];
            $recursos->save();

            flash("Se insertó el recurso " . $recursos->recurso . " de forma correcta");
            //dd($articulos);
            return redirect()->route('recursos.index');
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
        $recurso = Recurso::find($id);

        $direccion =  public_path(). '/recursos/original/'.$recurso->archivo;
        if(is_file($direccion))
        {
            //dd($articulo);
            $path = public_path(). '/recursos/original/'.$recurso->archivo;
            unlink($path);
                
            $path2 = public_path(). '/recursos/thumb150/'.$recurso->archivo;
            unlink($path2);
            
            $path3 = public_path(). '/recursos/thumb350/'.$recurso->archivo;
            unlink($path3);
            
            $recurso->delete();
            flash('Se eliminó el artículo ' . ucwords($recurso->recurso) . ' de forma correcta' ,'danger');
            return redirect()->route('recursos.index');
        }else{
            
            $recurso->delete();
            flash('Se eliminó el artículo ' . ucwords($recurso->recurso) . ' de forma correcta' ,'danger');
            return redirect()->route('recursos.index');
        }
    }
}
