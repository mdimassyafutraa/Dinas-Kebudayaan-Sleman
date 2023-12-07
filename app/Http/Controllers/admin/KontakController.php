<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Kontak;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class KontakController extends Controller
{
    function index()
    {
        $kontak = Kontak::all();

        return view('admin.kontak', compact('kontak'));
    }


    function store(Request $request)
    {
        $existingContact = Kontak::where('kategori', $request['kategori'])->first();

        if ($existingContact) {
            return redirect()->back()->with('error', 'Kontak sudah di isi, silahkan hapus terlebih dahulu sebelum mengisi lagi');
        }

        $kontak = new Kontak();
        $kontak->title = $request['title'];
        $kontak->kategori = $request['kategori'];
        $kontak->link = $request['link'];

        $kontak->save();
        return redirect()->back()->with('success', 'Kontak berhasil ditambahkan!');
    }

    function destroy($id)
    {
        $kontak = Kontak::findOrFail($id);

        $kontak->delete();

        return Redirect::back()->with('success', 'Kontak berhasil dihapus!');
    }
}
