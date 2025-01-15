<?php

namespace App\Http\Livewire;

use App\Models\Transaksi;
use App\Models\Detailtransaksi;
use App\Models\Produk;
use Exception;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Redirect;

class Transaksis extends Component
{
    public $total = 0;
    public $transaksi_id;
    public $produk_id;
    public $qty = 1; // Default quantity
    public $uang = 0;
    public $kembali = 0;

    public function render()
    {
        // Ambil transaksi terakhir berdasarkan user_id
        $transaksi = Transaksi::where('user_id', Auth::user()->id)->orderBy('id', 'desc')->first();

        if ($transaksi) {
            $this->total = $transaksi->total;
            $this->uang = is_numeric($this->uang) ? (float) $this->uang : 0;
            $this->kembali = max(0, $this->uang - $this->total); // Pastikan nilai tidak negatif
        }

        return view('livewire.transaksis')
            ->with("data", $transaksi)
            ->with("dataProduk", Produk::where('stok', '>', 0)->get())
            ->with("dataDetailtransaksi", $transaksi ? Detailtransaksi::where('transaksi_id', $transaksi->id)->get() : []);
    }

    public function store()
    {
        // Validasi input
        $this->validate([
            'produk_id' => 'required',
            'qty' => 'required|integer|min:1',
        ]);

        // Ambil transaksi terakhir
        $transaksi = Transaksi::where('user_id', Auth::user()->id)->orderBy('id', 'desc')->first();

        if (!$transaksi) {
            session()->flash('error', 'Transaksi tidak ditemukan.');
            return;
        }

        $this->transaksi_id = $transaksi->id;

        // Ambil produk yang dipilih
        $produk = Produk::find($this->produk_id);
        if (!$produk) {
            session()->flash('error', 'Produk tidak ditemukan.');
            return;
        }

        // Tambahkan detail transaksi
        DetailTransaksi::create([
            'transaksi_id' => $this->transaksi_id,
            'produk_id' => $this->produk_id,
            'qty' => $this->qty,
            'harga' => $produk->harga,
        ]);

        // Perbarui total transaksi
        $total = $transaksi->total + ($produk->harga * $this->qty);
        $transaksi->update(['total' => $total]);

        // Reset form input
        $this->produk_id = null;
        $this->qty = 1;

        session()->flash('message', 'Produk berhasil ditambahkan ke transaksi.');
    }

    public function delete($detailtransaksi_id)
    {
        // Temukan detail transaksi berdasarkan ID
        $detailtransaksi = Detailtransaksi::find($detailtransaksi_id);

        if ($detailtransaksi) {
            // Kurangi total transaksi dengan nilai item yang akan dihapus
            $harga_item = $detailtransaksi->qty * $detailtransaksi->harga;

            $transaksi = Transaksi::find($detailtransaksi->transaksi_id);
            if ($transaksi) {
                $transaksi->total -= $harga_item;
                $transaksi->save();
            }

            // Hapus detail transaksi dari database
            $detailtransaksi->delete();

            session()->flash('message', 'Item berhasil dihapus.');
        } else {
            session()->flash('error', 'Item tidak ditemukan.');
        }
    }

    public function receipt($id)
    {
        // Ambil detail transaksi berdasarkan transaksi_id
        $detailtransaksi = Detailtransaksi::where('transaksi_id', $id)->get();

        foreach ($detailtransaksi as $od) {
            $stoklama = Produk::find($od->produk_id)->stok;
            $stokbaru = $stoklama - $od->qty;

            // Perbarui stok produk
            Produk::where('id', $od->produk_id)->update([
                'stok' => $stokbaru,
            ]);
        }

        return Redirect::route('cetakReceipt')->with(['id' => $id]);
    }
}
