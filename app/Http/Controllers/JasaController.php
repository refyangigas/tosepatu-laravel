<?php

namespace App\Http\Controllers;

use App\Models\Layanan;
use App\Models\Pengiriman;
use App\Models\Penjemputan;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\New_;


class JasaController extends Controller
{
    public function index()
    {
        $datalayanan = Layanan::all();
        $datapenjemputan = Penjemputan::all();
        $datapengiriman = Pengiriman::all();
        return view('admin.pages.jasa',[
            'datalayanan'=>$datalayanan,
            'datapenjemputan'=>$datapenjemputan,
            'datapengiriman'=>$datapengiriman,
        ]);
    }

    public function create(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'harga' => 'required|integer',
        ], [
            'name.required' => 'name tidak boleh kosong',
            'name.string' => 'name harus berupa huruf',
            'harga.required' => 'harga tidak boleh kosong',
            'harga.integer' => 'harga harus berupa angka',
        ]);

        Layanan::create([
            'name' => $request->name,
            'harga' => $request->harga,
        ]);

        return redirect('/jasa')->with('update', 'berhasil delete');
    }

    public function createLayanan(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'harga' => 'required|integer',
        ]);

        $layanan = new Layanan();
        $layanan->name = $request->name;
        $layanan->harga = $request->harga;
        $layanan->save();

        return redirect('/jasa')->with('add','berhasil ditambah');
    }

    public function createPenjemputan(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'harga' => 'required|integer',
        ]);

        $penjemputan = new Penjemputan();
        $penjemputan->name = $request->name;
        $penjemputan->harga = $request->harga;
        $penjemputan->save();

        return redirect('/jasa')->with('add','berhasil ditambah');
    }

    public function createPengiriman(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'harga' => 'required|integer',
        ]);

        $pengiriman = new Pengiriman();
        $pengiriman->name = $request->name;
        $pengiriman->harga = $request->harga;
        $pengiriman->save();

        return redirect('/jasa')->with('add', 'berhasil ditambah');
    }

    public function editLayanan(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string',
            'harga' => 'required|integer',
        ]);

        $layanan = Layanan::find($id);
        $layanan->name = $request->name;
        $layanan->harga = $request->harga;
        $layanan->save();

        return redirect('/jasa')->with('update', 'berhasil di ubah');
    }

    public function editPenjemputan(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string',
            'harga' => 'required|integer',
        ]);

        $penjemputan = Penjemputan::find($id);
        $penjemputan->name = $request->name;
        $penjemputan->harga = $request->harga;
        $penjemputan->save();

        return redirect('/jasa')->with('update', 'berhasil di ubah');
    }

    public function editPengiriman(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string',
            'harga' => 'required|integer',
        ]);

        $pengiriman = Pengiriman::find($id);
        $pengiriman->name = $request->name;
        $pengiriman->harga = $request->harga;
        $pengiriman->save();

        return redirect('/jasa')->with('update', 'berhasil di ubah');
    }

    public function destroyLayanan($id)
    {
        $layanan = Layanan::find($id);
        if ($layanan) {
            $layanan->delete();
            return redirect('/jasa')->with('delete', 'berhasil delete');
        } else {
            return redirect('/jasa')->with('error', 'Data tidak ditemukan');
        }
    }

    public function destroyPenjemputan($id)
    {
        Penjemputan::find($id)->delete();

        return redirect('/jasa')->with('delete', 'berhasil delete');
    }

    public function destroyPengiriman($id)
    {
        Pengiriman::find($id)->delete();

        return redirect('/jasa')->with('delete', 'berhasil delete');
    }
}
