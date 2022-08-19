<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservasi extends Model
{
    protected $fillable = [
        'tipe',
        'harga_kamar',
        'name',
        'jumlah_kamar',
        'checkin',
        'checkout',
    ];
}
