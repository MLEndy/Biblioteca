@extends('Layouts.layout')

@section('content')
    <body>
        <div class="centered-content">
            <h1>Vista de admins papito</h1>

            <table>
                <head>
                    <tr>
                        <th>nombre</th>
                        <th>correo</th>
                        <th>rango</th>
                        <th></th>
                        <th><a href="/godView/users/create" class="button pine">Crear</a></th>
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
                        <th><a class="button black" href="/godView/users/edit/{{intval($user->id)}}">editar</a></th>
                        <th><a class="button wine" href='/godView/users/delete/{{intval($user->id)}}'>borrar</a></th>
                    </tr>
                @endforeach
            </table>
        </div>
    </body>
@endsection