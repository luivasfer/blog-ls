<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Categoria extends Model
{
   
    use Sluggable;

    
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'categoria'
            ]
        ];
    }


    protected $table = "categorias";
    protected $fillable = ['categoria', 'slug'];


    //Relaciones
    //nombre del modelo de forma plural
    //realcioin con articulos
    public function articulos()
    {
        //uno a muchos
        return $this->hasMany('App\Articulo');
    }
}
