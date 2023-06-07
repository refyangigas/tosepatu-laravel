<?php

namespace App\Http\Controllers;

use App\Models\Pengiriman;
use Illuminate\Http\Request;

class ApiPengirimanController extends Controller
{
    public function all(){
        $pengiriman = Pengiriman::orderByDesc('id')->get();
        return response()->json([
            "message" => "success",
            "data"=> $pengiriman
        ]);
    }

}
