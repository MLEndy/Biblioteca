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
<header>
    <div>
        <a>Me </a>
        <a>quiero </a>
        <a>morir </a>  
        @auth
        <form method="POST" action="/logout">@csrf<button type="submit">Salir</button></form>
        @endauth
        @can('adminPermission')
            <a href="/godView/users">Usuarios</a>
            <a href="/godView/books">Libros</a>
        @endcan
    </div>    
</header>    
@endif

@yield('content')

<footer>
    <p>
        Mira krnal, esta bien que quieras que haga ya todo un desmadre aca bien insano, pero tampoco te mames alchile, mira, ni
        tu ni yo sabemos como va el footer asi que para que le hacemos a la mamada, mejor sigue trabajando en otra cosa si?,
        sale te me cuidas
    </p>
</footer>
</html>