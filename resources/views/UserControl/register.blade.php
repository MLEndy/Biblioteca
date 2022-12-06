@extends('Layouts.layout')

@section('content')
<body>
    <div class="centered-width">
        <h1>Registro</h1>
        <form method="POST" action="/register">
            @csrf
            <p >Ingrese su nombre</p>
            <input type="text" name="name">
            <p >Ingrese su correo</p>
            <input type="email" name="email">
            <p >Ingrese su contraseña</p>
            <input type="password" name="password"><br><br>
            <button class="button white1" type="submit">Registrame</button>
        </form>
        <p>¿Ya tienes una cuenta? <a class="a" href="/">Iniciar Sesion</a></p>
    </div>
</body>
@endsection