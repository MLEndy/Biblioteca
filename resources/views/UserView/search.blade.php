@extends('Layouts.layout')

@section('content')
<body>
    <div class="centered-content text-middle">
        <h1>BUSCADOR</h1>
        <form method="POST" action="/api/search"> @csrf
            <input type="text" name="search" class="search-bar text-middle"><br><br><button class="button black" type="submit">Buscar</button>
        </form>
    </div>
</body>
@endsection
