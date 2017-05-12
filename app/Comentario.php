<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    protected $table = "comentarios";

    protected $fillable = ['comentario', 'user_id', 'categoria_id'];

    //relacion con Usuario
    public function user()
    {
        //manera inversa
        return $this->belongsTo('App\User');
    }
    //relacion con Articulo
    public function articulo()
    {
        //manera inversa
        return $this->belongsTo('App\Articulo');
    }
}
