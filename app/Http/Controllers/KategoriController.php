<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //mengambil data dari model 
        $data = Kategori::all();
        //mengalihkan dan mengirim data ke view
        return view('kategori.tampil', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //mengalihkan ke halaman create(tambah)
        return view('kategori.tambah');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // mengirim data ke db
        Kategori::create($request->all());

        //memanggil alert jika perintah berhasil
        Alert::success('Selamat', 'Data Berhasil DItambah');
        //mengalihkan ke route index
        return redirect('kategori');
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
        //mengambil id untuk diedit
        $data = Kategori::findOrFail($id);
        //mengalihkan ke view edit
        return view('kategori.edit', compact('data'));
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
        //mengambil data dari form
        $data = $request->all();

        //mengirim data ke model
        Kategori::create($data);

        //memanggil alert jika perintah berhasil
        Alert::success('Selamat', 'Data Berhasil Diupdate');
        //mengalihkan ke route
        return redirect('kategori');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //mengambil id untuk destroy
        $data = Kategori::findOrFail($id);
        //menjalankan fungsi delete
        $data->delete();
        //mengalihkan ke route index

        //memanggil alert jika perintah berhasil
        Alert::success('Selamat', 'Data Berhasil Dihapus');
        return redirect('kategori');
    }
}
