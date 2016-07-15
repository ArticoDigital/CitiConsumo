<?php

Route::get('/', function () {
    return view('front.home');
});

Route::get('mascotas', function(){
    return view('front.pets');
});

Route::get('servicios-generales', function(){
    return view('front.generalServices');
});

Route::get('alimentos', function(){
    return view('front.foods');
});

Route::get('plataforma', function(){
    return view('front.platform');
});

