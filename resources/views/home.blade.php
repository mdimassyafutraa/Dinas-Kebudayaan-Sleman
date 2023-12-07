@extends('layouts.app')
@section('title', ' Dinas Kebudayaan (Khunda Kabudayan) Kabupaten Sleman')
@section('content')

    <nav class="absolute top-0 left-0 w-full z-50 bg-ungu ">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4 ">
            {{-- brand --}}
            <a href="" class="flex items-center">
                <img src="img/logo.png" alt="Logo Dinas" width="200">
            </a>
            {{-- humberger --}}
            <div class="flex items-center md:hidden">
                <button id="humberger" name="humberger" type="button" class="block relative z-10  rounded-xl p-2">
                    <span
                        class="humberger-line transition duration-300 ease-in-out origin-top-left block w-6 h-1 mb-1"></span>
                    <span class="humberger-line transition duration-300 ease-in-out block w-6 h-1 mb-1"></span>
                    <span
                        class="humberger-line transition duration-300 ease-in-out origin-bottom-left block w-6 h-1"></span>
                </button>
            </div>
            {{-- link --}}
            <div id="nav-menu"
                class="hidden md:block md:w-auto md:mt-0 md:bg-transparent  w-full bg-secondary  mt-6 rounded-xl overflow-hidden text-white">
                <ul
                    class="text-center font-semibold flex flex-col py-4 rounded-xl md:p-0 md:flex-row md:space-x-4  md:mt-0 uppercase">
                    <li>
                        <a href="#home"
                            class="block p-4  hover:bg-biru md:hover:text-biru  md:hover:bg-transparent md:hover:scale-110 transition duration-300 ease-in-out">Home</a>
                    </li>
                    <li>
                        <a href="#jadwal"
                            class="block p-4  hover:bg-biru md:hover:text-biru   md:hover:bg-transparent md:hover:scale-110 transition duration-300 ease-in-out">jadwal</a>
                    </li>
                    <li>
                        <a href="#peminjaman"
                            class="block p-4  hover:bg-biru md:hover:text-biru   md:hover:bg-transparent md:hover:scale-110 transition duration-300 ease-in-out">Peminjaman</a>
                    </li>
                    <li>
                        <a href="#fasilitas"
                            class="block p-4  hover:bg-biru md:hover:text-biru   md:hover:bg-transparent md:hover:scale-110 transition duration-300 ease-in-out">Fasilitas</a>
                    </li>
                    <li>
                        <a href="#pelayanan"
                            class="block p-4  hover:bg-biru md:hover:text-biru   md:hover:bg-transparent md:hover:scale-110 transition duration-300 ease-in-out">Pelayanan
                            & Peraturan</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <main class="pt-[80px] xl:pt-0">
        {{-- Home --}}
        <section id="home" class="py-24 lg:h-screen relative"
            style="background-image: url('{{ asset('img/gedungseni.jpg') }}'); background-size: cover; background-position: center;">
            <div class="absolute inset-0 flex items-center justify-center">
                <div
                    class="text-white text-center lg:backdrop-blur-md lg:shadow-sm lg:shadow-slate-300 p-10 rounded-xl hover:shadow-slate-500">
                    <h1 class="text-md font-bold mb-2 md:text-lg xl:text-3xl text-center">SELAMAT DATANG di</h1>
                    <h3 class="text-slate-50 tracking-wider">
                        <span class="block text-md font-bold mb-2 md:text-lg xl:text-3xl text-center">
                            SILANDUNG
                        </span>
                        <span class="block text-white text-xs">
                            SISTEM PELAYANAN GEDUNG KESENIAN BERBASIS DIGITAL
                        </span>
                        <span class="block text-white text-xs">
                            DINAS KEBUDAYAAN (KUNDHA KEBUDAYAN) KABUPATEN SLEMAN
                        </span>
                    </h3>
                </div>
            </div>
        </section>

        {{-- jadwal --}}
        <section id="jadwal" class="py-10"
            style="background-image: url('{{ asset('img/bg-white.jpg') }}'); background-size: cover; background-position: center;">
            <div class="w-full flex justify-center lg:py-10 pb-10">
                <h1 class="font-medium md:text-xl lg:text-2xl xl:text-3xl  text-slate-500 uppercase drop-shadow-lg">Jadwal
                </h1>
            </div>
            <div class="px-4 lg:px-0 flex justify-center items-center flex-wrap lg:flex-nowrap lg:items-start">
                <div id="calendar" class="w-full xl:w-1/2 shadow-lg shadow-slate-400 mb-4 mx-4 bg-white"></div>
                <div class="w-full xl:w-1/2  shadow-lg shadow-slate-400 p-4 mx-4 bg-white">
                    <h1 class="font-medium mb-2 text-center text-slate-600">Jadwal Peminjaman Gedung</h1>
                    {{-- Tampilan data --}}
                    <div class="detail-acara text-slate-500 text-sm mb-4">
                        <p class="acara-title "></p>
                        <p class="acara-instansi "></p>
                        <p class="acara-start "></p>
                        <p class="acara-end "></p>
                    </div>
                </div>
            </div>
        </section>

        {{-- Peminjaman --}}
        <section id="peminjaman" class="py-10"
            style="background-image: url('{{ asset('img/bg-white.jpg') }}'); background-size: cover; background-position: center;">
            <div class="w-full flex justify-center lg:py-10 pb-10" data-aos="zoom-in-up" data-aos-duration="1000">

                <h1 class="font-medium md:text-xl lg:text-2xl xl:text-3xl  text-slate-500 uppercase">Peminjaman</h1>
            </div>
            <form action="{{ route('storePeminjaman') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="grid gap-4 sm:grid-cols-2 sm:gap-6 p-4 xl:p-10 shadow-md shadow-slate-400 xl:w-1/2 xl:mx-auto bg-slate-50 rounded-xl mx-4"
                    data-aos="zoom-in-up" data-aos-duration="2000">
                    <div class="sm:col-span-2">
                        @if (session('success'))
                            <div id="alert-border-3"
                                class="flex items-center p-4 mb-4 text-green-800 border-t-4 border-green-300 bg-green-50"
                                role="alert">
                                <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                                </svg>
                                <div class="ml-3 text-sm font-medium">
                                    {{ session('success') }}
                                </div>
                                <button type="button"
                                    class="ml-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8"
                                    data-dismiss-target="#alert-border-3" aria-label="Close">
                                    <span class="sr-only">Dismiss</span>
                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="none" viewBox="0 0 14 14">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                    </svg>
                                </button>
                            </div>
                        @endif
                        @if (session('error'))
                            <div id="alert-border-3"
                                class="flex items-center p-4 mb-4 text-red-800 border-t-4 border-red-300 bg-red-50"
                                role="alert">
                                <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                                </svg>
                                <div class="ml-3 text-sm font-medium">
                                    {{ session('error') }}
                                </div>
                                <button type="button"
                                    class="ml-auto -mx-1.5 -my-1.5 bg-red-50 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex items-center justify-center h-8 w-8"
                                    data-dismiss-target="#alert-border-3" aria-label="Close">
                                    <span class="sr-only">Dismiss</span>
                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="none" viewBox="0 0 14 14">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                    </svg>
                                </button>
                            </div>
                        @endif
                    </div>
                    <p class="text-sm text-slate-500">* Silahkan isi form peminjaman di bawah ini</p>
                    <div class="sm:col-span-2">
                        <label for="name" class="block mb-2 text-sm font-medium ">Nama</label>
                        <input type="text" name="nama" id="name"
                            class="bg-gray-50 border border-gray-300  text-sm rounded-lg focus:ring-ungu  focus:border-biru block w-full p-2.5 "
                            placeholder="Nama peminjam" required>
                    </div>
                    <div class="w-full">
                        <label for="instansi" class="block mb-2 text-sm font-medium ">Instansi</label>
                        <input type="text" name="instansi" id="instansi"
                            class="bg-gray-50 border border-gray-300  text-sm rounded-lg focus:ring-ungu  focus:border-biru block w-full p-2.5 "
                            placeholder="Instansi / Asal Peminjam" required>
                    </div>
                    <div class="w-full">
                        <label for="no_telp" class="block mb-2 text-sm font-medium ">No Telp</label>
                        <input type="number" name="no_telp" id="no_telp"
                            class="bg-gray-50 border border-gray-300  text-sm rounded-lg focus:ring-ungu  focus:border-biru block w-full p-2.5 "
                            placeholder="Nomor Telepon / WA" required>
                    </div>
                    <div class="w-full">
                        <label for="acara" class="block mb-2 text-sm font-medium ">Acara</label>
                        <input type="text" name="acara" id="acara"
                            class="bg-gray-50 border border-gray-300  text-sm rounded-lg focus:ring-ungu  focus:border-biru block w-full p-2.5 "
                            placeholder="Nama Acara" required>
                    </div>
                    <div class="w-full">
                        <label for="dari_tanggal" class="block mb-2 text-sm font-medium ">Dari Tanggal
                            Peminjaman</label>
                        <input type="date" name="dari_tanggal" id="dari_tanggal"
                            class="bg-gray-50 border border-gray-300  text-sm rounded-lg focus:ring-ungu  focus:border-biru block w-full p-2.5 "
                            required>
                    </div>
                    <div class="w-full">
                        <label for="sampai_tanggal" class="block mb-2 text-sm font-medium ">Sampai Tanggal
                            Peminjaman</label>
                        <input type="date" name="sampai_tanggal" id="sampai_tanggal"
                            class="bg-gray-50 border border-gray-300  text-sm rounded-lg focus:ring-ungu  focus:border-biru block w-full p-2.5 "
                            required>
                    </div>
                    <div class="w-full">
                        <label for="waktu" class="block mb-2 text-sm font-medium">Jam</label>
                        <select id="waktu" name="waktu"
                            class="block w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:border-blue-500">
                            <option value="" disabled selected>Waktu peminjaman</option>
                            <option value="06.00-18.00">06.00 - 18.00 WIB</option>
                            <option value="18.00-06.00">18.00 - 06.00 WIB</option>
                            <option value="24 Jam">24 Jam</option>
                        </select>
                    </div>
                    <div class="w-full">
                        <label for="surat_permohonan" class="block mb-2 text-sm font-medium ">Uploud Surat
                            Permohonan</label>
                        <input type="file" name="surat_permohonan" id="surat_permohonan"
                            class="bg-gray-50 border border-gray-300  text-sm rounded-lg focus:ring-ungu  focus:border-biru block w-full p-2.5 "
                            required>
                    </div>
                    <div class="w-full">
                        <label for="ktp" class="block mb-2 text-sm font-medium ">Uploud Foto KTP</label>
                        <input type="file" name="ktp" id="ktp"
                            class="bg-gray-50 border border-gray-300  text-sm rounded-lg focus:ring-ungu  focus:border-biru block w-full p-2.5 "
                            required>
                    </div>
                    <button type="submit" id="submit-link"
                        class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-ungu  rounded-lg focus:ring-4 focus:ring-primary-200  hover:bg-opacity-80">
                        Simpan
                    </button>
            </form>
            </div>
        </section>

        {{-- Fasilitas --}}
        <section id="fasilitas" class="py-10 min-h-screen "
            style="background-image: url('{{ asset('img/bg-white.jpg') }}'); background-size: cover; background-position: center;">
            <div class="w-full flex
            justify-center lg:py-10 pb-10" data-aos="zoom-in-up"
                data-aos-duration="1000">
                <h1 class="font-medium md:text-xl lg:text-2xl xl:text-3xl  text-slate-500 uppercase">Fasilitas</h1>
            </div>
            {{-- Galery --}}
            <div class="flex  items-center justify-center">
                <div class="grid grid-cols-1 gap-5 md:grid-cols-2 lg:grid-cols-3">
                    {{-- foto --}}
                    @foreach ($fasilitas as $item)
                        <div class="group relative cursor-pointer items-center justify-center overflow-hidden transition-shadow hover:shadow-xl hover:shadow-black/30 rounded-3xl"
                            data-aos="zoom-in-up" data-aos-duration="1000">
                            <div class="h-96 w-72">
                                <img class="h-full w-full object-cover transition-transform duration-500 group-hover:rotate-3 group-hover:scale-125"
                                    src="{{ asset('img/fasilitas/' . $item->foto) }}" alt="" />
                            </div>
                            <div
                                class="absolute inset-0 bg-gradient-to-b from-transparent via-transparent to-black group-hover:from-black/70 group-hover:via-black/60 group-hover:to-black/70">
                                <h1 class=" text-3xl font-bold text-white text-center mt-4">{{ $item->judul }}</h1>
                            </div>
                            <div
                                class="absolute inset-0 flex translate-y-[60%] flex-col items-center justify-center px-9 text-center transition-all duration-500 group-hover:translate-y-0">
                                <p
                                    class="mb-3 text-lg italic text-white opacity-0 transition-opacity duration-300 group-hover:opacity-100">
                                    {{ $item->keterangan }}
                                </p>
                                <a href="{{ asset('img/fasilitas/' . $item->foto) }}">
                                    <button
                                        class="rounded-full bg-neutral-900 py-2 px-3.5 font-com text-sm capitalize text-white shadow shadow-black/60">Lihat
                                        full</button>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        {{-- Pelayanan & Peraturan --}}
        <section id="pelayanan" class="py-10 min-h-screen"
            style="background-image: url('{{ asset('img/bg-white.jpg') }}'); background-size: cover; background-position: center;">
            <div class="w-full flex justify-center lg:py-10 pb-10" data-aos="zoom-in-up" data-aos-duration="1000">
                <h1 class="font-medium md:text-xl lg:text-2xl xl:text-3xl  text-slate-500 uppercase">Pelayanan & peraturan
                </h1>
            </div>

            <div class="container mx-auto">
                @foreach ($peraturan->where('kategori', 'pelayanan') as $item)
                    <h1
                        class="font-medium md:text-xl lg:text-2xl xl:text-3xl  text-slate-500 uppercase text-center translate-y-10">
                        {{ $item->name }}
                    </h1>
                    <div class="flex justify-center items-center mt-10 px-4 ">
                        <iframe src="{{ asset('img/aturan&pelayanan/' . $item->file) }}"
                            class="w-full h-[600px] xl:w-1/2"></iframe>
                    </div>
                @endforeach
            </div>
            <div class="container mx-auto">
                @foreach ($peraturan->where('kategori', 'peraturan') as $item)
                    <h1
                        class="font-medium md:text-xl lg:text-2xl xl:text-3xl  text-slate-500 uppercase text-center translate-y-10">
                        {{ $item->name }}
                    </h1>
                    <div class="flex justify-center items-center px-4 mt-10 ">
                        <iframe src="{{ asset('img/aturan&pelayanan/' . $item->file) }}"
                            class="w-full h-[600px] xl:w-1/2"></iframe>
                    </div>
                @endforeach
            </div>
        </section>

    </main>

    <footer>
        <div class="flex flex-wrap bg-ungu text-white text-xs">
            <div class="w-full px-4  md:w-1/3 py-10 flex flex-col pt-10 lg:items-center">
                <img src="img/logo.png" alt="logo dinas" width="300" class="-translate-x-9">
                <p class="mt-2 lg:px-10 lg:pl-32 lg:text-base text-sm text-slate-300">Terwujudnya Sleman Sebagai Rumah
                    Bersama yang
                    Cerdas,
                    Sejahtera,
                    Berdaya
                    Saing, Menghargai Perbedaan, dan Memiliki Jiwa Gotong Royong.</p>
            </div>
            <div class="w-full px-4 md:w-1/3 pt-10 flex flex-col">
                <h3 class="text-2xl font-semibold uppercase text-biru">Kontak</h3>
                <ul class="py-4 ">
                    @foreach ($kontakWa1 as $kontak)
                        <li class="py-2 font-semibold">
                            <a href="{{ $kontak->link }}" target="_blank"
                                class="hover:text-biru inline-flex space-x-2 items-center transition duration-300 ease-in-out">
                                <i class="fa-brands fa-whatsapp"></i>
                                <span>{{ $kontak->title }}</span>

                            </a>
                        </li>
                    @endforeach
                    @foreach ($kontakWa2 as $kontak)
                        <li class="py-2 font-semibold">
                            <a href="{{ $kontak->link }}" target="_blank"
                                class="hover:text-biru inline-flex space-x-2 items-center transition duration-300 ease-in-out">
                                <i class="fa-brands fa-whatsapp"></i>
                                <span>{{ $kontak->title }}</span>

                            </a>
                        </li>
                    @endforeach
                    @foreach ($ig as $instagram)
                        <li class="py-2 font-semibold">
                            <a href="{{ $instagram->link }}" target="_blank"
                                class="hover:text-biru inline-flex space-x-2 items-center transition duration-300 ease-in-out">
                                <i class="fa-brands fa-instagram"></i>
                                <span>{{ $instagram->title }}</span>
                            </a>
                        </li>
                    @endforeach
                    @foreach ($twitter as $tw)
                        <li class="py-2 font-semibold">
                            <a href="{{ $tw->link }}" target="_blank"
                                class="hover:text-biru inline-flex space-x-2 items-center transition duration-300 ease-in-out">
                                <i class="fa-solid fa-hashtag"></i>
                                <span>{{ $tw->title }}</span>
                            </a>
                        </li>
                    @endforeach
                    @foreach ($youtube as $yt)
                        <li class="py-2 font-semibold">
                            <a href="{{ $yt->link }}" target="_blank"
                                class="hover:text-biru inline-flex space-x-2 items-center transition duration-300 ease-in-out">
                                <i class="fa-brands fa-youtube"></i>
                                <span>{{ $yt->title }}</span>
                            </a>
                        </li>
                    @endforeach
                    @foreach ($facebook as $fb)
                        <li class="py-2 font-semibold">
                            <a href="{{ $fb->link }}" target="_blank"
                                class="hover:text-biru inline-flex space-x-2 items-center transition duration-300 ease-in-out">
                                <i class="fa-brands fa-facebook"></i>
                                <span>{{ $fb->title }}</span>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="w-full px-4 mb-12 md:w-1/3  pt-10">
                <h3 class="text-2xl font-semibold uppercase text-biru">Menu</h3>
                <ul class="py-4">
                    <li class="py-2">
                        <a href="#home" class="hover:text-biru transition duration-300 ease-in-out"> <span
                                class="text-biru font-bold">></span> Home</a>
                    </li>
                    <li class="py-2">
                        <a href="#jadwal" class="hover:text-biru transition duration-300 ease-in-out"> <span
                                class="text-biru font-bold">></span> Jadwal</a>
                    </li>
                    <li class="py-2">
                        <a href="#peminjaman" class="hover:text-biru transition duration-300 ease-in-out"><span
                                class="text-biru font-bold">></span> Peminjaman
                        </a>
                    </li>
                    <li class="py-2">
                        <a href="#fasilitas" class="hover:text-biru transition duration-300 ease-in-out"><span
                                class="text-biru font-bold">></span> Fasilitas</a>
                    </li>
                    <li class="py-2">
                        <a href="#pelayanan" class="hover:text-biru transition duration-300 ease-in-out"><span
                                class="text-biru font-bold">></span> Pelayanan & Peraturan</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="w-full p-4 bg-secondary">
            <h2 class="text-center text-slate-600 font-semibold text-xs">&copy; <?= date('Y') ?>
                Dinas Kebudayaan "Khunda kabudayaan" Kabupaten Sleman, All Rights Reserved
            </h2>
        </div>
    </footer>

    {{-- Kalender --}}
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.10/index.global.min.js'></script>
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.10/locales/id.js'></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var formatter = new Intl.DateTimeFormat('id-ID', {
                weekday: 'long',
                year: 'numeric',
                month: 'long',
                day: 'numeric'
            });

            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                locale: 'id', // Set bahasa menjadi bahasa Indonesia
                initialView: 'dayGridMonth',
                buttonText: {
                    today: 'Hari Ini'
                },
                events: {!! json_encode($events) !!},
                eventClick: function(info) {
                    var acaraTitleEl = document.querySelector('.acara-title');
                    var acaraStartEl = document.querySelector('.acara-start');
                    var acaraEndEl = document.querySelector('.acara-end');
                    var acaraInstansiEl = document.querySelector('.acara-instansi');

                    var mulai = formatter.format(new Date(info.event.start));
                    var selesai = formatter.format(new Date(info.event.end));

                    acaraTitleEl.textContent = info.event.title;
                    acaraStartEl.textContent = mulai;
                    acaraEndEl.textContent = selesai;
                    acaraInstansiEl.textContent = info.event.extendedProps.instansi;
                },
                eventMouseEnter: function(info) {
                    info.el.style.backgroundColor = '#3498db';
                    info.el.style.cursor = 'pointer';
                },
                eventMouseLeave: function(info) {
                    info.el.style.backgroundColor = '';
                },
            });
            calendar.render();
        });
    </script>



    {{-- Alert --}}
    @if (session('success'))
        <script>
            window.location = window.location.href.split('#')[0] + '#peminjaman';
        </script>
    @endif
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const closeButtons = document.querySelectorAll('[data-dismiss-target]');

            closeButtons.forEach((button) => {
                button.addEventListener('click', function() {
                    const targetId = this.getAttribute('data-dismiss-target');
                    const alertElement = document.querySelector(targetId);

                    if (alertElement) {
                        alertElement.remove();
                    }
                });
            });
        });
    </script>

@endsection
