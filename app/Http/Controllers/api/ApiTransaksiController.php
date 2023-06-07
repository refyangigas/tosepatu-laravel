<?php

namespace App\Http\Controllers;

use App\Models\Layanan;
use Illuminate\Http\Request;

class ApiTransaksiController extends Controller
{
    public function insert(Request $request){ 
    $user = $request->user()->id;
    $data = $request->validate([
        'id_pembayaran' => "required",
        'id_layanan' => "required",
        'id_penjemputan' => 'required',
        'id_pengiriman' => 'required',
        'alamat' => 'required',
        'jumlah' => 'required',
        'bukti' => 'required',

    ]);   
    $check = Layanan::where('id_user',$user)->where('status','belum_selesai')->exists();
    if ($check) {
        return response()->json([
            "message" => "failed"
        ]);
    } else {
        
       $transaksi= Layanan::create([
            'id_pembayaran'=> $data['id_pembayran'],
            'id_layanan'=> $data['id_layanan'],
            'id_penjemputan'=> $data['id_penjemputan'],
            'id_pengiriman'=> $data['id_pengiriman'],
            'id_user'=> $user,
            'alamat'=> $data['alamat'],
            'status'=> "belum_selesai",
            'jumlah'=> $data['jumlah'],
            'bukti'=> $data['bukti']

        ]);
        return response()->json([
            "message" => "Succes",
            "data" => $transaksi
    ]);
    }
    
        
    }
}
