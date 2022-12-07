<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //mengambil data dari model 
        $data = User::all();

        //mengalihkan dan mengirim data ke view
        return view('user.tampil', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //mengalihkan ke halaman create(tambah)
        return view('user.tambah');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //menjalankan perintah store
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);

        //memanggil alert jika perintah berhasil
        Alert::success('Selamat', 'Data berhasil ditambah');
        //mengalihkan ke route index
        return redirect('user');
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
    public function edit($id)
    {
        //mengambil id
        $data = User::findOrFail($id);
        //mengirim data dan mengalihkan ke view edit
        return view('user.edit', compact('data'));
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
        //mengambil id
        $data = User::findOrFail($id);
        //menjalankan perintah update
        $data->update([
            'role' => $request->role,
        ]);

        //memanggil alert jika perintah berhasil
        Alert::success('Selamat', 'Data berhasil diupdate');
        //mengalihkan ke route index
        return redirect('user');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //mengambil id
        $data = User::findOrFail($id);
        //menjalankan perintah delete
        $data->delete();

        //memanggil alert jika perintah berhasil
        Alert::success('Selamat', 'Data berhasil dihapus');
        //mengalihkan ke route index
        return redirect('user');
    }
}
