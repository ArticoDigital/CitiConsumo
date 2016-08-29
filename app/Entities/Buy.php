<?php

namespace City\Entities;

use Illuminate\Database\Eloquent\Model;

class Buy extends Model
{
    protected $fillable = ['state_id', 'user_id', 'service_id'];

    public function service(){
        $this->belongsTo(Service::class);
    }
}
