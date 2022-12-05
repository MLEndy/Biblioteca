<?php

namespace App\Http\Controllers\AppService;

use App\Http\Controllers\Controller;
use App\Http\Controllers\DAO\Dao;
use Illuminate\Http\Request;

class UserService extends Controller
{
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

    public function AppServiceGetAllUsers(){
        $dao = new Dao;
        return $dao->SystemDaoGetUsers();
    }

    public function AppServiceGetOneUser(int $id){
        $dao = new Dao;
        return $dao->SystemDaoGetOneUser($id);
    }

    public function AppServiceDeleteUser(int $id){
        $dao = new Dao;
        $dao = $dao->SystemDaoDeleteUser($id);
    }

    public function AppServiceEditUser(Request $request){
        $dao = new Dao;
        return $dao->SystemDaoEditUser($request) == 'updated';
    }
}
