@extends('dashboard.master')

@section('content')
    @include('dashboard.fragment._errors_form')


    <section>
        <h1>Articulo: #{{ $post->id }}</h1>
        <a class="btn btn-primary mt-2" href="{{ route('post.index') }}">Regresar</a>
        <br><br>
        <p>
        <h4>Slug</h4>
        {{ $post->slug }}
        </p>
        <p>
        <h4>Description</h4>
        {{ $post->description }}
        </p>
        <p>
        <h4>Categoria</h4>
        {{ $post->category->title }}
        </p>
        <p>
        <h4>Posteado</h4>
        {{ $post->posted }}
        </p>
        <p>
            <img src="/uploads/posts/{{ $post->image }}" alt="Imagen del post" style="width:400px;">
        </p>
        <p>
        <h4>Contenido</h4>
        {{ $post->content }}
        </p>
    </section>
@endsection
