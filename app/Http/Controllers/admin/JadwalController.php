<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Peminjaman;
use Illuminate\Http\Request;

class JadwalController extends Controller
{
    function index()
    {
        $peminjaman = Peminjaman::where('disetujui', true)->get();

        $events = [];
        foreach ($peminjaman as $item) {
            $events[] = [
                'title' => $item->acara,
                'start' => $item->dari_tanggal,
                'end' => $item->sampai_tanggal,
                'instansi' => $item->instansi,
            ];
        }

        return view('admin.jadwal', compact('events'));
    }
}
