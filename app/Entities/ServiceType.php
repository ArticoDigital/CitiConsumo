<?php

namespace City\Entities;

use Illuminate\Database\Eloquent\Model;

class ServiceType extends Model
{
    //

    protected $fillable = ['name', 'description','kind_service_id'];

    function kindServices(){

        return $this->belongsTo(KindService::class, 'kind_service_id');
    }
}
