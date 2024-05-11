@extends('layout.mainlayout')

@section('title', 'Delete User')

@section('content')

    <h2>Are You Sure To Delete User {{ $user->u_name }} ? </h2>
    <div class="mt-5">

        <a href="/user-destroy/{{ $user->slug }}" class="me-5 btn btn-primary">Yes</a>
        <a href="/users" class="btn btn-danger">No</a>

    </div>

@endsection
