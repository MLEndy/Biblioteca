@extends('Layouts.layout')

@section('content')
<body>
    <h1>Registro</h1>
    <form method="POST" action="/register">
        @csrf
        <p >Ingrese su nombre</p>
        <input type="text" name="name">
        <p >Ingrese su correo</p>
        <input type="email" name="email">
        <p >Ingrese su contraseña</p>
        <input type="password" name="password"><br>
        <button type="submit">Registrame</button>
    </form>
</body>
@endsection