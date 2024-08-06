@extends('dashboard.master')

@section('content')
    <h1>Categorias</h1>
    <p>
        <a class="btn btn-primary" href="{{ route('category.create') }}">Nueva Categoria</a>
    </p>
    <table class="table mt-2">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Slug</th>
                <th>Opciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categorias as $c)
                <tr>
                    <td>{{ $c->id }}</td>
                    <td>{{ $c->title }}</td>
                    <td>{{ $c->slug }}</td>
                    <td><a class="btn btn-success mt-2" href="{{route('category.show', $c)}}">Ver</a>
                        <a class="btn btn-primary mt-2" href="{{route('category.edit', $c)}}">Editar</a>
                        <form action="{{route('category.destroy', $c)}}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button class="btn btn-danger mt-2" type="submit">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $categorias->links() }}
@endsection
