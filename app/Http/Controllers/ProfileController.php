<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    // deklarasikan sebuah function untuk dipanggil di routing.
    public function index()
    {
        return  "ini adalah halaman index dari profile";
    }

    public function form()
    {
        return "ini adalah halaman form";
    }

    public function cek_umur (Request $request){

        // Tambahkan validasi untuk input form.
        $request->validate([
            'umur' => 'required|integer|min:1'
        ]);
    
        // menyimpan nilai umur user ke dalam session.
        $request->session()->put('umur', $request->umur);
    
        // mengarahkan user ke dalam halaman utama.
        return redirect()->route('halaman-utama');
    }

    public function halaman_utama(){
        return "Anda lebih dari 18 tahun, Selamat datang di halaman utama.";
    }

}
