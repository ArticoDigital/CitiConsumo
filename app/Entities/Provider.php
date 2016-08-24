<?php

namespace City\Entities;

use Illuminate\Database\Eloquent\Model;
use City\User;

class Provider extends Model
{
    protected $fillable = ['isActive', 'user_id'];

    protected function user(){
        $this->belongsTo(User::class);
    }
}
