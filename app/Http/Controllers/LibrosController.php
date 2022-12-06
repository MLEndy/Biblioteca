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
    
    public function ApiVisualizeBook(){
        $view = new AppController;
        $baseado = file_get_contents(public_path('test/bc.pdf'));
        $baseado = base64_encode($baseado);

        $baseado2 = base64_decode($baseado);
        $pdf = fopen('pdf_generated.pdf', 'w');
        fwrite($pdf, $baseado2);
        fclose($pdf);

        return $view->AppViewWithData('UserView.viewer', 'Libro', true, '/pdf_generated.pdf');
    }
}
