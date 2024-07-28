@extends('dashboard.master')

@section('content')
    <h1>Crear Post</h1>

    @include('dashboard.fragment._errors_form')

    <p><a href="{{ route('category.index')}}">Regresar</a></p>

    <form action="{{ route('category.update', $category->id) }}" method="post">

        @method('PATCH')
        @csrf

        <p>
            <label for="title">Titulo</label><br>
            <input type="text" name="title" value="{{ old('title', $category->title) }}">
        </p>

        <p>
            <label for="slug">Slug</label><br>
            <input type="text" name="slug" value="{{ old('slug', $category->slug) }}">
        </p>

        <button type="submit">Editar</button>
    </form>
@endsection
