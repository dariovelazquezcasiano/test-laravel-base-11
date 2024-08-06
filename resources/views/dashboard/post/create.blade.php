@extends('dashboard.master')

@section('content')
    <h1>Crear Post</h1>

    @include('dashboard.fragment._errors_form')

    <p><a class="btn btn-primary mt-2" href="{{ route('post.index')}}">Regresar</a></p>

    <form action="{{ route('post.store') }}" method="post" enctype="multipart/form-data">
        
        @csrf

        <p>
            <label for="title">Titulo</label><br>
            <input class="form-control" type="text" name="title" id="title" value="{{ old('title', '') }}">
        </p>

        <p>
            <label for="slug">Slug</label><br>
            <input class="form-control" type="text" name="slug" id="slug" value="{{ old('slug', '') }}">
        </p>

        <p>
            <label for="description">Descripcion</label><br>
            <input class="form-control" type="text" name="description" id="description" value="{{ old('description', '') }}">
        </p>

        <p>
            <label for="category_id">Categoria</label><br>
            <select class="form-control" name="category_id" id="category_id">
                @foreach ($categorias as $title => $id)
                    <option {{ old('category_id', 0) == $id ? 'selected' : '' }} value="{{ $id }}">
                        {{ $title }}</option>
                @endforeach
            </select>
        </p>

        <p>
            <label for="posted">Posteado</label><br>
            <select class="form-control" name="posted" id="posted">
                <option {{ old('posted', '') == 'not' ? 'selected' : '' }} value="not">no</option>
                <option {{ old('posted', '') == 'yes' ? 'selected' : '' }} value="yes">si</option>
            </select>
        </p>

        <p>
            <label for="image">Imagen</label><br>
            <input class="form-control" type="file" name="image" id="image">
        </p>

        <p>
            <label for="content">Contenido</label><br>
            <textarea class="form-control" name="content" id="content" cols="30" rows="7">{{ old('content', '') }}</textarea>
        </p>

        <button class="btn btn-success mt-2" type="submit">crear</button>
    </form>
@endsection
