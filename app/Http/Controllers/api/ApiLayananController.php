<?php

namespace App\Http\Controllers;

use App\Models\Layanan;
use Illuminate\Http\Request;

class ApiLayananController extends Controller
{
    public function all(){
        $layanan = Layanan::orderByDesc('id')->get();
        return response()->json([
            "message" => "success",
            "data"=> $layanan
        ]);
    }
}
