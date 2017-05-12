<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recurso extends Model
{
    protected $table = "recursos";

    protected $fillable = ['recurso', 'tipo', 'articulo_id'];
}
