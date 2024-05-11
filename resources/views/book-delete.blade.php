@extends('layout.mainlayout')

@section('title', 'Delete Book')

@section('content')

    <h2>Are You Sure To Delete Book {{ $book->title }} ? </h2>
    <div class="mt-5">

        <a href="/book-destroy/{{ $book->slug }}" class="me-5 btn btn-primary">Yes</a>
        <a href="/books" class="btn btn-danger">No</a>

    </div>

@endsection
