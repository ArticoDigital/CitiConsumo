<?php

namespace City\Entities;

use Illuminate\Database\Eloquent\Model;

class ServiceFile extends Model
{
    protected $fillable = ['name', 'service_id','kind_file'];

    public function service(){
        return $this->belongsTo(Service::class);
    }
}
