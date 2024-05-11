@extends('layout.mainlayout')

@section('title', 'add Book')

@section('content')

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <h1>Add New Book</h1>


    <div clas="mt-5 w-50">

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="book-add" method="post" enctype="multipart/form-data">
            @csrf

            <div class="mb-4">
                <label for="code" class="form=lable">Code Book</label>
                <input type="text" name="book_code" id="code" class="form-control" placeholder="Masukan Kode Buku"
                    value="{{ old('book_code') }}">
            </div>
            <div class="mb-4">
                <label for="title" class="form=lable">Title</label>
                <input type="text" name="title" id="title" class="form-control" placeholder="masukan Title Buku"
                    value="{{ old('title') }}">
            </div>
            <div class="mb-3">
                <label for="category" class="form=lable">Cover Book</label>
                <input type="file" name="image" id="imgae" class="form-control">
            </div>
            <div class="mb-3">
                <label for="cover" class="form=lable">Category</label>
                <select name="categories[]" id="category" class="form-control select-multiple" multiple>
                    @foreach ($categories as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mt-3">

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
