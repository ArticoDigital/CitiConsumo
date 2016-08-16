<?php

Route::group(['prefix' => 'admin', 'namespace' => 'admin', 'middleware' => 'auth'], function(){
    require __DIR__ . '/Routes/back.php';
});
    
require __DIR__ . '/Routes/front.php';
require __DIR__ . '/Routes/auth.php';
