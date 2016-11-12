<?php

namespace City\Entities;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    protected $fillable = ['name'];

    public function buys(){
        return $this->hasMany(Buy::class);
    }
}
