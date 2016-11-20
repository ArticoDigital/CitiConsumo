<?php

namespace City\Entities;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Pet extends Model
{
    protected $fillable = ['date_start', 'date_end', 'service_id', 'pet_sizes', 'pets_quantity'];

    public function getDateStartAttribute($value){
        return date_format(date_create($value), 'm/d/Y');
    }

    public function getDateEndAttribute($value){
        return date_format(date_create($value), 'm/d/Y');
    }
    public function petSizes(){
        return $this->belongsTo(PetSize::class, 'pet_sizes');
    }

    public function getNumberDays(){
        $days	= (strtotime($this->date_end)-strtotime($this->date_start))/86400;
        $days 	= abs($days);
        return (int) floor($days);
    }
}
