<?php

namespace City\Entities;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = ['name', 'location', 'description', 'isValidate', 'isActive', 'provider_id', 'price', 'lat', 'lng','service_addition','address_more_info','rate_type','experience_type_id','date_start','date_end','days','hour1','hour2','inmediate_response','response_type_id','service_type_id','terms_conditions'];

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

    public function serviceFiles(){
        return $this->hasMany(ServiceFile::class);
    }

    public function buys(){
        return $this->hasMany(Buy::class);
    }

    public function serviceType(){
        return $this->belongsTo(ServiceType::class);
    }
    public function rateType(){
        return $this->belongsTo(RateType::class);
    }
    public function experienceType(){
        return $this->belongsTo(ExperienceType::class);
    }
    public function responseType(){
        return $this->belongsTo(ResponseType::class);
    }

    public function getPriceAttribute($value){
        return number_format($value, 0, " ", ".");
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
