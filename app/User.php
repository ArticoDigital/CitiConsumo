<?php

namespace City;

use City\Entities\Provider;
use City\Entities\Role;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','role_id','birthday'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected function provider(){
        $this->hasOne(Provider::class);
    }

    public function role()
    {
        return $this->hasOne(Role::class, 'id', 'role_id');
    }
}
