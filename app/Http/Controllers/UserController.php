<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    /*--------------- SECCION LOGIN ---------------*/
    public function LoginIndex(){
        $view = new AppController;
        return $view ->AppView('UserControl.login', 'IniciarSesion', false);
    }

    public function LoginUser(){
        $credentials = request()->only('email', 'password');

        if (Auth::attempt($credentials)){
            request()->session()->regenerate();
            try{
                $simon = Http::withBody('{
                    "usuario": "'. env('API_MATRICULEISHON') .'",
                    "contrasena": "'. env('API_MATRICULEISHON') .'"
                  }', 'application/json')
                      ->withHeaders([
                          'accept' => '*/*',
                      ])
                      ->post('http://192.168.1.85:3000/api/token')->json();

                Session::put('UserToken', $simon);
            }catch(Exception $e){
               
            }
            return redirect('/search');
        }

        return 'Credenciales incorrectas, puto';
    }

    /*--------------- SECCION REGISTER ---------------*/
    public function RegisterIndex(){
        $view = new AppController;
        return $view->AppView('UserControl.register', 'Registro', false);
    }

    public function RegisterUser (){
        $this->validate(request(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required'
        ]);

        try{
            User::create(request([
                'name', 'email', 'password'
            ]));
    
            return redirect('/');
        }catch(Exception $e){
            return $e;
        }
    }

    /*--------------- SECCION LOGOUT ---------------*/
    public function LogoutUser(){
        try {
            Auth::logout();
            return redirect('/');
        }catch(Exception $e){
            return $e;
        }
    }
}
