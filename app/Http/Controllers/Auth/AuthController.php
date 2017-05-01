<?php

namespace City\Http\Controllers\Auth;

use City\User;
use Validator;
use City\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware($this->guestMiddleware(), ['except' => ['logout', 'loginOut']]);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {

        return Validator::make($data,
            [
                'name' => 'required',
                'email' => 'required|email|max:255|unique:users',
                'password' => 'required|min:6',
                'g-recaptcha-response' => 'required|captcha'
            ],
            [
                'name.required' => 'El nombre es requerido',
                'email.required' => 'El email es obligatorio ',
                'email.email' => 'El email no es valido ',
                'email.unique' => 'Este usuario ya esta registrado',
                'password.required' => 'La contraseña es obligatoria',
            ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */

    protected function create(array $data)
    {
        $user = new User([
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'role_id' => '1',
            'name' => $data['name'],

        ]);
        $user->save();
        auth()->loginUsingId($user->id);

        Mail::send('emails.pieza1',
        array(
            'name' => $user->name,
        ), function($message) use ($user)
            {
                $message->from('no-reply@cityconsumo.com', "Cityconsumo.com");
                $message->to($user->email, $user->name)->subject('¡Bienvenido, ahora eres parte nuestra familia City Consumo!');
            });

        


        return $user;
    }

    protected function loginOut(){
        auth()->logout();
        session()->flush();
        return redirect()->to('/');
    }
}
