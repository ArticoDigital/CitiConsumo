<?php

Route::get('/', function(){
   return view('back.dashboard');
});

Route::get('perfil', function(){
    return view('back.profile');
});

Route::get('desembolso', function(){
    return view('back.outlay');
});

Route::get('checkout', function(){
    return view('back.checkout');
});

Route::get('confirmar-compra', function(){
    return view('back.shopConfirm');
});

Route::get('postular-servicio', [
    'as' => 'addService',
    'uses' => 'AdminController@addService'
]);

Route::post('postular-servicio', [
    'as' => 'newService',
    'uses' => 'AdminController@newService'
]);

Route::get('subir-archivos', [
    'as' => 'uploadFiles',
    'uses' => 'AdminController@uploadFiles'
]);

Route::get('perfil', [
    'as' => 'profile',
    'uses' => 'AdminController@profile'
]);