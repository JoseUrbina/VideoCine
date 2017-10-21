<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pelicula extends Model
{
    protected $table = 'peliculas';
    protected $primaryKey = 'id';

    public $timestamps = false;


    protected $fillable = ['categoria_id','name','description','image','fechaLanz','status'];


    private function categoria()
    {
    	return $this->belongsTo('App\Models\Categoria');
    }

    public function peliculas()
    {
        return $this->belongsToMany('App\Models\Prestamo','detalle_prestamos');
    }
}
