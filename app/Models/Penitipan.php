<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penitipan extends Model
{
    use HasFactory;
    protected $fillable=['nama_umkm','pemilik_umkm','harga_satuan','tanggal','harga_bayar','status'];

    public function produk()
    {
        return $this->hasMany(Produk::class);
    }
}
