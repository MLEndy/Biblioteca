@extends('Layouts.layout')

@section('content')
    <body>
        <div class="centered-content">
            <h1>Vista de livros papito</h1>
            {{-- <x-zondicon-add-solid /> --}}

            <table>
                <head>
                    <tr class="table-header">
                        <th>nombre</th>
                        <th>descripcion</th>
                        <th>genero</th>
                        <th></th>
                        <th></th>
                        <th><a class="button pine" href="/godView/books/create">Crear</a></th>
                    </tr>
                </head>
                @foreach ($data as $libro)
                    <tr>
                        <th>{{$libro->nombre}}</th>
                        <th>{{$libro->descripcion}}</th>
                        <th>{{$libro->genero}}</th>
                        <th><a class="button black" href='/godView/books/edit/{{intval($libro->id)}}'>editar</a></th>
                        <th><a class="button wine" href='/godView/books/delete/{{intval($libro->id)}}'>borrar</a></th>
                        <th>
                            <div>
                                <form method="POST" action="/api/save"> @csrf
                                    <input type="text" name="id" value="{{$libro->id}}" hidden>
                                    <input type="text" name="nombre" value="{{$libro->nombre}}" hidden>
                                    <input type="text" name="tema" value="{{$libro->genero}}" hidden>
                                    <button class="button white1" type="submit">Guardar</button>
                                </form>
                            </div>
                        </th>
                    </tr>
                @endforeach
            </table>
        </div>
    </body>
@endsection