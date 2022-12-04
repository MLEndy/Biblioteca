<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    public function TestIndex(Request $query){
        // dd($token);
        $simon = Http::withBody('{
           "filtro": "'. $query->search .'"
          }', 'application/json')
             ->withToken(Session::get('UserToken'))
              ->withHeaders([
                 'accept' => '*/*',
              ])
              ->post('http://192.168.1.85:3000/api/buscar-libro')->json();

        return $simon;
    }

    public function TestProfile(){
        $simon = Http::withToken(Session::get('UserToken'))
        ->withHeaders([
            'accept' => '*/*',
        ])
        ->get('http://192.168.1.85:3000/api/perfil')->json();

        return $simon['nombre_universidad'];
    }

    public function TestStorage(Request $request){
        $raimundo = Http::withBody('{
            "libro_id": "'.$request->id.'",
            "libro_nombre": "'.$request->nombre.'",
            "tema": "'.$request->tema.'"
          }', 'application/json')
              ->withToken(Session::get('UserToken'))
              ->withHeaders([
                  'accept' => '*/*',
              ])
              ->post('http://192.168.1.85:3000/api/registrar-libro');

              return $raimundo;
    }

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
