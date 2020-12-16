<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clientes extends Model
{

    protected $table = 'clientes';
    protected $primaryKey = 'id_cliente';

    public $timestamps = false;

    public function useres(){
    	return $this->belongsTo(User::class);
    }

    public function postalcode(){
        return $this->belongsTo(PostalCode::class);
    }

    public function mascotas(){
        return $this->belongsToMany(Mascotas::class, 'adopciones', 'id_cliente');
    }
}
