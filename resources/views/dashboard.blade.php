@extends('layout.mainlayout')

@section('title', 'Dashboard')

@section('content')

    <h3>Selamat Datang, {{ Auth::user()->u_name }} </h3>
    <div class="row mt-4">
        <div class="col-lg-4 col-md-6 mb-3 ">
            <div class="card-data book">
                <div class="row">
                    <div class="col-6"><i class="bi bi-book"></i></div>
                    <div class="col-6 d-flex flex-column justify-content-center align-items-end">
                        <div class="card-desc">Books</div>
                        <div class="card-count">{{ $book_count }}</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 mb-3 ">
            <div class="card-data category">
                <div class="row">
                    <div class="col-6"><i class="bi bi-list-ul"></i></div>
                    <div class="col-6 d-flex flex-column justify-content-center align-items-end">
                        <div class="card-desc">Category</div>
                        <div class="card-count">{{ $category_count }}</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 mb-3">
            <div class="card-data user">
                <div class="row">
                    <div class="col-6"><i class="bi bi-people"></i></div>
                    <div class="col-6 d-flex flex-column justify-content-center align-items-end">
                        <div class="card-desc">Users</div>
                        <div class="card-count">{{ $user_count }}</div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="mt-5  ">
        <H3>Rent Logs</H3>
        <div>
            <x-rent-log-table :rentlog='$rent_logs' />
        </div>
    </div>
@endsection
