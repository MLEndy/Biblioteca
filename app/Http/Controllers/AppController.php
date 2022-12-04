<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class AppController extends Controller
{
    public function AppView(string $direction, string $name, bool $hasHeader){
        $view = view($direction, [
            'pageName' => $name,
            'hasHeader' => $hasHeader
        ]);

        return $view;
    }

    public function AppViewWithData(string $direction, string $name, bool $hasHeader, $data){
        $view = view($direction, [
            'pageName' => $name,
            'hasHeader' => $hasHeader,
            'data' => $data
        ]);

        return $view;
    }

    public function PageInfo(string $name, bool $hasheader){
        $pageInfo = [
            'pageName' => $name,
            'hasHeader' => $hasheader
        ];

        return $pageInfo;
    }
}
