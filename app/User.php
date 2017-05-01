<?php

namespace City;

use City\Entities\Buy;
use City\Entities\Provider;
use City\Entities\Role;
use Illuminate\Foundation\Auth\User as Authenticatable;

class   User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [ 'name', 'second_name', 'last_name',
                            'second_last_name', 'location',
                            'profile_image', 'address', 'birthday',
                            'phone', 'cellphone', 'bank_account_number',
                            'bank_type_account', 'bank_name', 'user_identification',
                            'email', 'role_id', 'birthday', 'password'
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
        return $this->hasOne(Provider::class);
    }
    public function isAdmin(){
        if($this->role_id == 3){
            return true;
        }
        return false;
        //return $this->hasOne(Provider::class);
    }

    public function role()
    {
        return $this->hasOne(Role::class, 'id', 'role_id');
    }
    public function getBirthdayAttribute($value){

        return ($value == "0000-00-00")?'':$value;
    }

    public function buys(){
        return $this->hasMany(Buy::class);
    }
}
