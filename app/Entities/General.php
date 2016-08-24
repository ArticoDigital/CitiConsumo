<?php

namespace City\Entities;

use Illuminate\Database\Eloquent\Model;

class General extends Model
{
    protected $fillable = ['name', 'service_id', 'general_type_id'];
}
