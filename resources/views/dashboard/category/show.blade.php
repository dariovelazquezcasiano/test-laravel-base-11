@extends('dashboard.master')

@section('content')


    @include('dashboard.fragment._errors_form')

    <p><a href="{{ route('category.index')}}">Regresar</a></p>
    <section>
        <h1>
            {{$categoria->title}}
        </h1>
        <p>
            <h4>Slug</h4>
            {{$categoria->slug}}
        </p>
    </section>
@endsection
