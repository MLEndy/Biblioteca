@extends('Layouts.layout')

@section('content')
    <body>
        <h1>Vista de admins papito</h1>
        <a href="/godView/users/create">Crear</a>

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
                    <th>@if (Auth::User()->id == $user->id)
                        Activo
                    @else
                        @if ($user->hasRole('admin'))
                            Admin
                        @else
                            Usuario
                        @endif
                    @endif</th>
                    <th><a href="/godView/users/edit/{{intval($user->id)}}">editar</a></th>
                    <th><a href='/godView/users/delete/{{intval($user->id)}}'>borrar</a></th>
                </tr>
            @endforeach
        </table>
    </body>
@endsection