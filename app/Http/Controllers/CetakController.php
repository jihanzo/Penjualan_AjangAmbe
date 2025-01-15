<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;
use Illuminate\View\View;
use App\Models\Detailtransaksi;
use Illuminate\Support\Facades\Auth;


class CetakController extends Controller
{
    //
    public function receipt():View
    {
        $id=Auth::user()->id;
        
        $transaksi=Transaksi::find($id);
        $detailtransaksi=Detailtransaksi::where('transaksi_id',$id)->get();
        return view('penjualan.receipt')->with([
            'dataTransaksi'=>$transaksi,
            'dataDetailtransaksi'=>$detailtransaksi
        ]);
    }
}
