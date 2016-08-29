<?php

namespace City\Entities;

use Illuminate\Database\Eloquent\Model;

class Buy extends Model
{
    protected $fillable = ['state_id', 'user_id', 'service_id','products_quantity'];

    public function service(){
        $this->belongsTo(Service::class);
    }

    /*
     *
     * Desembolsar desde administracion
     * Historial de pagos
     * Comentarios y calificacion
     * Dashboard
     *
     */
}
