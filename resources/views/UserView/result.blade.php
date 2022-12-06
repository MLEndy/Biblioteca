@extends('Layouts.layout')

@section('content')

<body>
    <div class="centered-content">
        <h1>Resultados de la busqueda</h1><br>
        <form method="POST" action="/api/search"> @csrf
            <input type="text" name="search" class="text-middle"><br><br><button class="button black" type="submit">Buscar</button>
        </form><br>

        <table>
            <head>
                <tr>
                    <th>nombre</th>
                    <th>tema</th>
                    <th>Universidad</th>
                </tr>
            </head>
            <body>
            @foreach ($data as $libro)
                <tr>
                    <th>{{$libro['libro_nombre']}}</th>
                    <th>{{$libro['tema']}}</th>    
                    <th>{{$libro['nombre_universidad']}}</th>
                    <th><a href="#">Descargar</a></th>
                </tr>            
            @endforeach
            </body>
        </table>
    </div>
</body>

@endsection