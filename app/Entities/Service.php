<?php

namespace City\Entities;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = ['name', 'location', 'description', 'isValidate', 'isActive', 'provider_id'];
}
