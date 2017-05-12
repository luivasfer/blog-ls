<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $table = "tags";

    protected $fillable = ['tag'];

    //realcioin con articulos
    public function articulos()
    {
        //uno a muchos
        return $this->belongsToMany('App\Articulo')->withTimestamps();
    }
}
