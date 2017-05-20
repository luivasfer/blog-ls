<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','apellido', 'email', 'password', 'foto', 'telefono', 'ci', 'sexo', 'estado', 'nivel'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    //relacion articulo
    public function articulos()
    {
        //uno a muchos
        return $this->hasMany('App\Articulo');
    }

    //relacion Comentario
    public function comentarios()
    {
        //uno a muchos
        return $this->hasMany('App\Comentario');
    }
    //realcioin con recursos
    public function recursos()
    {
        //uno a muchos
        return $this->hasMany('App\Recurso');
    }
    
}
