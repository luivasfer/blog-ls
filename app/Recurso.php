<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recurso extends Model
{
    protected $table = "recursos";

    protected $fillable = ['recurso', 'tipo', 'articulo_id'];

    //relacion con articulo
    public function articulo()
    {
        //manera inversa
        return $this->belongsTo('App\Articulo');
    }

}
