<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Menampilkan form login
     */
    public function showLoginForm()
    {
        return view('login');
    }


    public function login(Request $request)
    {
        $admin = Admin::where('username', $request->username)->first();

        // dd($request->password == $admin->password);

        if ($request->password == $admin->password) {
            return redirect()->intended('posts/index');
        }

        // Jika login gagal
        return back()->withErrors(['username' => 'Username atau password salah.'])->withInput();
    }


    public function create(): View
    {
        return view('register');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required',
            'username' => 'required|unique:admins',
            'password' => 'required',
            'email' => 'required|email|unique:admins',
            'profile_image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Upload image if exists

        if ($request->hasFile('profile_image')) {
            $file = $request->file('profile_image');
            $name = strval(time())  . $file->getClientOriginalName();
            $path = "assets/foto_profile/";
            $fullPath = $path . $name;

            $file->move($path, $name);
        }

        Admin::create([
            'name' => $request->name,
            'username' => $request->username,
            'password' => $request->password,
            'email' => $request->email,
            'profile_image' => $fullPath,
        ]);

        return redirect()->route('dashboard.index')->with('success', 'Admin berhasil ditambahkan');
    }
}