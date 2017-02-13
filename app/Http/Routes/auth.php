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

    dd('dsdsd');
    SocialAuth::login('facebook', function ($user, $details) {
        $emailT = $details->raw()['email'];
        //dd($details);
        $userEmail = \City\User::where('email', $emailT)->get();

        $user->email = $details->raw()['email'] ;
        //$user->image ='https://graph.facebook.com/v2.4/'.$details->userId().'/picture';
        //graph.facebook.com/v2.8/10154016435262864/picture?width=400
        //Aca se deben agregar los nombres y apellidos traidos de facebook
        if($user->name==""){
            $user->name = $details->raw()['first_name'] ;
        }
        if($user->last_name==""){
            $user->last_name = $details->raw()['last_name'] ;
        }
        if(isset($user->role_id)){
            if($user->role_id<=1){
                $user->role_id = 1;
            }
        }else{
            $user->role_id = 1;
        }
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
