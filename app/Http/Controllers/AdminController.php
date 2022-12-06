<?php

namespace App\Http\Controllers;

use App\Http\Controllers\AppService\BookService;
use App\Http\Controllers\AppService\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    //--------------- SERVICE DE LOS USUARIOS DEL SISTEMA ---------------
    
    public function getToken(){
        return Session::get('UserToken');
    }

    public function AdminUsers(){
        $view = new AppController;
        $service = new UserService;

        return $view->AppViewWithData('AdminView.principal', 'Usuarios', true, $service->AppServiceGetAllUsers());
    }
    
    public function AdminCreateUserIndex(){
        $view = new AppController;
        return $view->AppView('UserControl.create_user', 'Crear Esclavo', true);
    }

    public function AdminCreateUser(){
        $service = new UserService;
        if($service->AppServiceRegister(request()->only('name', 'email', 'password'))){
            return redirect('/godView/users');
        } else{
            return back();
        }
    }

    public function AdminEditUserIndex($id){
        $view = new AppController;
        $service = new UserService;
        return $view->AppViewWithData('UserControl.create_user', 'Editar Esclavo', true, $service->AppServiceGetOneUser($id));
    }

    public function AdminEditUser(){
        $service = new UserService;
        if ($service->AppServiceEditUser(request())){
            return redirect('/godView/users');
        }else{
            return back();
        }
    }

    public function AdminDeleteUser($id){
        $service = new UserService;
        $service->AppServiceDeleteUser($id);
        return back();
    }

    //--------------- SERVICE DE LOS LIBROS DEL SISTEMA ---------------

    public function AdminBooks(){
        $view = new AppController;
        $service = new BookService;

        return $view->AppViewWithData('AdminView.libros', 'Libros', true, $service->AppServiceGetAllBooks());
    }

    public function AdminCreateIndex(){
        $view = new AppController;
        return $view->AppView('Books.editor', 'Crear Libro', true);
    }

    public function AdminCreateBook(Request $request){
        $service = new BookService;
        if ($service->AppServiceCreateNewBook($request)){
            return redirect('/godView/books');
        } else{
            return back();
        }
    }

    public function AdminEditIndex($id){
        $view = new AppController;
        $book = new BookService;
        return $view->AppViewWithData('Books.editor', 'Editar Libro', true, $book->AppServiceGetOneBooks((int)$id));
    }

    public function AdminEditBook(Request $request){
        $service = new BookService;
        if($service->AppServiceEditBook($request)){
            return redirect('/godView/books');
        }else{
            return back();
        }
    }

    public function AdminDeleteBook($id){
        $service = new BookService;
        $service->AppServiceDeletebook($id);
        return back();
    }
}
