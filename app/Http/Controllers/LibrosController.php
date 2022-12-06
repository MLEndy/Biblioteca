<?php

namespace App\Http\Controllers;

use App\Http\Controllers\AppService\BookService;
use App\Models\Book;
use Exception;
use Illuminate\Http\Request;

use function PHPUnit\Framework\isEmpty;

class LibrosController extends Controller
{
    public function SearchIndex(){
        $view = new AppController;

        return $view->AppView('UserView.search', 'Buscador', true);
    }

    public function ApiSaveBook(Request $request){
        $book = new BookService;

        if($book->AppServiceStoreBook($request)){
            return back();
        } else{
            return 'Algo salio mal';
        }
    }

    public function ApiSearchBook(Request $request){
        $book = new BookService;
        $view = new AppController;

        return $view->AppViewWithData('UserView.result', 'Resultados de Busqueda', true, $book->AppServiceSearchBook($request));
    }
}
