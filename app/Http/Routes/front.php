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

Route::get('plataforma/{service}', [
    'as' => 'platform',
    'uses' => 'MapController@index'
]);

Route::get('quienes_somos', [
    'as' => 'whoweare',
    'uses' => 'HomeController@whoweare'
]);

Route::get('preguntas_frecuentes', [
    'as' => 'faq',
    'uses' => 'HomeController@faq'
]);

Route::get('testimonios', [
    'as' => 'testimony',
    'uses' => 'HomeController@testimony'
]);

Route::get('contacto', [
    'as' => 'contact',
    'uses' => 'HomeController@contact'
]);

Route::get('contacto', [
    'uses' => 'HomeController@contact',
    'as' => 'contact'
]);

Route::post('contacto', [
    'uses' => 'HomeController@contactPost',
    'as' => 'contactPost'
]);