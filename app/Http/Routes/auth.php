<?php

Route::get('login', function(){
    return view('auth.login');
});

Route::get('registro', function(){
    return view('auth.register');
}); 