<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $table = 'categorias';
    protected $primaryKey = 'id';

    public $timestamps = false;


    protected $fillable = ['name','status'];

    public function peliculas()
    {
        return $this->hasMany('App\Models\Pelicula');
    }
}
