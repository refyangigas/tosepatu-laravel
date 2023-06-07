<?php

namespace App\Http\Controllers;

use App\Models\Penjemputan;
use Illuminate\Http\Request;

class ApiPenjemputanController extends Controller
{
    public function all(){
        $penjemputan = Penjemputan::orderByDesc('id')->get();
        return response()->json([
            "message" => "success",
            "data"=> $penjemputan
        ]);
    }

}
