<?php

namespace City\Entities;

use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    protected $fillable = ['food_time', 'service_id', 'food_type_id'];
}
