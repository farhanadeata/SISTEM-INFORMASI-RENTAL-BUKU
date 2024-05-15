@extends('layout.mainlayout')

@section('title', 'LOG')

@section('content')
    <H1>Rent Log List</H1>

    <div class="my-5">
        <x-rent-log-table :rentlog='$rent_logs' />
    </div>


@endsection
