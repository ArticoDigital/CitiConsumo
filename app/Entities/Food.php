<?php

namespace City\Entities;

use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    protected $fillable = ['food_time', 'service_id', 'food_type_id', 'foods-quantity'];

    function foodTypes(){
        return $this->belongsTo(FoodType::class);
    }

    function getFoodTimeAttribute($value){
        return date_format(date_create($value), 'm/d/Y');
    }
}
