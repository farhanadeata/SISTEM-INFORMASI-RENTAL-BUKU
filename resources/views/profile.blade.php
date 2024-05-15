@extends('layout.mainlayout')

@section('title', 'Rent Logs User')

@section('content')
    <h3>Rent Logs User, {{ Auth::user()->u_name }}</h3>

    <div class="mt-5">
        <x-rent-log-table :rentlog='$rent_logs' />
    </div>
@endsection
