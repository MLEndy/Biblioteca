@extends('Layouts.layout')

@section('content')
    <body>
        <h1>Vista de admins papito</h1>

        <table>
            <head>
                <tr>
                    <th>nombre</th>
                    <th>correo</th>
                    <th>rango</th>
                    <th></th>
                </tr>
            </head>
            @foreach ($data as $user)
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