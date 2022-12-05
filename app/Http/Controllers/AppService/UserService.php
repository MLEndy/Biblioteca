<?php

namespace App\Http\Controllers\AppService;

use App\Http\Controllers\Controller;
use App\Http\Controllers\DAO\Dao;

class UserService extends Controller
{
    public Dao $dao;

    public function AppServiceLogin(array $credentials){
        $dao = new Dao;
        return $dao->SystemDaoLogin($credentials) == 'Valido';
    }

    public function AppServiceRegister(array $request){
        $dao = new Dao;
        return $dao->SystemDaoRegister($request) == 'creado';
    }

    public function AppServiceLogout(){
        $dao = new Dao;
        return $dao->SystemDaoLogout() == 'unlog';
    }
}
