@extends('Layouts.layout')

@section('content')
<body>
    <div class="login-box">
        <h1 class="title-shadowed color-white">Iniciar Sesion</h1>
        <form method="POST" action="/login">
            @csrf
            <p >Ingrese su correo</p>
            <input type="text" name="email">
            <p>Ingrese su contrasena</p>
            <input type="password" name="password"><br>
            <button type="submit">Iniciar Sesion</button>
            <p>¿Aún no tienes una cuenta? <a href="/register">Registrate</a></p>
        </form>
    </div>
</body>
@endsection