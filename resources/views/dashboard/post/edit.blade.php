@extends('dashboard.master')

@section('content')
    <h1>Crear Post</h1>

    @include('dashboard.fragment._errors_form')

    <p><a href="{{ route('post.index')}}">Regresar</a></p>

    <form action="{{ route('post.update', $post->id) }}" method="post">

        @method('PATCH')
        @csrf

        <p>
            <label for="title">Titulo</label><br>
            <input type="text" name="title" value="{{ old('title', $post->title) }}">
        </p>

        <p>
            <label for="slug">Slug</label><br>
            <input type="text" name="slug" value="{{ old('slug', $post->slug) }}">
        </p>

        <p>
            <label for="description">Descripcion</label><br>
            <input type="text" name="description" value="{{  old('description',$post->description) }}">
        </p>

        <p>
            <label for="category_id">Categoria</label><br>
            <select name="category_id">
                @foreach ($categorias as $title => $id)
                    <option {{ old('category_id', $post->category->id) == $id ? "selected" : '' }} value="{{ $id }}">
                        {{ $title }}
                    </option>
                @endforeach
            </select>
        </p>

        <p>
            <label for="posted">Posteado</label><br>
            <select  name="posted">
                <option {{ old('posted', $post->posted) == "not" ? "selected" : '' }} value="not">no</option>
                <option {{ old('posted', $post->posted) == "yes" ? "selected" : '' }} value="yes">si</option>
            </select>
        </p>

        <p>
            <label for="content">Contenido</label><br>
            <textarea name="content" cols="30" rows="7">{{ old('content', $post->content) }}</textarea>
        </p>

        <button type="submit">Editar</button>
    </form>
@endsection
