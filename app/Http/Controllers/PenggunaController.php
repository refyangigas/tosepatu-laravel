<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class PenggunaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datauser = User::where('id_role', '2')->get();
        return view('admin.pages.pengguna', compact('datauser'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|email|unique:users,email',
            'password' => 'required|string|min:8',

        ], [
                'name.required' => 'name tidak boleh kosong',
                'name.string' => 'name harus berupa huruf',
                'email.required' => 'email tidak boleh kosong',
                'email.unique' => 'email telah terdaftar',
                'email.email' => 'email harus berupa email @',
                'password.required' => 'password tidak boleh kosong',
                'password.string' => 'password harus berupa huruf',
                'password.min' => 'pasword minimal 8 karakter'

            ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'id_role' => '2',
        ]);

        return redirect('/pengguna')->with('add', 'berhasil delete');

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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|email|unique:users,email, ' . $id,
            'password' => 'required|string|min:8',

        ]);

        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();

        return redirect('/pengguna')->with('update', 'berhasil delete');

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();

        return redirect('/pengguna')->with('delete', 'berhasil delete');

    }
}