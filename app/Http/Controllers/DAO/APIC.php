<?php

namespace App\Http\Controllers\DAO;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class APIC extends Controller
{
     //--------------- CONEXION CON LIBROS ---------------

    //busca libro
    public function ApiSearchBook(Request $query){
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

    //guarda libro
    public function ApiSaveBook(Request $request){
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

    //Obtiene un libro
    public function ApiGetBook(Request $request){
        $simon = Http::withBody('{
            "universidad_id": "'.$request->LibroId.'",
            "universidad_libro_id": "'.$request->UniId.'"
          }', 'application/json')
              ->withToken(Session::get('UserToken'))
              ->withHeaders([
                  'accept' => '*/*',
              ])
              ->post('http://192.168.1.85:3000/api/recuperar-libro');

        return $simon;
    }

    //--------------- CONEXION CON USUARIO ---------------

    //Inicia sesion en la api y guarda el token
    public function ApiLogin(){
        $simon = Http::withBody('{
            "usuario": "'. env('API_MATRICULEISHON') .'",
            "contrasena": "'. env('API_MATRICULEISHON') .'"
          }', 'application/json')
              ->withHeaders([
                  'accept' => '*/*',
              ])
              ->post('http://192.168.1.85:3000/api/token')->json();
    
        Session::put('UserToken', $simon);
    }

    //consulta el perfil actual
    public function ApiGetProfile(){
        $simon = Http::withToken(Session::get('UserToken'))
        ->withHeaders([
            'accept' => '*/*',
        ])
        ->get('http://192.168.1.85:3000/api/perfil')->json();

        return $simon;
    }

    //Actualiza perfil
    public function ApiSaveProfile(Request $request){
        $simon = Http::withBody('{
            "nueva_contrasena": "'.$request->pass.'",
            "nombre_universidad": "'.$request->name.'",
            "grupo": "'.$request->grupo.'",
            "url_recuperacion_libro": "'.$request->url.'"
          }', 'application/json')
              ->withToken(Session::get('UserToken'))
              ->withHeaders([
                  'accept' => '*/*',
              ])
              ->post('http://192.168.1.85:3000/api/actualizar-perfil');
        
        return $simon;
    }
}
