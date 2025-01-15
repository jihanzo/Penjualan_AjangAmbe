<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; 
use App\Models\Transaksi;

class LaporanController extends Controller
{
    public function index(Request $request)
    {
        // Inisialisasi query builder
        $query = Transaksi::query();

        // Tambahkan kondisi pencarian jika ada
        if ($request->filled('q')) {
            $query->where('id', 'LIKE', '%' . $request->q . '%');
        }
        if ($request->filled('tanggal_mulai')) {
            $query->where('created_at', '>=', $request->tanggal_mulai);
        }
        if ($request->filled('tanggal_selesai')) {
            $query->where('created_at', '<=', $request->tanggal_selesai);
        }

        // Eksekusi query untuk mendapatkan data
        $transaksi = $query->get();

        // Hitung total penjualan
        $totalpenjualan = $query->sum('total');

        // Judul halaman
        $title = "Laporan Penjualan";

        // Tampilkan halaman laporan
        return view('laporan.laporan', compact('transaksi', 'totalpenjualan', 'title'));
    }
}
