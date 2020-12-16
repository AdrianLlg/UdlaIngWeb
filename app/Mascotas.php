<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mascotas extends Model
{
   protected $table = 'mascotas';
   protected $primaryKey = 'id_mascota';
   public $timestamps = false;

   public function clientes(){
      return $this->belongsToMany(Clientes::class, 'adopciones', 'id_mascota');
  }

}
