<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hutang extends Model
{
    use HasFactory;

    protected $fillable = [
        'penitipan_id',
        'jumlah_hutang',
        'jumlah_bayar',
        'status',
        'tanggal'
    ];

    // Relasi ke model Penitipan
    public function penitipan()
    {
        return $this->belongsTo(Penitipan::class);
    }

    // Menghitung sisa hutang (otomatis)
    public function getSisaHutangAttribute()
    {
        return $this->jumlah_hutang - $this->jumlah_bayar;
    }

    // Mengatur status otomatis
    public function getStatusAttribute()
    {
        return $this->jumlah_hutang == $this->jumlah_bayar ? 'Lunas' : 'Belum Lunas';
    }

    protected $casts = [
        'tanggal' => 'datetime', // Laravel otomatis mengonversi kolom ini
    ];
}
