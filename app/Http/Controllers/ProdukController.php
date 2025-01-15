<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
 use App\Models\Penitipan;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class ProdukController extends Controller
{
    public function index()
    {
        $produk = Produk::all();
        return view('produk.index', [
            "title" => "Produk",
            "data" => $produk
        ]);
    }

    public function create(): View
    {
        $penitipan = Penitipan::all();
        return view('produk.create', compact('penitipan'))->with([
            "title" => "Tambah Data Produk",
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            "penitipan_id" => "required|exists:penitipans,id",
            "namaproduk" => "required",
            "harga" => "required",
            "stok" => "required",
            "foto" => "nullable|image|mimes:jpeg,png,jpg,gif|max:2048",
            "deskripsi" => "required"
        ]);

        $data = $request->all();
        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('produk', 'public');
        }

        Produk::create($data);
        return redirect()->route('produk.index')->with('success', 'Produk Berhasil Ditambahkan');
    }

    public function show(Produk $produk): View
    {
        return view('produk.show', compact('produk'))
            ->with(["title" => "Data Produk"]);
    }

    public function edit($id)
    {
        $produk = Produk::findOrFail($id); // Mengambil produk berdasarkan ID
        $penitipan = Penitipan::all(); // Menampilkan semua penitipan untuk dipilih
        return view('produk.edit', compact('produk', 'penitipan'))->with(["title" => "Ubah Data Penitipan"]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'penitipan_id' => 'required|exists:penitipans,id',
            'namaproduk' => 'required',
            'harga' => 'required',
            'stok' => 'required',
            'foto' => 'image|file|nullable',
            'deskripsi' => 'required',
        ]);

        $produk = Produk::findOrFail($id);

        $data = $request->all();

        if ($request->hasFile('foto')) {
            if ($produk->foto) {
                Storage::delete('public/' . $produk->foto);
            }

            $data['foto'] = $request->file('foto')->store('produk', 'public');
        }

        $produk->update($data);

        return redirect()->route('produk.index')->with('success', 'Produk Berhasil Diperbarui');
    }


}
