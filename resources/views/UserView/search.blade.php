@extends('Layouts.layout')

@section('content')
<body>
    <h1>BUSCADOR</h1>
    <form method="POST" action="/test/"> @csrf
        <input type="text" name="search"><button type="submit">Buscar</button>
    </form>
    <a href="/test">Test</a>

    <div>
        <form method="POST" action="/saveTest"> @csrf
            <input type="text" name="id">
            <input type="text" name="nombre">
            <input type="text" name="tema">
            <button type="submit">Guardar</button>
        </form>
    </div>
</body>
@endsection
