@extends('layouts.admin')
@section('title', 'Jadwal')
@section('content')

    <h1 class="text-3xl text-slate-600 font-semibold">Pelayanan dan Peraturan</h1>
    <section class="mb-10 bg-slate-200 p-8 rounded-lg overflow-x-auto mt-10">
        {{-- Modal  Create --}}
        <div class="flex justify-between items-center">
            {{-- Open Modal --}}
            <button id="openCreateModal" class="bg-ungu hover:bg-opacity-90 text-white font-bold py-2 px-4 rounded-full">
                <i class="fa-solid fa-circle-plus mx-1"></i>
                <span>Tambah File</span>
            </button>
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
                        <form action="{{ route('peraturan.store') }}" method="POST" class="p-6"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="mb-4">
                                <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Nama :</label>
                                <input type="text"
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    id="name" name="name" placeholder="Masukkan nama file yang diunggah" required>
                            </div>
                            <div class="mb-4">
                                <label for="kategori" class="block text-gray-700 text-sm font-bold mb-2">Kategori:</label>
                                <select id="kategori" name="kategori" required>
                                    <option disabled selected>Pilih kategori</option>
                                    <option value="pelayanan">Pelayanan</option>
                                    <option value="peraturan">Peraturan</option>
                                </select>
                            </div>
                            <div class="mb-4">
                                <label for="file" class="block text-gray-700 text-sm font-bold mb-2">File:</label>
                                <input type="file"
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    id="file" name="file" required>
                            </div>
                            <div class="flex justify-end">
                                <button type="button" id="closeModal"
                                    class="bg-slate-500 hover:bg-slate-700 text-white font-bold py-2 px-4 rounded-full mr-2">
                                    Batal
                                </button>
                                <button type="submit"
                                    onclick="return  confirm('Apakah data yang Anda masukkan sudah benar?')"
                                    class="bg-biru hover:bg-opacity-90 text-white font-bold py-2 px-4 rounded-full">
                                    Simpan
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        {{-- Table --}}
        <div class="mx-auto mt-10">
            <div class="flex justify-center items-center flex-wrap xl:max-w-sm mb-10">
                @if ($peraturan->where('kategori', 'pelayanan')->isNotEmpty())
                    <div class="w-full bg-white rounded-lg shadow-md p-4">
                        <h1 class="text-lg font-semibold mb-4">Pelayanan</h1>
                        <div class="grid grid-cols-1 gap-4">
                            @foreach ($peraturan->where('kategori', 'pelayanan') as $item)
                                <div class="flex items-center justify-between border-b py-3">
                                    <div class="flex-grow">
                                        <h2 class="text-base font-semibold">{{ $item->name }}</h2>
                                        <a href="{{ asset('storage/img/aturan&pelayanan/' . $item->file) }}"
                                            download="{{ $item->file }}"
                                            class="block mt-1 text-blue-500 hover:underline text-sm" target="_blank">
                                            Download File
                                        </a>
                                    </div>
                                    <form action="{{ route('peraturan.destroy', $item->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            onclick="return confirm('Apakah yakin untuk menghapus file ini?')"
                                            class="text-red-500 hover:text-red-700">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @else
                    <div class="w-full bg-gray-200 rounded-lg shadow-md p-4">
                        <p class="text-lg font-semibold mb-4">File Pelayanan belum diisi</p>
                        <p class="text-sm">Silakan tambahkan file untuk layanan ini.</p>
                    </div>
                @endif
            </div>
            <div class="flex justify-center items-center flex-wrap xl:max-w-sm">
                @if ($peraturan->where('kategori', 'peraturan')->isNotEmpty())
                    <div class="w-full bg-white rounded-lg shadow-md p-4">
                        <h1 class="text-lg font-semibold mb-4">Peraturan</h1>
                        <div class="grid grid-cols-1 gap-4">
                            @foreach ($peraturan->where('kategori', 'peraturan') as $item)
                                <div class="flex items-center justify-between border-b py-3">
                                    <div class="flex-grow">
                                        <h2 class="text-base font-semibold">{{ $item->name }}</h2>
                                        <a href="{{ asset('storage/img/peraturan&pelayanan/' . $item->file) }}"
                                            download="{{ $item->file }}"
                                            class="block mt-1 text-blue-500 hover:underline text-sm" target="_blank">
                                            Download File
                                        </a>
                                    </div>
                                    <form action="{{ route('peraturan.destroy', $item->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            onclick="return confirm('Apakah yakin untuk menghapus file ini?')"
                                            class="text-red-500 hover:text-red-700">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @else
                    <div class="w-full bg-gray-200 rounded-lg shadow-md p-4">
                        <p class="text-lg font-semibold mb-4">File Peraturan belum diisi</p>
                        <p class="text-sm">Silakan tambahkan file untuk peraturan ini.</p>
                    </div>
                @endif
            </div>

        </div>
    </section>

    <script>
        document.getElementById('openCreateModal').addEventListener('click', function() {
            document.getElementById('createModal').classList.remove('hidden');
        });

        document.getElementById('closeModal').addEventListener('click', function() {
            document.getElementById('createModal').classList.add('hidden');
        });
    </script>
@endsection
