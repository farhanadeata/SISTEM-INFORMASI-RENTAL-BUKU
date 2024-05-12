@extends('layout.mainlayout')

@section('title', 'Books')

@section('content')



    

    <div class="my-5" >
        <div class="row">
            @foreach ($books as $item)
            <div class="col-lg-3 col-md-4 col-sm-6 mb-3">
             <div class="card h-100" >
                <img img src="{{ asset('storage/app/cover'.$item->cover)}}" class="card-img-top" draggable="false">
                <div class="card-body">
                  <h5 class="card-title">{{ $item->book_code}}</h5>
                  <p class="card-text">{{ $item->title}}</p>
                  <p class="card-text text-end {{ $item->status  == 'In Stock' ? 'text-success' : 'text-danger'}}">
                    {{ $item->status}}</p>
                 
                </div>
            </div>
        </div>
        @endforeach


        </div>
    </div>

@endsection
