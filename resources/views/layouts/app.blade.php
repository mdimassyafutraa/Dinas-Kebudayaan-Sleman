<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    {{-- fa.Icon --}}
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

    {{-- full kalender  --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css" />

    <title>@yield('title')</title>

    <style>
        /* Ukuran teks untuk layar besar */
        #calendar {
            font-size: 14px;
        }

        /* Ukuran teks untuk layar kecil */
        @media screen and (max-width: 600px) {
            #calendar {
                font-size: 8px;
            }
        }
    </style>
</head>

<body>
    @yield('content')

    {{-- <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.10/index.global.min.js'></script> --}}

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

    {{-- Validasi / onclik --}}
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const form = document.querySelector('form');

            form.addEventListener('submit', function(event) {
                event.preventDefault();
                if (validateForm()) {
                    this.submit();
                }
            });

            function validateForm() {
                const inputs = document.querySelectorAll(
                    'input[type="text"], input[type="number"], input[type="date"], select, input[type="file"]');
                let isValid = true;

                inputs.forEach(input => {
                    if (input.value.trim() === '') {
                        isValid = false;
                        input.classList.add('error');
                    } else {
                        input.classList.remove('error');
                    }
                });

                if (!isValid) {
                    alert('Mohon lengkapi semua form sebelum mengirim data.');
                }

                return isValid;
            }

            const submitLink = document.getElementById('submit-link');
            submitLink.addEventListener('click', function(event) {
                event.preventDefault();

                if (confirm('Apakah yakin ingin menambahkan data ini?')) {
                    if (validateForm()) {
                        form.submit();
                    }
                }
            });
        });
    </script>


    {{-- My Js --}}
    <script src="{{ asset('js/script.js') }}"></script>

</body>

</html>
