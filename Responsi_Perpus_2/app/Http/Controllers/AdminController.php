<?php

namespace App\Http\Controllers;

use Illuminate\Http\hash;

//
use Illuminate\Support\Facades\File;

//import model product
use App\Models\Admin;

//import return type View
use Illuminate\View\View;

//import return type redirectResponse
use Illuminate\Http\RedirectResponse;

//import Facades Storage
use Illuminate\Support\Facades\Storage;

//import request
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * index
     *
     * @return void
     */
    public function index(): View
    {

        // dd('masuk, ');
        //get all admins
        $admins = Admin::latest()->paginate(10);

        //render view with admins
        return view('admins.index', compact('admins'));
    }




    public function create(): View
    {
        return view('admins.create');
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

        return redirect()->route('admins.index')->with('success', 'Admin berhasil ditambahkan');
    }



    /**
     * show
     *
     * @param  mixed $admin
     * @return void
     */
    public function show(Admin $admin): View
    {
        //render view with admin
        return view('admins.show', compact('admin'));
    }




    public function edit($id): View
    {
        // Get admin by ID
        $admin = Admin::findOrFail($id);

        // Render view with admin data
        return view('admins.edit', compact('admin'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return RedirectResponse
     */
    public function update(Request $request, $id): RedirectResponse
    {
        // Validate form
        $request->validate([
            'name' => 'required',
            'username' => 'required|unique:admins,username,' . $id,
            'password' => 'required',
            'email' => 'required|email|unique:admins,email,' . $id,
            'profile_image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Get admin by ID
        $admin = Admin::findOrFail($id);

        // Check if image is uploaded
        if ($request->hasFile('profile_image')) {
            // Upload new image
            $image = $request->file('profile_image');
            $imageName = $image->hashName();
            $image->storeAs('public/images', $imageName);

            // Delete old image
            Storage::delete('public/images/' . $admin->profile_image);

            // Update admin with new image
            $admin->update([
                'name' => $request->name,
                'username' => $request->username,
                'password' => $request->password,
                'email' => $request->email,
                'profile_image' => $imageName
            ]);
        } else {
            // Update admin without image
            $admin->update([
                'name' => $request->name,
                'username' => $request->username,
                'password' => $request->password,
                'email' => $request->email,
            ]);
        }

        // Redirect to index
        return redirect()->route('admins.index')->with('success', 'Data Berhasil Diubah!');
    }



    /**
     * destroy
     *
     * @param  mixed $id
     * @return RedirectResponse
     */
    public function destroy($id): RedirectResponse
    {
        //get product by ID
        $admins = Admin::findOrFail($id);

        // dd($admins);

        //delete image

        File::delete($admins->profile_image);

        // dd($test);

        //delete product
        $admins->delete();

        //redirect to index
        return redirect()->route('admins.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
