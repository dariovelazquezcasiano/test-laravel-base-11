@extends('dashboard.master')

@section('content')
    <h1>Crear Post</h1>

    @include('dashboard.fragment._errors_form')

    <p><a class="btn btn-primary" href="{{ route('post.index')}}">Regresar</a></p>

    <form action="{{ route('post.update', $post->id) }}" method="post" enctype="multipart/form-data">

        @method('PATCH')
        @csrf

        <p>
            <label for="title">Titulo</label><br>
            <input class="form-control" type="text" name="title" id="title" value="{{ old('title', $post->title) }}">
        </p>

        <p>
            <label for="slug">Slug</label><br>
            <input class="form-control" type="text" name="slug" id="slug" value="{{ old('slug', $post->slug) }}">
        </p>

        <p>
            <label for="description">Descripcion</label><br>
            <input class="form-control" type="text" name="description" id="description" value="{{  old('description',$post->description) }}">
        </p>

        <p>
            <label for="image">Actualizar Imagen</label><br>
            <inputclass="form-control" type="file" name="image" id="image"><br>
            <img src="/uploads/posts/{{$post->image}}" alt="Imagen actual" style="width:250px;">
        </p>

        <p>
            <label for="category_id">Categoria</label><br>
            <select class="form-control" name="category_id" id="category_id">
                @foreach ($categorias as $title => $id)
                    <option {{ old('category_id', $post->category->id) == $id ? "selected" : '' }} value="{{ $id }}">
                        {{ $title }}
                    </option>
                @endforeach
            </select>
        </p>

        <p>
            <label for="posted">Posteado</label><br>
            <select class="form-control"  name="posted" id="posted">
                <option {{ old('posted', $post->posted) == "not" ? "selected" : '' }} value="not">no</option>
                <option {{ old('posted', $post->posted) == "yes" ? "selected" : '' }} value="yes">si</option>
            </select>
        </p>

        <p>
            <label for="content">Contenido</label><br>
            <textarea class="form-control" name="content" id="content" cols="30" rows="7">{{ old('content', $post->content) }}</textarea>
        </p>

        <button class="btn btn-success mt-2" type="submit">Editar</button>
    </form>
@endsection
