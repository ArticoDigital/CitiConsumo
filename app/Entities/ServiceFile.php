<?php

namespace City\Entities;

use Illuminate\Database\Eloquent\Model;

class ServiceFile extends Model
{
    protected $fillable = ['name', 'service_id'];
}
