<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class PegawaiController extends Controller
{
    /**
     * index
     *
     * @return View
     */
    public function index(): View
    {
        $pegawais = Pegawai::latest()->paginate(10);
        return view('pegawais.index', compact('pegawais'));
    }

    /**
     * create
     *
     * @return View
     */
    public function create(): View
    {
        return view('pegawais.create');
    }

    /**
     * store
     *
     * @param  Request  $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'telepon' => 'required|string|max:20',
            'jabatan' => 'required|string|max:100',
        ]);

        Pegawai::create([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'telepon' => $request->telepon,
            'jabatan' => $request->jabatan,
        ]);

        return redirect()->route('pegawais.index')->with('success', 'Data Pegawai berhasil disimpan.');
    }

    /**
     * show
     *
     * @param  string  $id
     * @return View
     */
    public function show(string $id): View
    {
        $pegawai = Pegawai::findOrFail($id);
        return view('pegawais.show', compact('pegawai'));
    }

    /**
     * edit
     *
     * @param  mixed $id
     * @return View
     */
    public function edit(int $id): View
    {
        //get pegawai by ID
        $pegawai = Pegawai::findOrFail($id);

        //render view with pegawai
        return view('pegawais.edit', compact('pegawai'));
    }

    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $id
     * @return RedirectResponse
     */
    public function update(Request $request, $id): RedirectResponse
    {
        //validate form
        $request->validate([
            'nama'          => 'required',
            'alamat'        => 'required',
            'telepon'       => 'required',
            'jabatan'       => 'required'
        ]);

        //get pegawai by ID
        $pegawai = Pegawai::findOrFail($id);

        //update pegawai
        $pegawai->update([
            'nama'          => $request->nama,
            'alamat'        => $request->alamat,
            'telepon'       => $request->telepon,
            'jabatan'       => $request->jabatan
        ]);

        //redirect to index
        return redirect()->route('pegawais.index')->with(['success' => 'Data Pegawai Berhasil Diubah!']);
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
        $pegawai = Pegawai::findOrFail($id);


        //delete product
        $pegawai->delete();

        //redirect to index
        return redirect()->route('pegawais.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
