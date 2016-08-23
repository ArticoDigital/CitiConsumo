<?php

Route::get('login',[
    'as' => 'login',
    function(){return view('auth.login');}
]);

Route::post('login', [
    'uses' => 'Auth\AuthController@postLogin',
    'as' => 'login'
]);

Route::get('registro', [
    'as'=>'register',
    function(){return view('auth.register');}
]);

Route::post('registro', [
    'uses' => 'Auth\AuthController@postRegister',
    'as' => 'register'
]);

Route::get('logout', [
    'uses' => 'Auth\AuthController@loginOut',
    'as' => 'logout'
]);

Route::get('facebook/authorize', [
    'as' => 'facebook',
    function() {return SocialAuth::authorize('facebook');}
]);

Route::get('auth', function() {
    SocialAuth::login('facebook', function($user, $details) {
        $user->email = $details->nickname;
        $user->name = $details->full_name;
        $user->profile_image = $details->avatar;
        $user->role_id = 1;
        $user->save();
    });
    Auth::user();
    return Redirect::intended();
});