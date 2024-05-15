<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\RentLogs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function profile()
    {

        $rentlogs = RentLogs::with('user', 'book')->where('user_id', Auth::user()->id)->get();
        return view('profile', ['rent_logs' => $rentlogs]);
    }

    public function index()
    {
        $user = User::where('role_id', 2)->where('status', 'Aktif')->get();
        return view('user', ['user' => $user]);
    }

    public function registeredUser()
    {
        $registeredUser = User::where('status', 'Tidak Aktif')->where('role_id', 2)->get();
        return view('registered-user', ['registeredUser' => $registeredUser]);
    }

    public function show($slug)
    {

        $user = User::where('slug', $slug)->first();
        $rentlogs = RentLogs::with('user', 'book')->where('user_id', $user->id)->get();
        return view('users-detail', ['user' => $user, 'rent_logs' => $rentlogs]);
    }

    public function approve($slug)
    {
        $user = User::where('slug', $slug)->first();
        $user->status = 'Aktif';
        $user->save();

        return redirect('users-detail/' . $slug)->with('status', 'User Approved successfully');
    }

    public function delete($slug)
    {
        $user = User::where('slug', $slug)->first();
        return view('user-delete', ['user' => $user]);
    }

    public function destroy($slug)
    {
        $user = User::where('slug', $slug)->first();
        $user->delete();
        return redirect('users')->with('status', 'User Deleted successfully');
    }
}
