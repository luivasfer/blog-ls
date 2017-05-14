<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;
use App\Http\Requests\UserRequest;
use Laracasts\Flash\Flash;
use Image;
//use App\Http\Requests\UserRequest;


class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderBy('id','ASC')->paginate(10);
        return view('admin.usuario.index')->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.usuario.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        if ($request->file('foto')){
            $file = $request->file('foto');
            $name = 'ls_blog_img_' .  time() . '.' .$file->getClientOriginalExtension();
            $path = public_path(). '/img/admin/usuarios/';
            $file->move($path, $name);

            //INSTALAR omposer require intervention/image
            $user = Image::make( public_path('img/admin/usuarios/'.$name) );
            $user->resize(200,null, function($c){
                $c->aspectRatio();
            });
            $user->save('img/admin/usuarios/thumb150/'.$name);

            $user = new User($request->all());
            $user->password = bcrypt($request->password);
            $user->foto = $name;
            $user->save();
            flash("Se ha insertado a " . $user->name . " de forma correcta");
            //dd($user);
            return redirect()->route('usuario.index');
            
        }

//Guardamos la Imagen
        $name = 'ls_blog_img_' .  time() . '.jpg';
        $user = new User($request->all());
        $user->password = bcrypt($request->password);
        $user->foto = $name;
        $user->save();
        flash("Se ha insertado a " . $user->name . " de forma correcta");
        //dd($user);
        return redirect()->route('usuario.index');
        
        //HASTA AQUI REG
        
        /*
        $user = new User($request->all());
        $user->password = bcrypt($request->password);
        $user->save();
        flash("Se ha insertado a " . $user->name . " de forma correcta");
        //dd($user);
        return redirect()->route('usuario.index');
        */
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('admin.usuario.edit')->with('user', $user);
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
        $user = User::find($id);
        
        $user->fill($request->all());
        
        // $user->name = $request->name;
        // $user->email = $request->email;
        // $user->type = $request->type;
        $user->save();

        flash("Se modifico a " . ucwords($user->name) . " de forma correcta");
        //dd($user);
        return redirect()->route('usuario.index'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $user = User::find($id);
        $user = User::all()->where('id', $id)->first();

        

        $direccion =  public_path(). '/img/admin/usuarios/'.$user->foto;
        
        //preguntamos si existe la imagen o archivo
        if(is_file($direccion))
        {
            $path = public_path(). '/img/admin/usuarios/'.$user->foto;
            unlink($path);
                
            $path2 = public_path(). '/img/admin/usuarios/thumb150/'.$user->foto;
            unlink($path2);
            
            $user->delete();
            flash('Se ha eliminado a ' . ucwords($user->name) . ' de forma correcta' ,'danger');
            return redirect()->route('usuario.index');
        }
        else
        {
            $user->delete();
            flash('Se ha eliminado a ' . ucwords($user->name) . ' de forma correcta' ,'danger');
            return redirect()->route('usuario.index');
        }
        
           
    }
}
