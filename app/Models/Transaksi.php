<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Transaksi extends Model
{
    use HasFactory;

    protected $fillable=['invoice','user_id','total'];

    public function detailtransaksi():HasMany
    {
        return $this->hasMany(Detailtransaksi::class);
    }

    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
