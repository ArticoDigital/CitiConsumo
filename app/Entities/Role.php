<?php

namespace City\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User;

class Role extends Model
{
    protected $fillable = ['name'];
    protected $table = 'roles';

    public function users()
    {
        return $this->hasMany(User::class, 'role_id', 'id');
    }

}
