<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> {{$pageName}} </title>
    <link rel="stylesheet" href="/css/stylesheet.css">
</head>

@if ($hasHeader)
<header class="header">
    <a {{$pageName == 'Buscador' ? 'class=active' : ''}} href="/search">Buscar</a>
    @can('adminPermission')
        <a {{$pageName == 'Usuarios' ? 'class=active' : ''}} href="/godView/users">Usuarios</a>
        <a {{$pageName == 'Libros' ? 'class=active' : ''}} href="/godView/books">Libros</a>
    @endcan

    @auth
    <div class="logout">
    <ul>
        <form method="POST" action="/logout">@csrf<button class="button black" type="submit">Salir</button></form>
    </ul>
    </div>
    @endauth
</header>    
@endif

@yield('content')

<footer>
    Footer
</footer>
</html>