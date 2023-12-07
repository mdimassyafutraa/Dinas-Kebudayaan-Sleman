@extends('layouts.admin')
@section('title', 'Dashboard')
@section('content')

    <h1 class="text-3xl text-slate-600 font-semibold">Dashboard</h1>

    {{-- Jumlah Data Tamu --}}
    <section>
        <div class="w-full flex justify-center">
            <h1 class="font-semibold text-sm uppercase py-4 px-4 text-center text-slate-600">Jumlah Pengajuan Peminjaman</h1>
        </div>
        <div class="flex flex-wrap justify-center items-center">
            {{-- Hari Ini --}}
            <div class="w-full px-4  md:w-1/4 mb-10">
                <div class="border-l-4 border-ungu lg:border-none shadow-lg p-10 rounded-lg h-full">
                    <div class="flex w-full justify-center items-center text-2xl p-4">
                        <i class="fa-solid fa-users text-ungu"></i>
                    </div>
                    <div class="flex flex-row justify-center items-center space-x-4">
                        <h2 class="font-semibold text-base">Hari ini:</h2>
                        <span class="text-2xl font-bold text-biru">{{ $jumlahHariIni }}</span>
                    </div>
                </div>
            </div>
            {{-- Kemarin --}}
            <div class="w-full px-4  md:w-1/4 mb-10">
                <div class="border-l-4 border-ungu lg:border-none shadow-lg p-10 rounded-lg h-full">
                    <div class="flex w-full justify-center items-center text-xl p-4">
                        <i class="fa-solid fa-calendar-day text-ungu"></i>
                    </div>
                    <div class="flex flex-row justify-center space-x-4 items-center">
                        <h2 class="font-semibold text-base">Kemarin :</h2>
                        <span class="text-xl font-bold text-biru">{{ $jumlahKemarin }}</span>
                    </div>
                </div>
            </div>
            {{-- Minggu ini --}}
            <div class="w-full px-4  md:w-1/4 mb-10">
                <div class="border-l-4 border-ungu lg:border-none shadow-lg p-10 rounded-lg h-full">
                    <div class="flex w-full justify-center items-center text-xl p-4">
                        <i class="fa-solid fa-calendar-week text-ungu"></i>
                    </div>
                    <div class="flex flex-row justify-center space-x-4 items-center">
                        <h2 class="font-semibold text-base">Minggu ini:</h2>
                        <span class="text-xl font-bold text-biru">{{ $jumlahMingguIni }} </span>
                    </div>
                </div>
            </div>
            <div class="w-full px-4 md:w-1/4  mb-10">
                <div class="border-l-4 border-ungu lg:border-none shadow-lg p-10 rounded-lg h-full">
                    <div class="flex w-full justify-center items-center text-xl p-4">
                        <i class="fa-solid fa-calendar-check"></i>
                    </div>
                    <div class="flex flex-row justify-center items-center space-x-4">
                        <h2 class="font-semibold text-base">Total Bulan ini</h2>
                        <span class="text-xl font-bold text-biru">{{ $jumlahBulanIni }}</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Data Tamu yang belum di verifikasi hari ini --}}
    <section class="mb-10 bg-slate-200 p-8 rounded-lg overflow-x-auto">
        <div class="mx-auto">
            <div class="flex justify-between items-center">
                <h2 class="text-sm font-medium  text-red-600">
                    <i class="fa-solid fa-circle-xmark"></i>
                    <span>Belum Verifikasi</span>
                </h2>
                @php \Carbon\Carbon::setLocale('id'); @endphp
                <h2><span class="font-semibold">Data pengajuan hari ini:</span>
                    {{ \Carbon\Carbon::now()->translatedFormat('l, j F Y') }}</h2>
            </div>
            <table class="min-w-full bg-white rounded-lg overflow-hidden shadow-lg mt-4">
                <thead class="bg-slate-500 text-white">
                    <tr>
                        {{-- <th class="text-center py-3 px-4 uppercase font-medium text-sm">Id.</th> --}}
                        <th class="text-center py-3 px-4 uppercase font-medium text-sm">Nama</th>
                        <th class="text-center py-3 px-4 uppercase font-medium text-sm">Instansi</th>
                        <th class="text-center py-3 px-4 uppercase font-medium text-sm">No Telp</th>
                        <th class="text-center py-3 px-4 uppercase font-medium text-sm">Acara</th>
                        <th class="text-center py-3 px-4 uppercase font-medium text-sm">Dari Tanggal</th>
                        <th class="text-center py-3 px-4 uppercase font-medium text-sm">Sampai Tanggal</th>
                        <th class="text-center py-3 px-4 uppercase font-medium text-sm">Waktu</th>
                        <th class="text-center py-3 px-4 uppercase font-medium text-sm">Surat Permohonan</th>
                        <th class="text-center py-3 px-4 uppercase font-medium text-sm">KTP</th>
                        <th class="text-center py-3 px-4 uppercase font-medium text-sm">Verifikasi</th>
                        <th class="text-center py-3 px-4 uppercase font-medium text-sm">Tanggal Pengajuan</th>
                        <th class="text-center py-3 px-4 uppercase font-medium text-sm">Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-gray-700">
                    @foreach ($peminjamanBelumDisetujuiDanHariIni as $peminjamss)
                        <tr class="text-center text-sm">
                            {{-- <td class="text-center py-3 px-4">{{ $itemNumber++ }}</td> --}}
                            <td class="text-center py-3 px-4">{{ $peminjamss->nama }}</td>
                            <td class="text-center py-3 px-4">{{ $peminjamss->instansi }}</td>
                            <td class="text-center py-3 px-4">{{ $peminjamss->no_telp }}</td>
                            <td class="text-center py-3 px-4">{{ $peminjamss->acara }}</td>
                            <td class="text-center py-3 px-4">{{ $peminjamss->dari_tanggal }}</td>
                            <td class="text-center py-3 px-4">{{ $peminjamss->sampai_tanggal }}</td>
                            <td class="text-center py-3 px-4">{{ $peminjamss->waktu }}</td>
                            <td class="text-center py-3 px-4">
                                <a href="{{ asset('img/surat_permohonan/' . $peminjamss->surat_permohonan) }}"
                                    class="block text-biru text-sm p-4 hover:underline" target="_blank" download>
                                    Download Surat
                                </a>
                            </td>
                            <td class="text-center py-3 px-4">
                                <img src="{{ asset('img/ktp/' . $peminjamss->ktp) }}" alt="" width="200"
                                    class="rounded-lg overflow-hidden">
                                <a href="{{ asset('img/ktp/' . $peminjamss->ktp) }}" download="{{ $peminjamss->ktp }}"
                                    class="mt-2 text-biru hover:underline text-xs" target="_blank">
                                    Download KTP
                                </a>
                            </td>
                            <td class="text-center py-3 px-4 text-sm">
                                @if ($peminjamss->disetujui)
                                    <form action="{{ route('batalkan.verifikasi.peminjaman', $peminjamss->id) }}"
                                        method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-md">Batalkan
                                        </button>
                                    </form>
                                @else
                                    <span class="text-red-500">Belum diverifikasi</span>
                                @endif
                                @if (!$peminjamss->disetujui)
                                    <form action="{{ route('verifikasi', $peminjamss->id) }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit"
                                            class="bg-green-500 text-white px-4 py-2 rounded-md">Verifikasi</button>
                                    </form>
                                @else
                                    <span class="text-green-500">Sudah diverifikasi</span>
                                @endif
                            </td>
                            <td class="text-center py-3 px-4">{{ $peminjamss->created_at }}</td>
                            <td class="text-center py-3 px-4">
                                <form action="{{ route('hapus.peminjaman', $peminjamss->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"
                                        class="text-red-500 hover:scale-125">
                                        <i class="fa-regular fa-trash-can"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="flex justify-between items-center mt-2 flex-wrap">
                @if ($peminjamanBelumDisetujuiDanHariIni->count() > 0)
                    <div>
                        <p class="text-sm text-gray-600">
                            Showing {{ $peminjamanBelumDisetujuiDanHariIni->firstItem() }} to
                            {{ $peminjamanBelumDisetujuiDanHariIni->lastItem() }} of
                            {{ $peminjamanBelumDisetujuiDanHariIni->total() }}
                            entries
                        </p>
                    </div>
                    <div>
                        {{ $peminjamanBelumDisetujuiDanHariIni->links() }}
                    </div>
                @else
                    <div>
                        <p>Tidak ada data.</p>
                    </div>
                @endif
            </div>
        </div>
    </section>

@endsection
