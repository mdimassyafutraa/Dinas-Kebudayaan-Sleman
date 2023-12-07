<?php

namespace App\Http\Controllers;

use App\Models\Fasilitas;
use App\Models\Kontak;
use App\Models\Pelayanan;
use App\Models\Peminjaman;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $peminjaman = Peminjaman::where('disetujui', true)->get();
        $fasilitas = Fasilitas::all();
        $peraturan = Pelayanan::all();

        $events = [];
        foreach ($peminjaman as $item) {
            $events[] = [
                'title' => $item->acara,
                'start' => $item->dari_tanggal,
                'end' => $item->sampai_tanggal,
                'instansi' => $item->instansi,
            ];
        }

        $kontakWa1 = Kontak::where('kategori', 'wa_1')->get();
        $kontakWa2 = Kontak::where('kategori', 'wa_2')->get();
        $ig = Kontak::where('kategori', 'ig')->get();
        $twitter = Kontak::where('kategori', 'twitter')->get();
        $youtube = Kontak::where('kategori', 'youtube')->get();
        $facebook = Kontak::where('kategori', 'facebook')->get();

        return view('home', compact('events', 'peraturan', 'fasilitas', 'kontakWa1', 'kontakWa2', 'ig', 'twitter', 'youtube', 'facebook'));
    }


    // Jadwal

    // Form Peminjaman
    public function storePeminjaman(Request $request)
    {
        $peminjam = new Peminjaman();
        $peminjam->nama = $request->nama;
        $peminjam->instansi = $request->instansi;
        $peminjam->no_telp = $request->no_telp;
        $peminjam->acara = $request->acara;
        $peminjam->dari_tanggal = $request->dari_tanggal;
        $peminjam->sampai_tanggal = $request->sampai_tanggal;
        $peminjam->waktu = $request->waktu;

        if ($request->hasFile('surat_permohonan')) {
            $surat_permohonan = $request->file('surat_permohonan');
            $surat_permohonan_nama = time() . rand(100, 999) . "." . $surat_permohonan->getClientOriginalName();
            $surat_permohonan->move(public_path() . '/img/surat_permohonan', $surat_permohonan_nama);
            $peminjam->surat_permohonan = $surat_permohonan_nama;
        }

        if ($request->hasFile('ktp')) {
            $ktp = $request->file('ktp');
            $ktp_nama = $ktp->getClientOriginalName();
            $ktp->move(public_path() . '/img/ktp', $ktp_nama);
            $peminjam->ktp = $ktp_nama;
        }

        $peminjam->save();

        return redirect()->route('home')->with('success', 'Data peminjaman berhasil disimpan, silahkan tunggu konfirmasi dari kami melalui nomor telepon / WA. Terima kasih 😇🙏');
    }
}
