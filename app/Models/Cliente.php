<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = 'clientes';
    protected $primaryKey = 'id';
    protected $timestamps = false;


    protected $fillable = 
    [
    	'user_id', 'name', 'lastname', 'address', 'phoneNumber', 'gender', 'status'
    ];

    public function user()
    {
    	return $this->belongsTo('App\Models\User');
    }

    public function prestamos()
    {
        return $this->hasMany('App\Models\Prestamo');
    }
}
