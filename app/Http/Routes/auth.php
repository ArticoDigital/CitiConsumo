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
    try {
        SocialAuth::login('facebook', function ($user, $details) {
            $emailT = $details->raw()['email'];
            $userEmail = \City\User::where('email', $emailT)->get();

            $user->email = $details->raw()['email'];

            //$user->image ='https://graph.facebook.com/v2.4/'.$details->userId().'/picture';
            //graph.facebook.com/v2.8/10154016435262864/picture?width=400
            //Aca se deben agregar los nombres y apellidos traidos de facebook
            if ($user->name == "") {
                $user->name = $details->raw()['first_name'];
            }
            if ($user->last_name == "") {
                $user->last_name = $details->raw()['last_name'];
            }

            if (isset($user->role_id)) {
                if ($user->role_id <= 1) {
                    $user->role_id = 1;
                }
            } else {
                $user->role_id = 1;
            }
            $user->save();
            if(!isset($userEmail)){
                Mail::send('emails.pieza1',
                array(
                    'name' => $user->name,
                ), function($message) use ($user)
                    {
                        $message->from('no-reply@cityconsumo.com', "Cityconsumo.com");
                        $message->to($user->email, $user->name)->subject('¡Bienvenido, ahora eres parte nuestra familia City Consumo!');
                    });

            }

        });

        $user = Auth::user();

        return Redirect::intended();

    } catch (ApplicationRejectedException $e) {
        return redirect()->route('login')->with('errorFacebook','errors');
// User rejected application
    } catch (InvalidAuthorizationCodeException $e) {
        return redirect()->route('login')->with('errorFacebook', 'errors');
// Authorization was attempted with invalid
// code,likely forgery attempt
    } catch (PDOException $e) {

        return redirect()->route('login')->with('errorFacebook', 'errors');

        //dd($e);
    }


    /*
        SocialAuth::login('facebook', function ($user, $details) {
            dd($details);
            $emailT = $details->raw()['email'];
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

        $user = Auth::user();

        return Redirect::intended();
    */
});

// Password reset link request routes...
Route::get('password/email', ['uses' => 'Auth\PasswordController@getEmail', 'as' => 'getEmail']);
Route::post('password/email', ['uses' => 'Auth\PasswordController@postEmail', 'as' => 'postEmail']);

// Password reset routes...
Route::get('password/reset/{token}', ['uses' => 'Auth\PasswordController@getReset', 'as' => 'getReset']);
Route::post('password/reset', ['uses' => 'Auth\PasswordController@postReset', 'as' => 'postReset']);
