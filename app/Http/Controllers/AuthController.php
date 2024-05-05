<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function register()
    {
        return view('register');
    }

    public function authenticating(Request $request)
    {
        $credentials = $request->validate([
            'u_name' => ['required'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {

            if (Auth::user()->status != 'Aktif') {
                Session::flash('status', 'Gagal');
                Session::flash('massage', 'Akun Mu tidak aktif silahkan kontak Admin');
                return redirect('/login');
            }

            // $request->session()->regenerate();
            if (Auth::user()->role_id == 1) {
                return redirect('dashboard');
            }

            if (Auth::user()->role_id == 2) {
                return redirect('profile');
            }
            $request->session()->regenerate();

            // return redirect();
        }

        Session::flash('status', 'Failed');
        Session::flash('massage', 'gagal login');
        return redirect('/login');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('login');
    }
}
