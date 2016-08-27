<?php

namespace City\Entities;

use Illuminate\Database\Eloquent\Model;
use City\User;

class Provider extends Model
{
    protected $fillable = ['isActive', 'user_id'];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
