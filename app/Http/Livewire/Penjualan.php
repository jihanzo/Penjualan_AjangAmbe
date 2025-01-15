<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Transaksi;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class Penjualan extends Component
{
    public $user_id;

    public function render()
    {
        return view('livewire.penjualan', [
            'data' => User::orderBy('id', 'desc')->get()
        ]);
    }

    public function store()
    {
        Transaksi::create([
            'invoice' => $this->invoice(),
            'user_id' => Auth::user()->id,
            'total' => '0'
        ]);
        return redirect()->to('transaksi');
    }

    public function invoice()
    {
        $transaksi = Transaksi::orderBy('created_at', 'DESC')->first();

        if ($transaksi) {
            $explode = explode('-', $transaksi->invoice);
            $nextNumber = (int) $explode[1] + 1;
            return 'INV-' . $nextNumber;
        }

        return 'INV-1';
    }
}
