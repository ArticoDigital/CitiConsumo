<?php

namespace City\Entities;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Pet extends Model
{
    protected $fillable = ['service_id', 'pets_quantity','puppy','adult','elderly','smoke_free','home_service'];

    public function getDateStartAttribute($value){
        return date_format(date_create($value), 'm/d/Y');
    }

    public function getDateEndAttribute($value){
        return date_format(date_create($value), 'm/d/Y');
    }
    /*public function petSizes(){
        return $this->belongsTo(PetSize::class, 'pet_sizes');
    }*/
    public function sizes()
    {
        return $this->belongsToMany(Size::class);
    }

    public function getNumberDays(){
        $days	= (strtotime($this->date_end)-strtotime($this->date_start))/86400;
        $days 	= abs($days);
        return (int) floor($days);
    }
}
