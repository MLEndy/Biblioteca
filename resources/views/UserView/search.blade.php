@extends('Layouts.layout')

@section('content')
<body>
    <div class="centered-width text-middle">
        <h1>BUSCADOR</h1>
        <form method="POST" action="/test/"> @csrf
            <input type="text" name="search" class="search-bar text-middle"><button type="submit"><x-fas-search /></button>
        </form>

        <div hidden>
            <a href="/test">Test</a>
            <form method="POST" action="/saveTest"> @csrf
                <input type="text" name="id">
                <input type="text" name="nombre">
                <input type="text" name="tema">
                <button type="submit">Guardar</button>
            </form>
        </div>
    </div>
</body>
@endsection
