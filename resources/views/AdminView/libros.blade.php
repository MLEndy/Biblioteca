@extends('Layouts.layout')

@section('content')
    <body>
        <h1>Vista de livros papito</h1>

        <table>
            <head>
                <tr>
                    <th>nombre</th>
                    <th>descripcion</th>
                    <th>genero</th>
                    <th></th>
                    <th></th>
                </tr>
            </head>
            @foreach ($data as $libro)
                <tr>
                    <th>{{$user->name}}</th>
                    <th>{{$user->email}}</th>
                    <th></th>
                    <th><button>editar</button></th>
                    <th><button>borrar</button></th>
                </tr>
            @endforeach
        </table>
    </body>
@endsection