<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostalCode extends Model
{
    protected $table = 'cpostales';
    protected $primaryKey = 'id_codigopostal';
    public $timestamps = false;


    public function client(){
        return $this->hasMany(Clientes::class);
    }


}
