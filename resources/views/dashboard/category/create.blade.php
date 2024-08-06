@extends('dashboard.master')

@section('content')
    <h1>Crear Categoria</h1>

    @include('dashboard.fragment._errors_form')

    <p><a class="btn btn-primary mt-2 mb-2" href="{{ route('category.index')}}">Regresar</a></p>

    <form action="{{ route('category.store') }}" method="post" enctype="multipart/form-data">
        
        @csrf

        <p>
            <label for="title">Titulo</label><br>
            <input class="form-control" type="text" name="title" id="title" value="{{ old('title', '') }}">
        </p>

        <p>
            <label for="slug">Slug</label><br>
            <input class="form-control" type="text" name="slug" id="slug" value="{{ old('slug', '') }}">
        </p>

        <button class="btn btn-success mt-2" type="submit">Crear</button>
    </form>
@endsection
