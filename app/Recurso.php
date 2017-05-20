<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recurso extends Model
{
    protected $table = "recursos";

    protected $fillable = ['recurso', 'tipo', 'user_id'];

    //relacion con articulo
    public function user()
    {
        //manera inversa
        return $this->belongsTo('App\User');
    }

}
