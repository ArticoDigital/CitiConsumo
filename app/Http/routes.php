<?php

Route::group(['prefix' => 'admin', 'namespace' => 'admin', 'middleware' => ['auth', 'roles']], function(){
    require __DIR__ . '/Routes/back.php';
});
    
require __DIR__ . '/Routes/front.php';
require __DIR__ . '/Routes/auth.php';

Route::get('mail',function(){

    Mail::send('emails.test', ['user' => 'juan'], function ($m)  {
        $m->from('no-reply@cityconsumo.com ', 'Cityconsumo');

        $m->to('juan2ramos@gmail.com','juan')->subject('Tu pago ha sido registrado!');

    });
});
Route::get('consulta/{id}', function($id){

    $zp = \City\Services\ZonaPagos::create();
    dd($zp->checkPay($id));
});

