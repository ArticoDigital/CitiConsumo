<?php

Route::get('login', function(){
    return view('auth.login');
});

Route::get('registro', ['as'=>'register', function(){
    return view('auth.register');
}]);

Route::post('registro', [
        'uses' => 'Auth\AuthController@postRegister',
        'as' => 'register'
    ]
);
Route::get('facebook/authorize', ['as' => 'facebook', function() {
    return SocialAuth::authorize('facebook');
}]);
Route::get('auth', function() {
    SocialAuth::login('facebook', function($user, $details) {
        $user->nickname = $details->nickname;
        $user->name = $details->full_name;
        $user->profile_image = $details->avatar;
        dd($details);
    });
});