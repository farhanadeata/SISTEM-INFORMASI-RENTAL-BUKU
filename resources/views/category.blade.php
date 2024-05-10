@extends('layout.mainlayout')

@section('title', 'Category')

@section('content')

        <h1> Category list </h1>

        <div>
            @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
            
        @endif
        </div>

        <div class="mt-5 d-flex justify-content-start">
        <a href="category-add" class="btn btn-primary fa-plus btn-lg">add data</a>
        </div>


        <div class="my-5">

            <table class="table table-info table-striped table-hover">
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
