<?php

use App\Http\Middleware\CheckAge;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Mendeklarasikan atau mendefinisikan sebuah route.
Route::get('barang', function(){

    $data = "Mobil"; //variable yang akan ditampilkan di dalam halaman
 
    // perintah untuk menampilkan halaman coba.blade.php dan mengenalkan variabel data agar bisa dibaca di
    return view('coba', compact('data'));
});

// routing dengan parameters.
Route::get('biodata/{a}', function($nama){
    return "Ini halaman biodata ".$nama;
});

// routing parameters jika responnya ditampilkan di sebuah Halaman.
Route::get('barang/{param}', function($nama_barang){
    return view('detail-barang', compact('nama_barang'));
});


Route::get('makanan', function(){

    $data = 'Bakso'; //variable yang akan ditampilkan di dalam halaman
 
    // perintah untuk menampilkan halaman coba.blade.php dan mengenalkan variabel data agar bisa dibaca di
    return view('coba', compact('data'));
});

Route::get('makanan/{param}', function($teman){
    $data = 'Bakso'; //variable yang akan ditampilkan di dalam halaman
    return view('detail-makanan', compact('teman', 'data'));
});


Route::get('formulir', function(){
    // menampilkan halaman yang berisi form.
    return view('form-data');
});

// routing dengan method POST, fungsinya untuk mengirimkan request data ke database.
Route::post('formulir', function(Request $request){
    $data = $request->all();
    dd ($data);
})->name('kirim-data-formulir');

// mengarahkan atau memberi respon jika tidak ada uri yang sesuai, biasanya diarahkan ke halman 404;
Route::fallback(function(){
    return "404,halamanya gada yang cocok";
});

// Halaman Cek Umur -> untuk ditampilkan.
Route::get('cek-umur', function(){
    return view('umur.cek');
})->name('cek-umur');

// Handle form submission untuk mengelola umur.
Route::post('proses-umur', function(Request $request){

    // Tambahkan validasi untuk input form.
    $request->validate([
        'umur' => 'required|integer|min:1'
    ]);

    // menyimpan nilai umur user ke dalam session.
    $request->session()->put('umur', $request->umur);

    // mengarahkan user ke dalam halaman utama.
    return redirect()->route('halaman-utama');
})->name('proses-umur');

// menampilkan halaman utama jika memenuhi syarat (Lebih dari 18 tahun)
Route::get('utama', function(){
    return "Anda lebih dari 18 tahun, Selamat datang di halaman utama.";
})->name('halaman-utama')->middleware(CheckAge::class);

// ===================== end ============================================


// routing dengan controller