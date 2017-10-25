<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Prestamo extends Model
{
	protected $table = 'prestamos';

	public $timestamps = false;
	protected $primaryKey = 'id';

    protected $fillable = [
        'cliente_id', 'fechaPrestamo', 'fechaRegreso', 'status',
    ];

    public function cliente()
    {
    	return $this->belongsTo('App\Models\Cliente');
    }

    public function peliculas()
    {
        // 1er parameter: Model which is the relationship
        // 2do parameter: intermediary table between pelicula and prestamo
        return $this->belongsToMany('App\Models\Pelicula','detalle_prestamos');
    }
}
