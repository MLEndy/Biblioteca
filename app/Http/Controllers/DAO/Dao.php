<?php

namespace App\Http\Controllers\DAO;

use App\Http\Controllers\APIC;
use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class Dao extends Controller
{
    //Loggea en el sistema
    public function SystemDaoLogin(array $credentials){
        $api = new APIC;

        if (Auth::attempt($credentials)){
            request()->session()->regenerate();
            try{
                $api->ApiLogin();
            }catch(Exception $e){
                Session::put('UserToken', false);
            }
            return 'Valido';
        }

        return 'error';
    }

    //Registra en el sistema
    public function SystemDaoRegister(array $request){

        try{
            User::create($request);
    
            return 'creado';
        }catch(Exception $e){
            return 'error';
        }
    }

    //Cierra sesion en el sistema
    public function SystemDaoLogout(){
        try {
            Auth::logout();
            return 'unlog';
        }catch(Exception $e){
            return 'error';
        }
    }
}
