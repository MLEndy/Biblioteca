<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LibrosController extends Controller
{
    public function SearchIndex(){
        $view = new AppController;

        return $view->AppView('UserView.search', 'Buscador', true);
    }
}
