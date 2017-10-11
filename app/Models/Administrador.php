<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Administrador extends Model
{
    protected $table = 'administradores';
    protected $primaryKey = 'id';
    public $timestamps = false;


    protected $fillable = 
    [
    	'user_id', 'cedula', 'name', 'lastname', 'address', 'phoneNumber', 'gender', 'status'
    ];

    public function user()
    {
    	return $this->belongsTo('App\Models\User');
    }
}
