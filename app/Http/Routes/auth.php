<?php

Route::get('login', [
    'as' => 'login',
    function () {
        return view('auth.login');
    }
]);

Route::post('login', [
    'uses' => 'Auth\AuthController@postLogin',
    'as' => 'login'
]);

Route::get('registro', [
    'as' => 'register',
    function () {
        return view('auth.register');
    }
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
    function () {
        return SocialAuth::authorize('facebook');
    }
]);

Route::get('auth', function () {
    SocialAuth::login('facebook', function ($user, $details) {
        $emailT = $details->raw()['email'];

        $userEmail = \City\User::where('email', $emailT)->get();

        $user->email = $details->raw()['email'] ;
        $user->name = $details->raw()['full_name'];
        $user->role_id = 1;
        $user->save();

    });
    Auth::user();
    return Redirect::intended();

});

// Password reset link request routes...
Route::get('password/email', ['uses' => 'Auth\PasswordController@getEmail', 'as' => 'getEmail']);
Route::post('password/email', ['uses' => 'Auth\PasswordController@postEmail', 'as' => 'postEmail']);

// Password reset routes...
Route::get('password/reset/{token}', ['uses' => 'Auth\PasswordController@getReset', 'as' => 'getReset']);
Route::post('password/reset', ['uses' => 'Auth\PasswordController@postReset', 'as' => 'postReset']);
