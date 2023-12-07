<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Fasilitas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class FasilitasController extends Controller
{
    function index(Request $request)
    {
        $fasilitasQuery = Fasilitas::query();
        $perPage = 10;

        if ($request->has('q')) {
            $searchQuery = $request->input('q');
            $fasilitasQuery->where(function ($query) use ($searchQuery) {
                $query->where('judul', 'like', '%' . $searchQuery . '%')
                    ->orWhere('kategori', 'like', '%' . $searchQuery . '%');
            });
        }

        $fasilitas = $fasilitasQuery->orderBy('created_at', 'desc')
            ->paginate($perPage);

        $currentPage = $request->input('page', 1);
        $itemNumber = ($currentPage - 1) * $perPage + 1;

        return view('admin.fasilitas', compact('fasilitas', 'itemNumber'));
    }

    function store(Request $request)
    {
        $fasilitas = new Fasilitas();
        $fasilitas->judul = $request['judul'];
        $fasilitas->kategori = $request['kategori'];
        $fasilitas->keterangan = $request['keterangan'];

        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $fotoPath = time() . '_' . $foto->getClientOriginalName();
            $foto->move(public_path('img/fasilitas'), $fotoPath);
            $fasilitas->foto = $fotoPath;
        }

        $fasilitas->save();
        return redirect()->back()->with('success', 'Foto fasilitas berhasil ditambahkan!');
    }

    function destroy($id)
    {
        $fasilitas = Fasilitas::findOrFail($id);

        if ($fasilitas->foto) {
            $fotoPath = public_path('img/fasilitas/' . $fasilitas->foto);
            if (File::exists($fotoPath)) {
                File::delete($fotoPath);
            }
        }

        $fasilitas->delete();
        return redirect()->back()->with('success', 'Foto berhasil dihapus!');
    }
}
