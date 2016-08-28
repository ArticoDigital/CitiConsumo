<?php

namespace City\Entities;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = ['name', 'location', 'description', 'isValidate', 'isActive', 'provider_id', 'price', 'lat', 'lng'];

    public function provider(){
        return $this->belongsTo(Provider::class);
    }
    public function pet(){
        return $this->hasOne(Pet::class);
    }
    public function food(){
        return $this->hasOne(Food::class);
    }
    
    public function general(){
        return $this->hasOne(General::class);
    }

    protected static function boot() {
        parent::boot();

        static::deleting(function($service) { // before delete() method call this
            $service->pet()->delete();
            $service->food()->delete();
            $service->general()->delete();
            // do the rest of the cleanup...
        });
    }
}
