<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Peminjaman;

class DashboardController extends Controller
{
    function index(Request $request)
    {
        $jumlahHariIni = Peminjaman::whereDate('created_at', today())->count();
        $jumlahKemarin = Peminjaman::whereDate('created_at', today()->subDays(1))->count();
        $jumlahMingguIni = Peminjaman::whereBetween('created_at', [now()->startOfWeek(), now()->endOfWeek()])->count();
        $jumlahBulanIni = Peminjaman::whereMonth('created_at', now()->month)->count();

        $perPage = 10;

        $query = Peminjaman::query();

        $peminjamanBelumDisetujuiDanHariIni = $query
            ->where(function ($query) {
                $query->where('disetujui', false)
                    ->orWhereDate('created_at', today());
            })
            ->where('disetujui', false)
            ->orderBy('created_at', 'desc')
            ->paginate($perPage);

        $itemNumber = ($request->input('page', 1) - 1) * $perPage;

        return view('admin.dashboard', [
            'jumlahHariIni' => $jumlahHariIni,
            'jumlahKemarin' => $jumlahKemarin,
            'jumlahMingguIni' => $jumlahMingguIni,
            'jumlahBulanIni' => $jumlahBulanIni,
            'peminjamanBelumDisetujuiDanHariIni' => $peminjamanBelumDisetujuiDanHariIni,
            'itemNumber' => $itemNumber,
        ]);
    }
}
