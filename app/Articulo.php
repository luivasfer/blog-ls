<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Articulo extends Model
{

    use Sluggable;

    
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'articulo'
            ]
        ];
    }

    protected $table = "articulos";

    protected $fillable = ['articulo', 'contenido', 'slug', 'img', 'user_id', 'categoria_id'];

    //relacion con Categoria
    public function categoria()
    {
        //manera inversa
        return $this->belongsTo('App\Categoria');
    }

    //relacion con articulo
    public function user()
    {
        //manera inversa
        return $this->belongsTo('App\User');
    }

    //realcioin con recursos
    public function recursos()
    {
        //uno a muchos
        return $this->hasMany('App\Recurso');
    }

    //realcioin con TAGS
    public function tags()
    {
        //muchos a muchos
        return $this->belongsToMany('App\Tag');
    }

    //realcioin con comentarios
    public function comentario()
    {
        //uno a muchos
        return $this->hasMany('App\Comentario');
    }
}
