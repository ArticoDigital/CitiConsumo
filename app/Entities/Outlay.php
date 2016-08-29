<?php

namespace City\Entities;

use Illuminate\Database\Eloquent\Model;

class Outlay extends Model
{
    protected $fillable = ['value', 'buys_id', 'id_user', 'provider_id', 'isPayed'];

    public function provider(){
        return $this->belongsTo(Provider::class);
    }
}
