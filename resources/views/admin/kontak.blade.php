@extends('layouts.admin')
@section('title', 'Jadwal')
@section('content')

    <h1 class="text-3xl text-slate-600 font-semibold">Kontak</h1>
    <section class="mb-10 bg-slate-200 p-8 rounded-lg overflow-x-auto mt-10">
        {{-- Modal  Create --}}
        <div class="flex justify-between items-center">
            {{-- Open Modal --}}
            <button id="openCreateModal" class="bg-ungu hover:bg-opacity-90 text-white font-bold py-2 px-4 rounded-full">
                <i class="fa-solid fa-circle-plus mx-1"></i>
                <span>Tambah Kontak</span>
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
                        <form action="{{ route('kontak.store') }}" method="POST" class="p-6">
                            @csrf
                            <div class="mb-4">
                                <label for="title" class="block text-gray-700 text-sm font-bold mb-2">Title:</label>
                                <input type="text"
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    id="title" name="title" placeholder="Masukan nama kontak" required>
                            </div>
                            <div class="mb-4">
                                <label for="kategori" class="block text-gray-700 text-sm font-bold mb-2">Kategori:</label>
                                <select id="kategori" name="kategori" required>
                                    <option disabled selected>Pilih Kontak</option>
                                    <option value="wa_1">WhatsApp Admin 1</option>
                                    <option value="wa_2">WhatsApp Admin 2</option>
                                    <option value="ig">Instagram</option>
                                    <option value="twitter">Twitter</option>
                                    <option value="youtube">YouTube</option>
                                    <option value="facebook">Facebook</option>
                                </select>
                            </div>
                            <div class="mb-4">
                                <label for="link" class="block text-gray-700 text-sm font-bold mb-2">Link: </label>
                                <input type="text"
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    id="link" name="link" placeholder="Masukan Link Kontak" required>
                            </div>
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

        {{-- Table --}}
        <div class="mx-auto mt-10">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ([
            'wa_1' => 'Wa 1',
            'wa_2' => 'Wa 2',
            'ig' => 'Instagram',
            'twitter' => 'Twitter',
            'youtube' => 'Youtube',
            'facebook' => 'Facebook',
        ] as $kategori => $nama)
                    <div class="bg-white rounded-lg shadow-md p-4">
                        @if ($kontak->where('kategori', $kategori)->isNotEmpty())
                            <h1 class="text-lg font-semibold">
                                @switch($kategori)
                                    @case('wa_1')
                                        <i class="fa-brands fa-whatsapp text-green-600"></i>
                                    @break

                                    @case('wa_2')
                                        <i class="fa-brands fa-whatsapp text-green-600"></i>
                                    @break

                                    @case('ig')
                                        <i class="fa-brands fa-instagram text-red-400"></i>
                                    @break

                                    @case('twitter')
                                        <i class="fa-solid fa-hashtag text-biru"></i>
                                    @break

                                    @case('youtube')
                                        <i class="fa-brands fa-youtube text-red-900"></i>
                                    @break

                                    @case('facebook')
                                        <i class="fa-brands fa-facebook text-blue-500"></i>
                                    @break
                                @endswitch
                                <span>{{ $nama }}</span>
                            </h1>
                            @foreach ($kontak->where('kategori', $kategori) as $item)
                                <h1 class="text-sm">{{ $item->title }}</h1>
                                <form
                                    action="{{ route('kontak.destroy', $kontak->where('kategori', $kategori)->first()->id) }}"
                                    method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        onclick="return confirm('Apakah yakin untuk menghapus kontak ini?')"
                                        class="text-red-500 hover:text-red-700">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </form>
                            @endforeach
                        @else
                            <p>Link {{ $nama }} belum diisi</p>
                        @endif
                    </div>
                @endforeach
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
