<?php

namespace App;
use App\Role;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable
{
    use Notifiable;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    public $timestamps = false;

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id', 'id');
        // return $this->belongsTo(Role::class);
    }

    public function client(){
        return $this->hasOne(Clientes::class);
    }


    // public function assignRole(Role $role){
    //     return $this->roles()->save($role);
    // }

    public function isAdmin(){
        if($this->role->name=='admin'){
            return true;
        }   
        else{
            return false;
        }
    }

    // public function isUser(){
    //     if($this->roles['name'] =='user'){
    //         return true;
    //     }else{
    //         return false;
    //     }
    // }

}
