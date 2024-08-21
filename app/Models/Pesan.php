<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesan extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'phone',
        'tipe',
        'paket',
        'harga',
        'tanggal',
        'jam',
        'payment_status',
        'bukti_pembayaran',
    ];

        public function user()
    {
        return $this->belongsTo(User::class);
    }
}
