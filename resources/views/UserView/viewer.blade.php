@extends('Layouts.layout')

@section('content')
<body>
    <div class="centered-content text-middle">
        <h1>Disfruta de tu libro</h1>
        <embed src="{{$data}}" type="application/pdf">
    </div>
</body>
@endsection