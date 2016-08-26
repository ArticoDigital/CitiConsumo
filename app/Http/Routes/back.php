<?php

Route::get('/', [
    'uses' => function() {
        return view('back.dashboard');
    },
]);

Route::get('mi-perfil', [
    'as' => 'myProfile',
    'uses' => 'AdminController@myProfile',
]);

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
    'uses' => 'AdminController@addService',
    'roles' => 2
]);

Route::post('postular-servicio', [
    'as' => 'newService',
    'uses' => 'AdminController@newService',
    'roles' => 2
]);


Route::get('subir-archivos/{id}', [
    'as' => 'uploadFiles',
    'uses' => 'AdminController@uploadFiles',
    'roles' => 1
]);

Route::post('uploadFile', [
    'uses' => 'AdminController@uploadFile',
    'as' => 'uploadFile'
]);

Route::get('perfil/{id}', [
    'as' => 'profile',
    'uses' => 'AdminController@profile',
    'roles' => 3
]);

Route::post('updateUser', [
    'uses' => 'AdminController@updateUser',
    'as' => 'updateUser'
]);

Route::post('uploadUserFileFields', [
    'uses' => 'AdminController@uploadUserFileFields',
    'as' => 'uploadUserFileFields'
]);
