@extends('Layouts.layout')

@section('content')
    <body>
        <h1>Vista de livros papito</h1>
        <a href="/godView/books/create">Crear <x-zondicon-add-solid /></a>

        <table>
            <head>
                <tr>
                    <th>nombre</th>
                    <th>descripcion</th>
                    <th>genero</th>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
            </head>
            @foreach ($data as $libro)
                <tr>
                    <th>{{$libro->nombre}}</th>
                    <th>{{$libro->descripcion}}</th>
                    <th>{{$libro->genero}}</th>
                    <th></th>
                    <th><a href='/godView/books/edit/{{intval($libro->id)}}'>eee<x-iconpark-edit /></a></th>
                    <th><a href='/godView/books/delete/{{intval($libro->id)}}'>eee<x-iconpark-delete /></a></th>
                    <th><a>eee<x-bi-cloud-arrow-up-fill /></a></th>
                </tr>
            @endforeach
        </table>
    </body>
@endsection