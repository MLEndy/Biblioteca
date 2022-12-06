<?php

namespace App\Http\Controllers\AppService;

use App\Http\Controllers\Controller;
use App\Http\Controllers\DAO\APIC;
use App\Http\Controllers\DAO\Dao;
use Exception;
use Illuminate\Http\Request;
use Spatie\FlareClient\Api;

class BookService extends Controller
{
    public function AppServiceGetAllBooks(){
        $dao = new Dao;
        return $dao->SystemDaoGetBooks();
    }

    public function AppServiceGetOneBooks($id){
        $dao = new Dao;
        return $dao->SystemDaoGetOneBook($id);
    }

    public function AppServiceCreateNewBook(Request $request){
        $dao = new Dao;
        return $dao->SystemDaoCreateNewBook($request) == 'saved';
    }

    public function AppServiceEditBook(Request $request){
        $dao = new Dao;
        return $dao->SystemDaoEditBook($request) == 'updated';
    }

    public function AppServiceDeletebook(int $id){
        $dao = new Dao;
        $dao->SystemDaoDeleteBook($id);
    }

    //--------------- API ---------------
    public function AppServiceStoreBook(Request $request){
        try{
            $book = new APIC;
            $book->ApiSaveBook($request);
            return true;
        } catch(Exception $e){
            return false;
        }
    }

    public function AppServiceSearchBook(Request $request){
        try {
            $book = new APIC;
            return $book->ApiSearchBook($request);
        } catch(Exception $e){
            return [];
        }
    }

    // public function ApiGetBook()
}
