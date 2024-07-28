@extends('dashboard.master')

@section('content')
    <h1>Crear Post</h1>

    @include('dashboard.fragment._errors_form')

    <p><a href="{{ route('category.index')}}">Regresar</a></p>

    <form action="{{ route('category.store') }}" method="post" enctype="multipart/form-data">
        
        @csrf

        <p>
            <label for="title">Titulo</label><br>
            <input type="text" name="title" id="title" value="{{ old('title', '') }}">
        </p>

        <p>
            <label for="slug">Slug</label><br>
            <input type="text" name="slug" id="slug" value="{{ old('slug', '') }}">
        </p>

        <button type="submit">crear</button>
    </form>
@endsection
