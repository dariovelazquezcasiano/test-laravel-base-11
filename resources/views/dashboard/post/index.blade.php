@extends('dashboard.master')

@section('content')
    <p>
        <a href="{{ route('post.create') }}">Nuevo Post</a>
    </p>
    <table>
        <thead>
            <tr>
                <td>Title</td>
                <td>Posted</td>
                <td>Category</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $p)
                <tr>
                    <td>{{ $p->title }}</td>
                    <td>{{ $p->posted }}</td>
                    <td>{{ $p->category->title }}</td>
                    <td><a href="{{route('post.show', $p)}}">Ver</a></td>
                    <td><a href="{{route('post.edit', $p)}}">Editar</a></td>
                    <td>
                        <form action="{{route('post.destroy', $p)}}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button type="submit">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $posts->links() }}
@endsection
