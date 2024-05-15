@extends('layout.mainlayout')

@section('title', 'Book Rent')

@section('content')

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <h1>Book Rent</h1>

    <div clas="mt-5 w-50">
        <div>
            @if (session('message'))
                <div class="alert {{ session('alert-class') }}">
                    {{ session('message') }}
                </div>
            @endif
        </div>

        <form action="book-rent" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label for="user" class="form=lable">User</label>
                <select name="user_id" id="user" class="form-control select-multiple">
                    <option value="">Select User</option>
                    @foreach ($users as $item)
                        <option value="{{ $item->id }}">{{ $item->u_name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-4">
                <label for="book" class="form=lable">Book</label>
                <select name="book_id" id="book" class="form-control select-multiple">
                    <option value="">Select Book</option>
                    @foreach ($books as $item)
                        <option value="{{ $item->id }}">{{ $item->title }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-4">
                <button class="btn btn-success" type="submit">Save</button>
            </div>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
        $(document).ready(function() {
            $('.select-multiple').select2();
        });
    </script>


@endsection
