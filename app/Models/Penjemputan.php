<?php

namespace App\Models;
use App\Models\Transaksi;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penjemputan extends Model
{
    use HasFactory;

    protected $table = 'penjemputan';

    protected $fillable = [

        'name',
        'harga',
    ];
    public function Transaksi(){
        return $this->hasOne(Transaksi::class);

    }
}
