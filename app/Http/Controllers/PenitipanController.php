<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penitipan;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class PenitipanController extends Controller
{
    public function index()
    {
        return view('penitipan.tabel', [
            "title"=> "Penitipan",
            "data"=> Penitipan::all()
        ]);
    }

    public function create():View
    {
        return view('penitipan.tambah')->with(["title"=>"Tambah Data Penitipan"]);
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            "nama_umkm"=>"required",
            "pemilik_umkm"=>"required",
            "harga_satuan"=>"required",
            "tanggal"=>"required",
            "harga_bayar"=>"required",
            "status"=>"required"
        ]);

        Penitipan::create($request->all());
        return redirect()->route('penitipan.index')->with('succes','Data Penitipan Berhasil Ditambahkan');
    }

    public function edit(Penitipan $penitipan):View
    {
        return view('penitipan.edit',compact('penitipan'))->with(["title"=> "Ubah Data Penitipan"]);
    }

    public function update(Request $request, Penitipan $penitipan): RedirectResponse
    {
        $request->validate([
            "nama_umkm"=>"required",
            "pemilik_umkm"=>"required",
            "harga_satuan"=>"required",
            "tanggal"=>"required",
            "harga_bayar"=>"required"
        ]);

        $penitipan->update($request->all());

        return redirect()->route('penitipan.index')
                        ->with('updated','Data Penitipan Berhasil Diubah');
    }

    public function show(Penitipan $penitipan):View
    {
        return view('penitipan.tampil',compact('penitipan'))
        ->with(["title"=> "Data Penitipan"]);
    }

    public function destroy($id):RedirectResponse
    {
        Penitipan::where('id',$id)->delete();
        return redirect()->route('penitipan.index')->with('deleted','Data Penitipan Berhasil Dihapus');
    }
}
