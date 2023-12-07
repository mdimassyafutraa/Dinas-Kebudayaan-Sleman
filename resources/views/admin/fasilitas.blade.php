@extends('layouts.admin')
@section('title', 'Jadwal')
@section('content')

    <h1 class="text-3xl text-slate-600 font-semibold">Fasilitas</h1>
    <section class="mb-10 bg-slate-200 p-8 rounded-lg overflow-x-auto mt-10">
        {{-- Modal  Create --}}
        <div class="flex justify-between items-center">
            {{-- Open Modal --}}
            <button id="openCreateModal" class="bg-ungu hover:bg-opacity-90 text-white font-bold py-2 px-4 rounded-full">
                <i class="fa-solid fa-circle-plus mx-1"></i>
                <span>Tambah Foto</span>
            </button>
            <form action="{{ route('fasilitas') }}" method="GET">
                <input type="text" name="q" placeholder="Cari judul foto / kategori"
                    class=" p-2 border-2 rounded-md text-xs">
                <button type="submit" class="bg-secondary text-white px-4 py-2 rounded-md hidden">Cari</button>
            </form>
            <!-- Modal -->
            <div id="createModal" class="fixed z-10 inset-0 overflow-y-auto hidden">
                <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                    <!-- Background overlay -->
                    <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                        <div class="absolute inset-0 bg-black opacity-80"></div>
                    </div>

                    <!-- Modal content -->
                    <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
                    <div
                        class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                        <!-- Form -->
                        <form action="{{ route('fasilitas.store') }}" method="POST" class="p-6"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="judul">
                                    Judul
                                </label>
                                <input
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    id="judul" type="text" placeholder="Tambahkan judul foto" name="judul"
                                    required>
                            </div>
                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="judul">
                                    Foto
                                </label>
                                <input
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    id="foto" type="file" name="foto" required>
                            </div>
                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="kategori">
                                    Kategori
                                </label>
                                <input
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    id="kategori" type="text" placeholder="Parkiran, Gedung, Toilet...." name="kategori"
                                    required>
                            </div>
                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="keterangan">
                                    Keterangan
                                </label>
                                <textarea
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    name="keterangan" id="keterangan" cols="30" rows="10" required></textarea>
                            </div>
                            <!-- Buttons -->
                            <div class="flex justify-end">
                                <button type="button" id="closeModal"
                                    class="bg-slate-500 hover:bg-slate-700 text-white font-bold py-2 px-4 rounded-full mr-2">
                                    Batal
                                </button>
                                <button type="submit"
                                    onclick="return confirm('Apakah data yang Anda masukkan sudah benar?')"
                                    class="bg-biru hover:bg-opacity-90 text-white font-bold py-2 px-4 rounded-full">
                                    Simpan
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        {{-- Tabel --}}
        <div class="mx-auto">
            @if ($fasilitas->count() > 0)
                <table class="min-w-full bg-white rounded-lg overflow-hidden shadow-lg mt-4">
                    <thead class="bg-slate-500 text-white">
                        <tr>
                            <th class="text-center py-3 px-4 uppercase font-medium text-sm">No.</th>
                            <th class="text-center py-3 px-4 uppercase font-medium text-sm">Judul</th>
                            <th class="text-center py-3 px-4 uppercase font-medium text-sm">Foto</th>
                            <th class="text-center py-3 px-4 uppercase font-medium text-sm">Kategori</th>
                            <th class="text-center py-3 px-4 uppercase font-medium text-sm">Keterangan</th>
                            <th class="text-center py-3 px-4 uppercase font-medium text-sm">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-700">
                        @foreach ($fasilitas as $fasilitasItem)
                            <tr class="text-center text-sm">
                                <td class="py-3 px-4 ">{{ $itemNumber++ }}</td>
                                <td class="py-3 px-4 ">{{ $fasilitasItem->judul }}</td>
                                <td class="text-center py-3 px-4">
                                    <a href="{{ asset('img/fasilitas/' . $fasilitasItem->foto) }}">
                                        <img src="{{ asset('img/fasilitas/' . $fasilitasItem->foto) }}" width="200"
                                            class="rounded-lg overflow-hidden">
                                    </a>

                                </td>
                                <td class="py-3 px-4 ">{{ $fasilitasItem->kategori }}</td>
                                <td class="py-3 px-4 text-left">{{ $fasilitasItem->keterangan }}</td>
                                <td class="py-3 px-4 ">
                                    <form action="{{ route('fasilitas.destroy', ['id' => $fasilitasItem->id]) }}"
                                        method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500 hover:scale-125"
                                            onclick="return confirm('Apakah anda ingin mengahpus foto ini?')"> <i
                                                class="fa-regular fa-trash-can"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="flex justify-between items-center mt-2 flex-wrap">
                    <div>
                        <p class="text-sm text-gray-600">
                            Showing {{ $fasilitas->firstItem() }} to {{ $fasilitas->lastItem() }}
                            of
                            {{ $fasilitas->total() }} entries
                        </p>
                    </div>
                    <div>
                        {{ $fasilitas->links() }}
                    </div>
                </div>
            @else
                <p>Tidak ada foto.</p>
            @endif
        </div>

    </section>

    {{-- Modal --}}
    <script>
        document.getElementById('openCreateModal').addEventListener('click', function() {
            document.getElementById('createModal').classList.remove('hidden');
        });

        document.getElementById('closeModal').addEventListener('click', function() {
            document.getElementById('createModal').classList.add('hidden');
        });
    </script>
@endsection
