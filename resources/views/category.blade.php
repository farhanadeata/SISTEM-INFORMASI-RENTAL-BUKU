@extends('layout.mainlayout')

@section('title', 'Category')

@section('content')

    <h1> category list </h1>

    <div class="mt-5 d-flex justify-content-end">

        <a href="category-add" class="btn btn-primary"><i class="bi bi-pencil-square"></i> Add Data</a>

    </div>
    <div class="my-5">

        <table class="table">
            <thead>
                <tr>
                    <th>NO.</th>
                    <th>Name</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($categories as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>

                        <td>{{ $item->name }}</td>

                        <td><a href="#">edit</a>
                            <a href="#">delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
