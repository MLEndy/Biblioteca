@extends('Layouts.layout')

@section('content')
<body>
    <div class="centered-width login">
        <h1 class="title-shadowed color-white">Iniciar Sesion</h1>
        <form method="POST" action="/login">
            @csrf
            <p >Ingrese su correo</p>
            <input type="text" name="email">
            <p>Ingrese su contrasena</p>
            <input type="password" name="password"><br><br>
            <button class="button pine" type="submit">Iniciar Sesion</button>
        </form>
        <p>¿Aún no tienes una cuenta? <a class="a" href="/register">Registrate</a></p>
    </div>
</body>
@endsection