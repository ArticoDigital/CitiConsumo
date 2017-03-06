<?php

namespace City\Entities;

use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    //
    protected $fillable = ['name', 'description'];
    public function pets()
    {
        return $this->belongsToMany('Pet');
    }
}
