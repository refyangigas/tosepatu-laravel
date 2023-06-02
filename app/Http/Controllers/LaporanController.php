<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.pages.laporan');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\LaporanController  $laporanController
     * @return \Illuminate\Http\Response
     */
    public function show(LaporanController $laporanController)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\LaporanController  $laporanController
     * @return \Illuminate\Http\Response
     */
    public function edit(LaporanController $laporanController)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\LaporanController  $laporanController
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, LaporanController $laporanController)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LaporanController  $laporanController
     * @return \Illuminate\Http\Response
     */
    public function destroy(LaporanController $laporanController)
    {
        //
    }
}
