<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    // kenalkan tabel di database dengan aplikasi kita.

    protected $table = 'photo';

    // kenalkan column yang ada pada tabel dengan aplikasi kita.

    // cara memasukan nama column sesuai dengan isi tabel.
    // protected $fillable = [
    //     'nama_photo', 'deskripsi'
    // ];

    // shortcut atau mengenalkan semua isi column yang ada pada laravel.
    protected $guarded;
}
