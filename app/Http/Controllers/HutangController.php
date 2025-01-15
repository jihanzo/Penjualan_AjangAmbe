<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hutang;
use App\Models\Penitipan;
use Illuminate\View\View;

class HutangController extends Controller
{
    public function index()
    {
        $hutangs = Hutang::all();
        return view('hutang.index', [
            'title' => 'Hutang',
            'hutangs' => $hutangs
        ]);
    }

    public function create()
    {
        $penitipan = Penitipan::all();
        return view('hutang.create', [
            'title' => 'Tambah Hutang',
            'penitipan' => $penitipan
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'penitipan_id' => 'required|exists:penitipans,id',
            'jumlah_hutang' => 'required',
            'jumlah_bayar' => 'required',
        ]);

        // Hitung sisa_hutang
        $sisa_hutang = $request->jumlah_hutang - $request->jumlah_bayar;

        // Simpan data ke database
        Hutang::create([
            'penitipan_id' => $request->penitipan_id,
            'jumlah_hutang' => $request->jumlah_hutang,
            'jumlah_bayar' => $request->jumlah_bayar,
            'sisa_hutang' => $sisa_hutang,
            'status' => $sisa_hutang > 0 ? 'Belum Lunas' : 'Lunas',
            'tanggal' => now(), // Atur tanggal jika perlu
        ]);

        return redirect()->route('hutang.index')->with('success', 'Data hutang berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $hutang = Hutang::findOrFail($id);
        $penitipan = Penitipan::all();
        return view('hutang.edit', compact('hutang', 'penitipan'))->with(["title" => "Ubah Data Penitipan"]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'penitipan_id' => 'required|exists:penitipans,id',
            'jumlah_hutang' => 'required|numeric',
            'jumlah_bayar' => 'required|numeric'
        ]);

        $hutang = Hutang::findOrFail($id);

        // Validasi jumlah_bayar tidak boleh lebih besar dari jumlah_hutang
        if ($request->jumlah_bayar > $request->jumlah_hutang) {
            return redirect()->back()->withErrors(['jumlah_bayar' => 'Jumlah Bayar tidak boleh lebih besar dari Jumlah Hutang']);
        }

        // Menghitung ulang sisa_hutang
        $sisa_hutang = $request->jumlah_hutang - $request->jumlah_bayar;

        // Menentukan status berdasarkan sisa_hutang
        $status = $sisa_hutang <= 0 ? 'Lunas' : 'Belum Lunas';

        // Update data hutang
        $hutang->update([
            'penitipan_id' => $request->penitipan_id,
            'jumlah_hutang' => $request->jumlah_hutang,
            'jumlah_bayar' => $request->jumlah_bayar,
            'sisa_hutang' => $sisa_hutang,
            'status' => $status,
            'tanggal' => now(), // Update tanggal jika diperlukan
        ]);

        return redirect()->route('hutang.index')->with('success', 'Hutang Berhasil Diperbarui');
    }

}
