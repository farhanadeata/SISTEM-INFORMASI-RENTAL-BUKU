@extends('layout.mainlayout')

@section('title', 'Books')

@section('content')
    <H1>Book List</H1>

    <div>
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
    </div>

    <div class="mt-5 d-flex justify-content-start">
        <a href="book-add" class="btn btn-primary fa-plus btn-lg"> add data</a>
    </div>

    <div class="my-5">
        <table class="table table-info table-striped table-hover">
            <thead>
                <tr>
                    <th>NO.</th>
                    <th>Code Book</th>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($books as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->book_code }}</td>
                        <td>{{ $item->title }}</td>
                        <td>
                            @foreach ($item->categories as $category)
                                {{ $category->name }} ,
                            @endforeach
                        </td>
                        <td>{{ $item->status }}</td>

                        <td>
                            <a href="/book-edit/{{ $item->slug }}"><i class="fa-solid fa-wrench"></i></a>
                            <a href="/book-delete/{{ $item->slug }}"><i class="fa-solid fa-trash"></i></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
