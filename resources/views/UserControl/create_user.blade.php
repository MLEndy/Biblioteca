@extends('Layouts.layout')

@section('content')
<body>
    <div class="centered-width">
        <h1>{{$pageName}}</h1>
        @if (isset($data))
        <form method="POST" action="/godView/users/update">
        <input type="text" name="id" readonly hidden value="{{$data->id}}">
        @else
        <form method="POST" action="/godView/users/create">
        @endif
            @csrf
            <p >Ingrese el nombre</p>
            <input type="text" name="name" value="{{$data->name ?? ''}}">
            <p >Ingrese el correo</p>
            <input type="email" name="email" value="{{$data->email ?? ''}}">
            <p >Ingrese la contraseña</p>
            <input type="password" name="password"><br>
            @if (isset($data))
            <input type="checkbox" name="IsAdmin" {{$data->hasRole('admin') ? 'checked' : ''}}> Es Super-esclavo?<br>
            @endif
            <button type="submit">{{isset($data) ? 'Editar' : 'Crear'}}</button>
        </form>
    </div>
</body>
@endsection