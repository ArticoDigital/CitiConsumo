<?php

namespace City\Entities;

use Illuminate\Database\Eloquent\Model;
use City\User;

class Buy extends Model
{
    protected $fillable = [
        'state_id', 'user_id', 'service_id',
        'products_quantity', 'zp_ticket_id',
        'zp_form_pay', 'zp_state', 'zp_pay_id', 'value'
    ];

    public function service(){
        return $this->belongsTo(Service::class);
    }

    public function state(){
        return $this->belongsTo(State::class);
    }
    
    public function user(){
        return $this->belongsTo(User::class);
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
