<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $table = "categorias";

    protected $fillable = ['categoria'];


    //Relaciones
    //nombre del modelo de forma plural
    //realcioin con articulos
    public function articulos()
    {
        //uno a muchos
        return $this->hasMany('App\Articulo');
    }
}
