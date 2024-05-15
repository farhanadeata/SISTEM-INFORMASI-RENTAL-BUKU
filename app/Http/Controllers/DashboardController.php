<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User;
use App\Models\Category;
use App\Models\RentLogs;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $rentlogs = RentLogs::with('user', 'book')->get();
        $bookCount = Book::count();
        $categoryCount = Category::count();
        $useryCount = User::count();

        return view('dashboard', [
            'book_count' => $bookCount,
            'category_count' => $categoryCount,
            'user_count' => $useryCount,
            'rent_logs' => $rentlogs
        ]);
    }
}
