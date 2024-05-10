@extends('layout.mainlayout')

@section('title', 'Delete Category')

@section('content')

    <h2>Are You Sure To Delete Category {{$category->name}} ? </h2>
    <div class="mt-5">

        <a href="/category-destroy/{{$category->slug}}" class="me-5 btn btn-primary">Yes</a>
        <a href="/categories" class="btn btn-danger">No</a>

    </div>

@endsection
