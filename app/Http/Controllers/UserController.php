<?php

namespace App\Http\Controllers;

use App\Http\Controllers\AppService\UserService;
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
        $service = new UserService;

        if ($service->AppServiceLogin($credentials)){
            return redirect('/search');
        } else{
            return back();
        }
    }

    /*--------------- SECCION REGISTER ---------------*/
    public function RegisterIndex(){
        $view = new AppController;
        return $view->AppView('UserControl.register', 'Registro', false);
    }

    public function RegisterUser (){
        $service = new UserService;
        $this->validate(request(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if($service->AppServiceRegister(request()->only('name', 'email', 'password'))){
            return redirect('/');
        } else{
            return back();
        }
    }

    /*--------------- SECCION LOGOUT ---------------*/
    public function LogoutUser(){
        $service = new UserService;
        if($service->AppServiceLogout()){
            return redirect('/');
        } else{
            return back(); 
        }
    }
}
