@extends('dashboard.master')

@section('content')


    @include('dashboard.fragment._errors_form')

    <h1>Categoria: #{{$categoria->id}}</h1>

    <p><a class="btn btn-primary" href="{{ route('category.index')}}">Regresar</a></p>
    <br>
    <section>
        <p>
            <h4>Titulo:</h4>
            {{$categoria->title}}
        </p>
        <p>
            <h4>Slug:</h4>
            {{$categoria->slug}}
        </p>
    </section>
@endsection
