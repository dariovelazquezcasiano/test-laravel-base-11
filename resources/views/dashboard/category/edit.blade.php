@extends('dashboard.master')

@section('content')
    <h1>Crear Categoria</h1>

    @include('dashboard.fragment._errors_form')

    <p><a class="btn btn-primary" href="{{ route('category.index')}}">Regresar</a></p>

    <form class="mt-2" action="{{ route('category.update', $category->id) }}" method="post">

        @method('PATCH')
        @csrf

        <p>
            <label for="title">Titulo</label><br>
            <input class="form-control" type="text" name="title" value="{{ old('title', $category->title) }}">
        </p>

        <p>
            <label for="slug">Slug</label><br>
            <input class="form-control" type="text" name="slug" value="{{ old('slug', $category->slug) }}">
        </p>

        <button class="btn btn-success mt-3" type="submit">Editar</button>
    </form>
@endsection
