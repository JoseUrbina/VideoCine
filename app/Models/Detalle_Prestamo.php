<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Detalle_Prestamo extends Model
{
    protected $table = 'detalle_prestamos';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = ['pelicula_id', 'prestamo_id'];
}
