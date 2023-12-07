@extends('layouts.admin')
@section('title', 'Jadwal')
@section('content')

    <h1 class="text-3xl text-slate-600 font-semibold mb-10">Peminjaman</h1>

    {{-- Yang belum di verifikasi --}}
    <section class="mb-10 bg-slate-200 p-8 rounded-lg overflow-x-auto">
        <div class="mx-auto">
            <div class="flex justify-between items-center">
                <h2 class="text-sm font-medium  text-red-600">
                    <i class="fa-solid fa-circle-xmark"></i>
                    <span>Belum Verifikasi</span>
                </h2>
                <form action="{{ route('peminjaman') }}" method="GET">
                    <input type="text" name="q" placeholder="Cari nama peminjam"
                        class="w-full p-2 border-2 rounded-md text-xs">
                    <button type="submit" class="bg-secondary text-white px-4 py-2 rounded-md hidden">Cari</button>
                </form>
            </div>
            <table class="min-w-full bg-white rounded-lg overflow-hidden shadow-lg mt-4">
                <thead class="bg-slate-500 text-white">
                    <tr>
                        <th class="text-center py-3 px-4 uppercase font-medium text-sm">Id.</th>
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
                    @foreach ($peminjamsNotVerified as $peminjamss)
                        <tr class="text-center text-sm">
                            <td class="text-center py-3 px-4">{{ $itemNumber++ }}</td>
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
                @if ($peminjamsNotVerified->count() > 0)
                    <div>
                        <p class="text-sm text-gray-600">
                            Showing {{ $peminjamsNotVerified->firstItem() }} to {{ $peminjamsNotVerified->lastItem() }} of
                            {{ $peminjamsNotVerified->total() }}
                            entries
                        </p>
                    </div>
                    <div>
                        {{ $peminjamsNotVerified->links() }}
                    </div>
                @else
                    <div>
                        <p>Tidak ada data.</p>
                    </div>
                @endif
            </div>
        </div>
    </section>

    {{-- yang sudah di verifikasi --}}
    <section class="bg-slate-200 p-8 rounded-lg overflow-x-auto ">
        <div class="mx-auto">
            <div class="flex justify-between items-center">
                <h2 class="text-sm font-medium  text-green-600">
                    <i class="fa-solid fa-circle-check"></i>
                    <span>Terverifikasi</span>
                </h2>
                <form action="{{ route('peminjaman') }}" method="GET">
                    <input type="text" name="q" placeholder="Cari nama peminjam"
                        class="w-full p-2 border-2 rounded-md text-xs">
                    <button type="submit" class="bg-secondary text-white px-4 py-2 rounded-md hidden">Cari</button>
                </form>
            </div>
            <table class="min-w-full bg-white rounded-lg overflow-hidden shadow-lg mt-4">
                <thead class="bg-slate-500 text-slate-200">
                    <tr>
                        <th class="text-center py-3 px-4 uppercase font-medium text-sm">Id.</th>
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
                    @foreach ($peminjamsVerified as $peminjams)
                        <tr class="text-center text-sm">
                            <td class="text-center py-3 px-4">{{ $itemNumbers++ }}</td>
                            <td class="text-center py-3 px-4">{{ $peminjams->nama }}</td>
                            <td class="text-center py-3 px-4">{{ $peminjams->instansi }}</td>
                            <td class="text-center py-3 px-4">{{ $peminjams->no_telp }}</td>
                            <td class="text-center py-3 px-4">{{ $peminjams->acara }}</td>
                            <td class="text-center py-3 px-4">{{ $peminjams->dari_tanggal }}</td>
                            <td class="text-center py-3 px-4">{{ $peminjams->sampai_tanggal }}</td>
                            <td class="text-center py-3 px-4">{{ $peminjams->waktu }}</td>
                            <td class="text-center py-3 px-4">
                                <a href="{{ asset('img/surat_permohonan/' . $peminjams->surat_permohonan) }}"
                                    class="block text-biru text-sm p-4 hover:underline" target="_blank" download>
                                    Download Surat
                                </a>
                            </td>
                            <td class="text-center py-3 px-4">
                                <img src="{{ asset('img/ktp/' . $peminjams->ktp) }}" alt="" width="200"
                                    class="rounded-lg overflow-hidden">
                                <a href="{{ asset('img/ktp/' . $peminjams->ktp) }}" download="{{ $peminjams->ktp }}"
                                    class="mt-2 text-biru hover:underline text-xs" target="_blank">
                                    Download KTP
                                </a>
                            </td>
                            <td class="text-center py-3 px-4 text-sm">
                                @if ($peminjams->disetujui)
                                    <form action="{{ route('batalkan.verifikasi.peminjaman', $peminjams->id) }}"
                                        method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-md">Batalkan
                                        </button>
                                    </form>
                                @else
                                    <span class="text-red-500">Belum diverifikasi</span>
                                @endif
                                @if (!$peminjams->disetujui)
                                    <form action="{{ route('verifikasi', $peminjams->id) }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit"
                                            class="bg-green-500 text-white px-4 py-2 rounded-md">Verifikasi</button>
                                    </form>
                                @else
                                    <span class="text-green-500">Sudah diverifikasi</span>
                                @endif
                            </td>
                            <td class="text-center py-3 px-4">{{ $peminjams->created_at }}</td>
                            <td class="text-center py-3 px-4">
                                <form action="{{ route('hapus.peminjaman', $peminjams->id) }}" method="POST">
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
                @if ($peminjamsVerified->count() > 0)
                    <div>
                        <p class="text-sm text-gray-600">
                            Showing {{ $peminjamsVerified->firstItem() }} to {{ $peminjamsVerified->lastItem() }} of
                            {{ $peminjamsVerified->total() }}
                            entries
                        </p>
                    </div>
                    <div>
                        {{ $peminjamsVerified->links() }}
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
