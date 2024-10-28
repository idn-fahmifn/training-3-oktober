<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckAge
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        // ambil nilai umur dari form yang sudah diinputkan : 
        $umur = $request->session()->get('umur');

        // jika Kurang dari 18 tahun, jangan diizinkan masuk ke halaman utama.
        if($umur < 18){
            return redirect()->route('cek-umur')->with('error', 'Kamu belum memenuhi syarat umur');
        }
        // jika berhasil, maka akan diarahkan ke halaman selanjutnya sesuai yang diarahkan oleh routing.
        return $next($request);
    }
}
