<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //mengambil data dari model 
        $data = Menu::all();
        $data2 = Kategori::all();
        //mengalihkan dan mengirim data ke view
        return view('menu.tampil', compact('data', 'data2'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //mengambil data dari model 
        $data = Kategori::all();
        //mengalihkan ke halaman create(tambah)
        return view('menu.tambah', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //deklarasi file foto
        $foto = $request->file('foto')->store('menu/foto');

        Menu::create([
            'nama' => $request->nama,
            'foto' => $foto,
            'harga' => $request->harga,
            'keterangan' => $request->keterangan,
            'kategori_id' => $request->kategori_id,
        ]);

        //memanggil alert jika perintah berhasil
        Alert::success('Selamat', 'Data Berhasil Ditambahkan');
        //mengalihkan ke route index
        return redirect('menu');
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
        $data = Menu::findOrFail($id);
        $data2 = Kategori::all();
        //mengalihkan ke view edit
        return view('menu.edit', compact('data', 'data2'));
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
        //mengambil id db
        $data = Menu::findOrFail($id);
        //validasi
        $update = $request->validate([
            'nama' => 'required',
            'harga' => 'required',
            'keterangan' => 'required',
            'kategori_id' => 'required',
        ]);
        //menjalankan perintah update
        $data->update($update);

        //memproses file foto
        if($request->file('foto')){
            $file = $request->file('foto')->store('menu/foto');
            Storage::delete($data->foto);
            $data->update([
                'foto' => $file
            ]);
        }else {
            $data->update([
                'foto' => $data->foto
            ]);
        }

        //memanggil alert jika perintah berhasil
        Alert::success('Selamat', 'Data berhasil diupdate');

        //mengalihkan ke route index
        return redirect('menu');
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
        $data = Menu::findOrFail($id);
        //menjalankan perintah delete
        if($data->foto){
            Storage::delete($data->foto);
        };
        $data->delete();
        
        //memanggil alert jika perintah berhasil
        Alert::success('Selamat', 'Data Berhasil Dihapus');
        //mengalihkan ke route
        return redirect('menu');
    }
}
