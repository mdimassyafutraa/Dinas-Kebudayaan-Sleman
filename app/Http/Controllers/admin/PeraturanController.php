<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Pelayanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PeraturanController extends Controller
{
    function index()
    {
        $peraturan = Pelayanan::all();

        return view('admin.peraturan', compact('peraturan'));
    }

    function store(Request $request)
    {
        $existingPelayanan = Pelayanan::where('kategori', $request['kategori'])->first();
        if ($existingPelayanan) {
            return redirect()->back()->with('error', 'File sudah di isi, silahkan hapus terlebih dahulu sebelum mengisi lagi');
        }

        $pelayanan = new Pelayanan();
        $pelayanan->name  = $request['name'];
        $pelayanan->kategori  = $request['kategori'];

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filePath = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('img/aturan&pelayanan'), $filePath);

            $pelayanan->file = $filePath;
        }

        $pelayanan->save();
        return redirect()->back()->with('success', 'File berhasil di tambahkan');
    }

    function destroy($id)
    {
        $pelayanan = Pelayanan::findOrFail($id);

        if ($pelayanan->file) {
            $filePath = public_path('img/aturan&pelayanan/' . $pelayanan->file);
            if (File::exists($filePath)) {
                File::delete($filePath);
            }
        }

        $pelayanan->delete();
        return redirect()->back()->with('success', 'File berhasil dihapus!');
    }
}
