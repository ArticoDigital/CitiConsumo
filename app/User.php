<?php

namespace City;

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
                            'email', 'password', 'role_id', 'birthday'
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

    public function role()
    {
        return $this->hasOne(Role::class, 'id', 'role_id');
    }
    public function getBirthdayAttribute($value){

        return ($value == "0000-00-00")?'':$value;

    }
}
