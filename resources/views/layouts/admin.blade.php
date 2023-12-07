<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    {{-- Icon --}}
    <link rel="shortcut icon" href="{{ asset('img/icon.png') }}" type="image/x-icon">

    @vite('resources/css/app.css')

    {{-- Icon --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />

    {{-- font --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">

    {{-- Aos --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" rel="stylesheet">



    <title>Dinas Kabudayaan Khunda Kabudayaan Kabupaten Sleman | @yield('title')</title>

    <style>
        .active {
            color: #19172B;
            display: block;
            border-radius: 0.375rem;
            transition: background-color 0.3s ease-in-out, color 0.3s ease-in-out;
            background-color: white;
            transition-duration: 0.3s;
            transition-timing-function: ease-in-out;
        }
    </style>
</head>

<body>

    <section>
        <div class="fixed w-60">
            <div class="humberger p-4 text-2xl cursor-pointer md:hidden">
                <i id="sidebar-open" class="fa-solid fa-bars"></i>
            </div>
            {{-- Nav --}}
            <div
                class="absolute  backdrop-blur-3xl bg-ungu h-screen z-10 top-0 p-4 -translate-x-full duration-300 md:translate-x-0 md:relative">
                <div class="flex items-center space-x-2">
                    <img src="{{ asset('img/logo.png') }}" class="brightness-90" width="200" alt="Logo">
                </div>
                <div class="w-full  mx-2 mt-2 space-x-2 ">
                    {{-- <h2 class="text-sm font-semibold text-white mt-3">{{ Auth::user()->email }}</h2> --}}
                </div>
                <ul class=" w-full mt-10 text-white font-semibold ">
                    <li class="mb-2">
                        <a href="{{ route('dashboard') }}"
                            class="flex items-center text-base p-4 rounded-md hover:bg-white hover:text-ungu space-x-2 transition duration-300 ease-in-ot {{ Request::is('admin.dashboard*') ? 'active' : '' }}">
                            <i class="fa-solid fa-gauge "></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="{{ route('jadwal') }}"
                            class="flex items-center text-base p-4 rounded-md hover:bg-white hover:text-ungu  space-x-2 transition duration-300 ease-in-out {{ Request::is('admin.tamu*') ? 'active' : '' }}">
                            <i class="fa-solid fa-calendar-week"></i>
                            <span>Jadwal</span>
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="{{ route('peminjaman') }}"
                            class="flex items-center text-base p-4 rounded-md hover:bg-white hover:text-ungu  space-x-2 transition duration-300 ease-in-out {{ Request::is('admin.tamu*') ? 'active' : '' }}">
                            <i class="fa-solid fa-clipboard"></i>
                            <span>Peminjaman</span>
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="{{ route('fasilitas') }}"
                            class="flex items-center text-base p-4 rounded-md hover:bg-white hover:text-ungu  space-x-2 transition duration-300 ease-in-out {{ Request::is('admin.rekap*') ? 'active' : '' }}">
                            <i class="fa-solid fa-city"></i>
                            <span>Fasilitas</span>
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="{{ route('peraturan') }}"
                            class="flex items-center text-base p-4 rounded-md hover:bg-white hover:text-ungu  space-x-2 transition duration-300 ease-in-out {{ Request::is('admin.rekap*') ? 'active' : '' }}">
                            <i class="fa-solid fa-circle-info"></i>
                            <span>Pelayanan & Peraturan</span>
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="{{ route('kontak') }}"
                            class="flex items-center text-base p-4 rounded-md hover:bg-white hover:text-ungu  space-x-2 transition duration-300 ease-in-out {{ Request::is('admin.rekap*') ? 'active' : '' }}">
                            <i class="fa-solid fa-phone"></i>
                            <span>Kontak</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('logout') }}" id="logout-link"
                            class="flex items-center text-base p-4 rounded-md hover:bg-white hover:text-ungu  space-x-2 transition duration-300 ease-in-out">
                            <i class="fa-solid fa-right-from-bracket"></i>
                            <span>Logout</span>
                        </a>
                    </li>
                    <li class="mt-10">
                        <div class="md:hidden text-3xl text-biru cursor-pointer flex justify-center">
                            <i id="sidebar-close" class="fa-solid fa-arrow-left"></i>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        {{-- page --}}
        <div class="md:pl-64 p-5 w-full md:pt-2">
            <div class="pt-10">
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
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 14 14">
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
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                        </button>
                    </div>
                @endif
                @yield('content')
            </div>
        </div>
    </section>




    {{-- script jquery --}}
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>

    {{-- Scroll --}}
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>



    {{-- Alert --}}
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
    {{-- Aktive --}}
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const currentLocation = window.location.href;

            const links = document.querySelectorAll('a');
            links.forEach(link => {
                if (link.href === currentLocation) {
                    link.classList.add('active');
                }
            });
        });
    </script>
    {{-- sidebar --}}
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var sidebarOpen = document.getElementById("sidebar-open");
            var sidebarClose = document.getElementById("sidebar-close");
            var sidebar = document.querySelector(".backdrop-blur-3xl");
            var humberger = document.querySelector(".humberger");
            var body = document.querySelector("body");

            // Menambahkan event listener untuk mengaktifkan sidebar saat tombol "sidebar-open" diklik
            sidebarOpen.addEventListener("click", function() {
                sidebar.style.transform = "translateX(0)";
                humberger.classList.add('-translate-x-full');

                // Menambahkan event listener untuk menutup sidebar saat tombol "sidebar-close" diklik
                sidebarClose.addEventListener("click", function() {
                    sidebar.style.transform = "translateX(-100%)";
                    humberger.classList.remove('-translate-x-full');
                });

                // Menambahkan event listener untuk menutup sidebar saat klik di luar area sidebar
                body.addEventListener("click", function(event) {
                    if (event.target !== sidebar && !sidebar.contains(event.target) && event
                        .target !== sidebarOpen) {
                        sidebar.style.transform = "translateX(-100%)";
                        humberger.classList.remove('-translate-x-full');
                    }
                });
            });
        });


        // Logout 
        const logoutLink = document.getElementById('logout-link');
        logoutLink.addEventListener('click', function(event) {
            event.preventDefault();

            // Konfirmasi logout
            if (confirm('Apakah Anda yakin ingin keluar?')) {
                window.location.href = logoutLink.getAttribute('href');
            }
        });
    </script>


</body>

</html>
