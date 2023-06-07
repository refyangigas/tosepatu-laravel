<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $table = 'transaksi';

    protected $fillable = [

        'id_pembayaran',
        'id_layanan',
        'id_penjemputan',
        'id_pengiriman',
        'id_user',
        'alamat',
        'status',
        'jumlah',
        'bukti',
        'tanggal',

    ];
    public function Layanan()
    {
        return $this->belongsTo(Layanan::class, 'id_role', 'id');
    }

    public function Pembayaran()
    {
        return $this->belongsTo(Pembayaran::class, 'id_role', 'id');
    }

    public function Pengiriman()
    {
        return $this->belongsTo(Pengiriman::class, 'id_role', 'id');
    }

    public function Penjemputan()
    {
        return $this->belongsTo(Penjemputan::class, 'id_role', 'id');
    }

}