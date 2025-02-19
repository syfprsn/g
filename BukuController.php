<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buku;

class BukuController extends Controller
{
    public function index()
    {
        $buku = Buku::all(); // Mengambil semua data buku
        return view('admin.buku', compact('buku'));
    }

    public function create()
    {
        $buku = Buku::all();
        return view('admin.buku_create', compact('buku')); // Form tambah
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'pengarang' => 'required',
            'penerbit' => 'required',
            'tahun_terbit' => 'required|integer',
            'keterangan' => 'nullable',
        ]);

        Buku::create($request->all()); // Simpan ke database
        return redirect()->route('admin.buku')->with('success', 'Buku berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $buku = Buku::findOrFail($id);
        return view('admin.buku_edit', compact('buku')); // Form edit buku
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required',
            'pengarang' => 'required',
            'penerbit' => 'required',
            'tahun_terbit' => 'required|integer',
            'keterangan' => 'nullable',
        ]);

        $buku = Buku::findOrFail($id);
        $buku->update($request->all()); // Update buku
        return redirect()->route('admin.buku')->with('success', 'Buku berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $buku = Buku::findOrFail($id);
        $buku->delete(); // Hapus buku dari database
        return redirect()->route('admin.buku')->with('success', 'Buku berhasil dihapus!');
    }
}
