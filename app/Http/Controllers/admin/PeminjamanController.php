<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Peminjaman;
use Illuminate\Http\Request;

class PeminjamanController extends Controller
{
    function index(Request $request)
    {
        $peminjamQuery = Peminjaman::query();
        $perPage = 10;

        if ($request->has('q')) {
            $searchQuery = $request->input('q');
            $peminjamQuery->where(function ($query) use ($searchQuery) {
                $query->where('nama', 'like', '%' . $searchQuery . '%')
                    ->orWhere('instansi', 'like', '%' . $searchQuery . '%')
                    ->orWhere('no_telp', 'like', '%' . $searchQuery . '%')
                    ->orWhere('dari_tanggal', 'like', '%' . $searchQuery . '%')
                    ->orWhere('sampai_tanggal', 'like', '%' . $searchQuery . '%')
                    ->orWhere('acara', 'like', '%' . $searchQuery . '%')
                    ->orWhere('waktu', 'like', '%' . $searchQuery . '%')
                    ->orWhere('disetujui', $searchQuery);
            });
        }

        $peminjamsVerified = Peminjaman::where('disetujui', true)
            ->orderBy('created_at', 'desc')
            ->paginate($perPage);

        $peminjamsNotVerified = Peminjaman::where('disetujui', false)
            ->orderBy('created_at', 'desc')
            ->paginate($perPage);


        $currentPage = $request->input('page', 1);
        $itemNumber = ($currentPage - 1) * $perPage + 1;
        $itemNumbers = ($currentPage - 1) * $perPage + 1;

        return view('admin.peminjaman', compact('peminjamsVerified', 'peminjamsNotVerified', 'itemNumber', 'itemNumbers'));
    }


    function verifikasi($id)
    {
        $peminjaman = Peminjaman::findOrFail($id);
        $peminjaman->update([
            'disetujui' => true,
        ]);

        return redirect()->back()->with('success', 'Peminjaman telah diverifikasi.');
    }

    function batalkanVerifikasi($id)
    {
        $peminjaman = Peminjaman::findOrFail($id);
        $peminjaman->update([
            'disetujui' => false,
        ]);

        return redirect()->back()->with('success', 'Verifikasi peminjaman berhasil dibatalkan.');
    }

    function destroy($id)
    {
        $peminjaman = Peminjaman::findOrFail($id);
        $peminjaman->delete();

        return redirect()->back()->with('success', 'Data peminjaman berhasil dihapus.');
    }
}
