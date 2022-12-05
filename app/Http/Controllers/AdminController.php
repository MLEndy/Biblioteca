<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    public function getToken(){
        return Session::get('UserToken');
    }

    public function AdminUsers(){
        $view = new AppController;
        $users = User::all();

        return $view->AppViewWithData('AdminView.principal', 'DiositoView', true, $users);
    }

    public function AdminBooks(){
        $view = new AppController;
        $libros = Book::all();

        return $view->AppViewWithData('AdminView.libros', 'DiositoView', true, $libros);
    }
}
