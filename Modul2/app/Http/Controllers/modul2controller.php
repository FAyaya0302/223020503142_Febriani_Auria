<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Modul2Controller extends Controller
{
    public function index(Request $request)
    {
        // Implementasi logika tampilan login di sini
        return view('modul2');
    }

public function login(Request $request)
{
    $username = $request->input('username');
    $password = $request->input('password');


    // Mengecek panjang username dan password
    if (strlen($username) > 7 || strlen($password) < 10) {
        return redirect()->route('modul2')->with(['error'=>'Login gagal!  Username maksimal 7 karakter dan password minimal 10 karakter']) ;
    }

    // Mengecek apakah password mengandung huruf kapital, huruf kecil, angka, dan karakter khusus
    if (!preg_match('/[A-Z]/', $password) || !preg_match('/[a-z]/', $password) || !preg_match('/[0-9]/', $password) || !preg_match('/[^a-zA-Z0-9]/', $password)) {
        return redirect()->route('modul2')->with(['error'=>'Login gagal! Password harus mengandung huruf kapital, huruf kecil, angka, dan karakter khusus.'])  ;
    }

  return redirect()->route('modul2')->with(['success'=>'Login berhasil!']);



}
}