@extends('layouts.admin')
@section('title', 'Jadwal')
@section('content')

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css" />

    <h1 class="text-3xl text-slate-600 font-semibold mb-10 ">Jadwal</h1>

    <section>
        <div class="px-4 lg:px-0 flex justify-center items-center flex-wrap lg:flex-nowrap lg:items-start">
            <div id="calendar" class="w-full xl:w-1/2 text-xs shadow-lg shadow-slate-400 mb-4 mx-4 bg-white"></div>
            <div class="w-full xl:w-1/2  shadow-lg shadow-slate-400 p-4 mx-4 bg-white">
                <h1 class="font-medium mb-2 text-center text-slate-600">Jadwal Peminjaman Gedung</h1>
                {{-- Tampilan data --}}
                <div class="detail-acara text-slate-500 text-sm mb-4">
                    <table class="table-auto">
                        <thead>
                            <tr>
                                <th class="px-4 py-2">Acara</th>
                                <th class="px-4 py-2">Instansi</th>
                                <th class="px-4 py-2">Mulai</th>
                                <th class="px-4 py-2">Selesai</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="acara-title px-4 py-2"></td>
                                <td class="acara-instansi px-4 py-2"></td>
                                <td class="acara-start px-4 py-2"></td>
                                <td class="acara-end px-4 py-2"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>


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
                locale: 'id',
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

                    if (info.event) {
                        var mulai = formatter.format(new Date(info.event.start));
                        var selesai = formatter.format(new Date(info.event.end));

                        acaraTitleEl.textContent = info.event.title;
                        acaraStartEl.textContent = mulai;
                        acaraEndEl.textContent = selesai;
                        acaraInstansiEl.textContent = info.event.extendedProps.instansi;
                    } else {
                        acaraTitleEl.textContent = 'Data tanggal ini kosong';
                        acaraStartEl.textContent = '';
                        acaraEndEl.textContent = '';
                        acaraInstansiEl.textContent = '';
                    }
                },
                datesSet: function() {
                    var acaraTitleEl = document.querySelector('.acara-title');
                    var acaraStartEl = document.querySelector('.acara-start');
                    var acaraEndEl = document.querySelector('.acara-end');
                    var acaraInstansiEl = document.querySelector('.acara-instansi');

                    acaraTitleEl.textContent = 'Pilih tanggal untuk melihat acara';
                    acaraStartEl.textContent = '';
                    acaraEndEl.textContent = '';
                    acaraInstansiEl.textContent = '';
                },
                dateClick: function(info) {
                    var acaraTitleEl = document.querySelector('.acara-title');
                    var acaraStartEl = document.querySelector('.acara-start');
                    var acaraEndEl = document.querySelector('.acara-end');
                    var acaraInstansiEl = document.querySelector('.acara-instansi');

                    acaraTitleEl.textContent = 'Data tanggal ini kosong';
                    acaraStartEl.textContent = '';
                    acaraEndEl.textContent = '';
                    acaraInstansiEl.textContent = '';
                }

            });
            calendar.render();
        });
    </script>

@endsection
