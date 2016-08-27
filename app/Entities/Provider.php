<?php

namespace City\Entities;

use Illuminate\Database\Eloquent\Model;
use City\User;

class Provider extends Model
{
    protected $fillable = ['isActive', 'user_id'];

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function providerFiles(){
        return $this->hasMany(ProviderFiles::class);
    }
    public function service(){
        return $this->hasOne(Service::class);
    }
    protected static function boot() {
        parent::boot();

        static::deleting(function($provider) { // before delete() method call this
            $provider->providerFiles()->delete();
            $provider->service()->delete();
            // do the rest of the cleanup...
        });
    }
}
