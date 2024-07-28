@extends('dashboard.master')

@section('content')
    <p>
        <a href="{{ route('category.create') }}">Nueva Categoria</a>
    </p>
    <table>
        <thead>
            <tr>
                <td>Title</td>
                <td>Slug</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($categorias as $c)
                <tr>
                    <td>{{ $c->title }}</td>
                    <td>{{ $c->slug }}</td>
                    <td><a href="{{route('category.show', $c)}}">Ver</a></td>
                    <td><a href="{{route('category.edit', $c)}}">Editar</a></td>
                    <td>
                        <form action="{{route('category.destroy', $c)}}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button type="submit">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $categorias->links() }}
@endsection
