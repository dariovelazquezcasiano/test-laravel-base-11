@extends('dashboard.master')

@section('content')
    <h1>Articulos</h1>

    <p>
        <a class="btn btn-primary" href="{{ route('post.create') }}">Nuevo Post</a>
    </p>

    <table class="table mt-2">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Posted</th>
                <th>Category</th>
                <th>Opciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $p)
                <tr>
                    <td>{{ $p->id }}</td>
                    <td>{{ $p->title }}</td>
                    <td>{{ $p->posted }}</td>
                    <td>{{ $p->category->title }}</td>
                    <td><a class="btn btn-success mt-2" href="{{ route('post.show', $p) }}">Ver</a>
                        <a class="btn btn-primary mt-2" href="{{ route('post.edit', $p) }}">Editar</a>
                        <form action="{{ route('post.destroy', $p) }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button class="btn btn-danger mt-2" type="submit">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $posts->links() }}
@endsection
