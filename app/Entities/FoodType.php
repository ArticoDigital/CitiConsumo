<?php

namespace City\Entities;

use Illuminate\Database\Eloquent\Model;

class FoodType extends Model
{
    protected $fillable = ['name', 'description'];
}
