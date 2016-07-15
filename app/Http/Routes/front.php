<?php

Route::get('/', [
    'as' => 'home',
    'uses' => 'HomeController@homeIndex'
]);

Route::get('mascotas', [
    'as' => 'pets',
    'uses' => 'HomeController@petsIndex'
]);

Route::get('servicios-generales', [
    'as' => 'services',
    'uses' => 'HomeController@servicesIndex'
]);

Route::get('alimentos', [
    'as' => 'foods',
    'uses' => 'HomeController@foodsIndex'
]);

Route::get('plataforma', function(){
    return view('front.platform');
});