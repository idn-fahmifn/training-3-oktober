<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use Illuminate\Http\Request;

class PhotosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Photo::all();
        return view('photo.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return "hallo, ini halaman create";
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $input = $request->all(); //mengambil semua nilai yang diinputkan ke dalam $input.
        Photo::create($input);
        return back()->with('success', 'Data photo berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $data = Photo::find($id);
        return view('photo.detail', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return "hallo, ini halaman edit";
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $input = $request->all(); //mengambil semua nilai yang ada di form update.
        $data = Photo::find($id); //mencari id data yang spesifik untuk diganti.
        $data->update($input); //update data dari input terbaru.
        return back()->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $data = Photo::find($id);
        $data->delete();
        return back()->with('success', 'Data berhasil dihapus');
    }
}
