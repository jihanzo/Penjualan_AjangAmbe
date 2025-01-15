<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Produk extends Model
{
    use HasFactory;
    protected $fillable=['penitipan_id','namaproduk','harga','stok','foto','deskripsi'];

    public function penitipan()
    {
        return $this->belongsTo(Penitipan::class);
    }

    public function detailtransaksi():HasMany
    {
        return $this->hasMany(Detailtransaksi::class);
    }
}

