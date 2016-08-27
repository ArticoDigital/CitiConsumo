<?php

namespace City\Entities;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = ['name', 'location', 'description', 'isValidate', 'isActive', 'provider_id'];

    public function pet(){
        return $this->belongsTo(Pet::class);
    }
    public function food(){
        return $this->belongsTo(Food::class);
    }
    public function general(){
        return $this->belongsTo(General::class);
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
