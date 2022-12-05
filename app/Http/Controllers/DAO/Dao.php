<?php

namespace App\Http\Controllers\DAO;

use App\Http\Controllers\DAO\APIC;
use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class Dao extends Controller
{
    //--------------- DAO DE USUARIOS DEL SISTEMA ---------------

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

    //Obtiene todos los usuarios
    public function SystemDaoGetUsers(){
        $users = User::all();
        return $users;
    }

    //Obtiene un usuario
    public function SystemDaoGetOneUser(int $id){
        $user = User::find($id);
        return $user;
    }

    //Borra un usuario
    public function SystemDaoDeleteUser(int $id){
        try{
            $book = User::find($id);
            $book->delete();
        } catch(Exception $e){
            
        }
    }

    //Edita un usuario
    public function SystemDaoEditUser(Request $request){
        try{
            $book = User::find($request->id);
            $book->name = $request->name;
            $book->email = $request->email;
            if($request->password != null){
                $book->password = $request->password;
            }
            $book->save();
            if(request()->password != null){
                $book->assignRole('admin');
            }else{
                if($book->hasRole('admin')){
                    $book->removeRole('admin');
                }
            }
            return 'updated';
        }catch (Exception $e){
            return 'error';
        }
    }

    //--------------- DAO DE LOS LIBROS DEL SISTEMA ---------------

    //Obtiene todos los libros
    public function SystemDaoGetBooks(){
        $books = Book::all();
        return $books;
    }

    //Obtiene un libro
    public function SystemDaoGetOneBook($id){
        $book = Book::find($id);
        return $book;
    }

    //Crea un libro
    public function SystemDaoCreateNewBook(Request $request){
        try{
            $book = new Book();
            $book->nombre = $request->nombre;
            $book->descripcion = $request->descripcion;
            $book->genero = $request->genero;
            $book->save();
            return 'saved';
        }catch(Exception $e){
            return 'error';
        }
    }

    //Modifica un libro
    public function SystemDaoEditBook(Request $request){
        try{
            $book = Book::find($request->id);
            $book->nombre = $request->nombre;
            $book->descripcion = $request->descripcion;
            $book->genero = $request->genero;
            $book->save();
            return 'updated';
        }catch(Exception $e){
            return 'error';
        }
    }

    //Borra un libro
    public function SystemDaoDeleteBook(int $id){
        try{
            $book = Book::find($id);
            $book->delete();
        }catch (Exception $e){

        }
    }
}
