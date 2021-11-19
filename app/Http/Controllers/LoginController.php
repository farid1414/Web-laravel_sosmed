<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Profil;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;


class LoginController extends Controller
{
    public function create(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'password' => 'min:6'
        ]);

        // Insert ke dalam tabel profil
        $profil = \App\Models\Profil::create($request->all());

        // insert kedalam tabel users
        $full = $request->first_name . " " . $request->last_name;
        $pass = $request->password;
        User::create([
            'name' => $full,
            'email' => $request->email,
            'profil_id' => $profil->id,
            'password' => Hash::make($pass),
        ]);
        return redirect::back()->with('sukses', 'Registrasi berhasil silahkan login');
    }
    public function logout()
    {
        Auth::logout();
        return Redirect('/');
    }
    public function postlogin(Request $request)
    {
        if (Auth::attempt($request->only('email', 'password'))) {
            return redirect('/');
        }
        return Redirect::back()->with('gagal', 'Email atau kata sandi anda salah');
    }
}