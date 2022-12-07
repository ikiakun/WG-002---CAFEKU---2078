<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Dasboard extends Controller
{
    
    public function index()
    {
        //mengalihkan ke halaman dashboard
        return view('dashboard');
    }

    public function store(Request $request)
    {
        //deklarasi var
        $jmlPesanan = 0;
        if($request->menu != null){
            $menu = $request->menu;
            $jmlPesanan = count($menu);
        }
        $status = $request->status;
        $ttlPesanan = $jmlPesanan * 43900;
        
        //buat objek oop
        $pesan = new Pembayaran($status,$ttlPesanan);
        $bayar = $pesan->hitung();

        //take and send data
        $data = [
            'nama' => $request->nama,
            'jmlPesanan' => $jmlPesanan,
            'ttlPesanan' => $ttlPesanan,
            'status' => $status,
            'diskon' => $pesan->diskon($status,$ttlPesanan),
            'ttlBayar' => $bayar
        ];
        return view('dashboard',compact('data'));
    }
}

//bangun interface
interface Sembarang{
    public function diskon();
}

class Diskon implements Sembarang{
    public $status;
    public $ttlPesanan;
    public function __construct($status,$ttlPesanan)
    {
        $this->status = $status;
        $this->ttlPesanan = $ttlPesanan;
    }
    public function diskon()
    {
        if($this->status == 'member' && $this->ttlPesanan >=100000){
            return $this->ttlPesanan * 0.2;
        }elseif($this->status == 'member' && $this->ttlPesanan < 100000){
            return $this->ttlPesanan * 0.1;
        }else{
            return $this->ttlPesanan == 0;
        }
    }
}

//inhetitance
class Pembayaran extends Diskon{
    public function hitung()
    {
        return (int)$this->ttlPesanan - (int)$this->diskon($this->status,$this->ttlPesanan);
    }
}
