@extends('layout.mainlayout')

@section('title', 'User')

@section('content')

    <h1> Detail User list </h1>

    <div class="mt-5 d-flex justify-content-start">

        @if ($user->status == 'Tidak Aktif')
            <a href="/user-approve/{{ $user->slug }}" class="btn btn-success bi bi-emoji-smile btn-lg"> Approve</a>
        @endif
    </div>

    <div>
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
    </div>



    <div class="mt-5 w-50">
        <div class="mb-3">
            <label for="name" class="form=lable">Username</label>
            <input type="text" class="form-control" readonly value="{{ $user->u_name }}">
        </div>
        <div class="mb-3">
            <label for="name" class="form=lable">Phone</label>
            <input type="text" class="form-control" readonly value="{{ $user->phone }}">
        </div>
        <div class="mb-3">
            <label for="name" class="form=lable">Address</label>
            <textarea cols="20" rows="5" class="form-control" style="resize: none">{{ $user->address }}</textarea>
        </div>
        <div class="mb-3">
            <label for="name" class="form=lable">Status</label>
            <input type="text" class="form-control" readonly value="{{ $user->status }}">
        </div>
    </div>
@endsection
