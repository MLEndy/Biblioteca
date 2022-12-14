@extends('Layouts.layout')

@section('content')
<body>
    <div class="centered-width">
        <h1>{{$pageName}}</h1>
        @if (isset($data))
        <form method="POST" action="/godView/books/update">
        @else
        <form method="POST" action="/godView/books/create">
        @endif
            @csrf
            @isset($data)
            <input type="text" name="id" readonly hidden value="{{$data->id}}">
            @endisset
            <p >Nombre del libro</p>
            <input type="text" name="nombre" value="{{$data->nombre ?? ''}}">
            <p >Genero del libro</p>
            <input type="text" name="genero" value="{{$data->genero ?? ''}}">
            <p >Descripcion</p>
            <textarea type="text" name="descripcion">{{$data->descripcion ?? ''}}</textarea><br>
            <p >Archivo</p>
            <input type="file" name="archivo"><br><br>
            <button class="button black" type="submit">Registrame</button>
        </form>
    </div><br><br><br><br><br><br>
</body>
@endsection