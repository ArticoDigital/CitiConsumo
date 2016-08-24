<?php

namespace City\Entities;

use Illuminate\Database\Eloquent\Model;

class Pet extends Model
{
    protected $fillable = ['date_start', 'date_end', 'service_id', 'pet_size_id', 'pet_breed_id'];
}
