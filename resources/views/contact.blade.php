@extends('master')

@section('content')
    <h1>Contacto 1</h1>
    <p>{{ $nombre }}</p>

    @if ($nombre != 'Andres')
        Tu nombre no es Andres
    @else
        Tu nombre es Andres
    @endif

    <ul>
        @foreach ([1, 2, 3, 4, 5] as $item)
            <li>{{$item}}</li>
        @endforeach
    </ul>
@endsection
