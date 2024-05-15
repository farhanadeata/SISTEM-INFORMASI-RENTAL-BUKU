<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Book;
use App\Models\RentLogs;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class BookRentController extends Controller
{
    public function index()
    {
        $users = User::where('role_id', '!=', 1)->where('status', '!=', 'Tidak Aktif')->get();
        $books = Book::all();
        return view('book-rent', ['users' => $users, 'books' => $books]);
    }

    public function store(Request $request)
    {
        $request['rent_date'] = Carbon::now()->toDateString();
        $request['return_date'] = Carbon::now()->addDay(3)->toDateString();
        $book = Book::FindOrFail($request->book_id)->only('status');

        if ($book['status'] != 'In Stock') {
            Session::flash('message', 'Cannot rent, The book is Now Available');
            Session::flash('alert-class', 'alert-danger');
            return redirect('book-rent');
        } else {
            $count = RentLogs::where('user_id', $request->user_id)->where('actual_return_date', null)->count();
            if ($count >= 3) {
                Session::flash('message', 'Cannot rent, User is Limit Rent');
                Session::flash('alert-class', 'alert-danger');
                return redirect('book-rent');
            } else {
                try {
                    DB::beginTransaction();
                    // proses crate
                    RentLogs::create($request->all());
                    // proses update
                    $book = Book::findOrFail($request->book_id);
                    $book->status = 'Not Available';
                    $book->save();
                    DB::commit();
                    Session::flash('message', 'Book Rent, Success');
                    Session::flash('alert-class', 'alert-success');
                    return redirect('book-rent');
                } catch (\Throwable $th) {
                    DB::rollBack();
                }
            }
        }
    }

    public function returnBook()
    {
        $users = User::where('role_id', '!=', 1)->where('status', '!=', 'Tidak Aktif')->get();
        $books = Book::all();
        return view('return-book', ['users' => $users, 'books' => $books]);
    }

    public function saveReturnBook(Request $request)
    {
        $rent = RentLogs::where('user_id', $request->user_id)
            ->where('book_id', $request->book_id)->where('actual_return_date', null);
        $rentData = $rent->first();
        $countData = $rent->count();



        if ($countData == 1) {
            $rentData->actual_return_date = Carbon::now()->toDateString();
            $rentData->save();
            Session::flash('message', 'Book is returned Success');
            Session::flash('alert-class', 'alert-success');
            return redirect('book-return');
        } else {
            Session::flash('message', 'Error!!');
            Session::flash('alert-class', 'alert-danger');
            return redirect('book-return');
        }
    }
}
