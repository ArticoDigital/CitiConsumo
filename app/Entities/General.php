<?php

namespace City\Entities;

use Illuminate\Database\Eloquent\Model;

class General extends Model
{
    protected $fillable = ['service_id', 'general_type_id', 'date'];

    public function getDateAttribute($value){
        return date_format(date_create($value), 'm/d/Y');
    }
    public function generalType(){
        return $this->belongsTo(GeneralType::class);
    }
}
