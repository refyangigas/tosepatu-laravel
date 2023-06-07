<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use Illuminate\Http\Request;

class ApiPembayaranController extends Controller
{
    public function all(){
        $pembayaran = Pembayaran::orderByDesc('id')->get();
        return response()->json([
            "message" => "success",
            "data"=> $pembayaran
        ]);
    }

}
