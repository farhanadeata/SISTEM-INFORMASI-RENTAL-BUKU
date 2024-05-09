<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\RedirectResponse;

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
                Auth::logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();

                Session::flash('status', 'Gagal');
                Session::flash('massage', 'Akun Mu tidak aktif silahkan kontak Admin');
                return redirect('/login');
            }

            $request->session()->regenerate();

            if (Auth::user()->role_id == 1) {
                return redirect('dashboard');
            }

            if (Auth::user()->role_id == 2) {
                return redirect('profile');
            }
            $request->session()->regenerate();

            // return redirect();
        }

        Session::flash('status', 'Gagal');
        Session::flash('massage', 'gagal login');
        return redirect('/login');
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('login');
    }

    public function registerProcess(Request $request)
    {
        $validated = $request->validate([
            'u_name' => 'required|unique:users|max:255',
            'password' => 'required|max:255',
            'password' => 'max:16',
            'address' => 'required',
        ]);

        $user = User::create($request->all());
        Session::flash('status', 'success');
        Session::flash('massage', 'Akun berhasil dibuat silahkan tunggu konfirmasi Admin');
        return redirect('register');
    }
}
