<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Role extends Model
{
        protected $table = 'roles';
        protected $primaryKey = 'id';
        public $timestamps = false;

        public function users()
        {
                return $this->hasMany(User::class, 'role_id', 'id');
        }
//     public function users() {
//         return $this->belongsToMany('App\User');
//     }


}
