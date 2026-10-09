@extends('main.app')

@section('content')
<!-- Include FullCalendar CSS -->
<link href='https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.css' rel='stylesheet' />

<section id="agenda-kegiatan" class="mb-12">
    
    <!-- Hero Banner with Minangkabau Motif -->
    <div class="w-screen relative left-1/2 -translate-x-1/2 bg-[#0F2A4A] overflow-hidden pt-20 pb-24 px-8 mt-[-2rem]">
        <div class="absolute inset-0 opacity-10 pointer-events-none">
            <svg width="100%" height="100%" xmlns="http://www.w3.org/2000/svg">
                <defs>
                    <pattern id="minang-pattern" x="0" y="0" width="60" height="60" patternUnits="userSpaceOnUse">
                        <path d="M30 0 L60 30 L30 60 L0 30 Z" fill="none" stroke="#FBBF24" stroke-width="1.5"/>
                        <path d="M30 10 L50 30 L30 50 L10 30 Z" fill="none" stroke="#FBBF24" stroke-width="1"/>
                        <path d="M30 20 L40 30 L30 40 L20 30 Z" fill="#FBBF24"/>
                        <circle cx="30" cy="0" r="3" fill="#FBBF24"/>
                        <circle cx="30" cy="60" r="3" fill="#FBBF24"/>
                        <circle cx="0" cy="30" r="3" fill="#FBBF24"/>
                        <circle cx="60" cy="30" r="3" fill="#FBBF24"/>
                    </pattern>
                </defs>
                <rect width="100%" height="100%" fill="url(#minang-pattern)" />
            </svg>
        </div>

        <div class="absolute bottom-0 right-0 left-0 flex justify-center opacity-15 pointer-events-none">
            <svg viewBox="0 0 800 150" class="w-full max-w-4xl text-amber-400" fill="currentColor" preserveAspectRatio="xMidYMax meet">
                <path d="M 400 100 Q 250 10 100 50 L 100 150 L 700 150 L 700 50 Q 550 10 400 100 Z" />
                <path d="M 400 60 Q 300 0 150 40 L 150 150 L 650 150 L 650 40 Q 500 0 400 60 Z" />
                <path d="M 400 20 Q 350 -10 250 20 L 250 150 L 550 150 L 550 20 Q 450 -10 400 20 Z" />
            </svg>
        </div>

        <div class="relative z-10 text-center">
            <span class="inline-block text-amber-400 font-extrabold tracking-widest uppercase text-sm mb-4 border border-amber-400/50 px-4 py-1 rounded-full bg-amber-400/10 backdrop-blur-sm">
                Informasi Publik
            </span>
            <h2 class="text-4xl md:text-5xl font-black text-white mb-6 tracking-tight drop-shadow-lg">
                Agenda Kegiatan
            </h2>
            <div class="w-24 h-1.5 bg-gradient-to-r from-transparent via-amber-400 to-transparent mx-auto"></div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="w-full max-w-7xl mx-auto pt-16 px-4 lg:px-8 relative z-20">
        <div class="bg-white rounded-3xl shadow-xl shadow-blue-900/5 border border-slate-100 p-4 md:p-8 mb-12">
            
            <!-- Fitur Pencarian & Navigasi -->
            <div class="flex flex-col lg:flex-row justify-between items-center mb-8 gap-4 bg-slate-50 p-4 rounded-xl border border-slate-100">
                
                <!-- Dropdown Bulan & Tahun untuk Kalender -->
                <div class="flex items-center gap-2 w-full lg:w-auto">
                    <span class="text-sm font-semibold text-slate-600 mr-1 hidden sm:inline">Pilih Kalender:</span>
                    <select id="selectMonth" class="form-select rounded-lg border-slate-300 text-sm focus:ring-amber-400 focus:border-amber-400 py-2">
                        <option value="01">Januari</option>
                        <option value="02">Februari</option>
                        <option value="03">Maret</option>
                        <option value="04">April</option>
                        <option value="05">Mei</option>
                        <option value="06">Juni</option>
                        <option value="07">Juli</option>
                        <option value="08">Agustus</option>
                        <option value="09">September</option>
                        <option value="10">Oktober</option>
                        <option value="11">November</option>
                        <option value="12">Desember</option>
                    </select>
                    <select id="selectYear" class="form-select rounded-lg border-slate-300 text-sm focus:ring-amber-400 focus:border-amber-400 py-2">
                    </select>
                </div>

                <!-- Form Pencarian Agenda -->
                <form action="{{ url('/agenda-kegiatan') }}" method="GET" class="flex w-full lg:w-auto shadow-sm">
                    <input type="text" name="cari" value="{{ request('cari') }}" placeholder="Cari agenda/tempat..." class="form-input rounded-l-lg border-slate-300 text-sm focus:ring-amber-400 focus:border-amber-400 w-full lg:w-64 py-2">
                    <button type="submit" class="bg-[#0F2A4A] text-white px-4 py-2 rounded-r-lg text-sm font-bold hover:bg-[#1a4270] transition-colors">
                        <svg class="w-4 h-4 inline-block mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                        Cari
                    </button>
                    @if(request('cari'))
                        <a href="{{ url('/agenda-kegiatan') }}" class="ml-2 bg-slate-200 text-slate-700 px-3 py-2 rounded-lg text-sm hover:bg-slate-300 font-semibold flex items-center transition-colors">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                            Reset
                        </a>
                    @endif
                </form>
            </div>

            <!-- LAYOUT SPLIT (Kalender Kiri, Agenda Kanan) -->
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
                
                <!-- Kalender -->
                <div class="lg:col-span-7">
                    <p class="text-slate-500 text-sm mb-3">
                        <svg class="w-4 h-4 inline-block mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        Klik pada tanggal untuk melihat detail acara.
                    </p>
                    <div id='calendar' class="font-sans border border-slate-200 rounded-xl p-3 bg-white shadow-sm"></div>
                </div>

                <!-- Daftar Agenda (Timeline) -->
                <div class="lg:col-span-5">
                    <div class="flex items-center justify-between mb-6 pb-4 border-b border-slate-100">
                        <h3 class="text-xl font-bold text-[#0F2A4A]">Timeline Agenda</h3>
                        @if(request('cari'))
                            <span class="bg-amber-100 text-amber-800 text-[10px] font-bold px-2 py-1 rounded-full border border-amber-200">
                                Filter aktif
                            </span>
                        @endif
                    </div>

                    <!-- Scrollable Container untuk Timeline -->
                    <div class="pr-2 custom-scrollbar" style="max-height: 600px; overflow-y: auto;">
                        @if(count($agenda) > 0)
                            <div class="relative border-l-[3px] border-amber-400/50 ml-3 space-y-6 pb-4">
                                @foreach($agenda as $item)
                                <div class="relative pl-6 group">
                                    <!-- Timeline Dot -->
                                    <div class="absolute -left-[11px] top-1 h-5 w-5 rounded-full border-[3px] border-white shadow-sm
                                        {{ $item->status == 'Selesai' ? 'bg-slate-400' : 'bg-amber-400 group-hover:scale-125 transition-transform duration-300' }}">
                                    </div>

                                    <!-- Card Content -->
                                    <div class="bg-slate-50 hover:bg-slate-100 transition-colors duration-300 rounded-xl p-5 border border-slate-100 shadow-sm">
                                        <div class="flex flex-wrap items-center justify-between gap-1 mb-2">
                                            <div class="inline-flex items-center space-x-1 text-xs font-bold 
                                                {{ $item->status == 'Selesai' ? 'text-slate-500' : 'text-[#0F2A4A]' }}">
                                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                                </svg>
                                                <span>{{ \Carbon\Carbon::parse($item->tanggal)->locale('id')->isoFormat('D MMM YYYY') }}</span>
                                            </div>
                                            <span class="px-2 py-0.5 text-[10px] font-bold rounded-full uppercase tracking-wider
                                                {{ $item->status == 'Selesai' ? 'bg-slate-200 text-slate-600' : 'bg-green-100 text-green-700' }}">
                                                {{ $item->status }}
                                            </span>
                                        </div>
                                        
                                        <h3 class="text-base font-bold text-slate-800 mb-1.5 leading-tight">
                                            {{ $item->kegiatan }}
                                        </h3>
                                        
                                        <p class="text-slate-600 mb-3 text-xs leading-relaxed line-clamp-3" title="{{ $item->deskripsi }}">
                                            {{ $item->deskripsi }}
                                        </p>
                                        
                                        <div class="flex flex-col gap-1.5 pt-3 border-t border-slate-200/60">
                                            <div class="flex items-center text-xs text-slate-600">
                                                <svg class="w-3.5 h-3.5 mr-1.5 text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                </svg>
                                                {{ $item->waktu ?? '-' }}
                                            </div>
                                            <div class="flex items-center text-xs text-slate-600">
                                                <svg class="w-3.5 h-3.5 mr-1.5 text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                </svg>
                                                <span class="truncate" title="{{ $item->tempat ?? '-' }}">{{ $item->tempat ?? '-' }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        @else
                            <div class="text-center py-10 bg-slate-50 rounded-xl border-2 border-dashed border-slate-200">
                                <h3 class="text-sm font-bold text-slate-700 mb-1">Kosong</h3>
                                <p class="text-xs text-slate-500 px-4">Tidak ada data agenda yang ditemukan.</p>
                            </div>
                        @endif
                    </div>
                </div>

            </div> <!-- End Grid Layout -->

        </div>
    </div>
</section>

<!-- Modal FullCalendar Details -->
<div id="eventModal" class="fixed inset-0 z-50 flex items-center justify-center hidden opacity-0 transition-opacity duration-300" style="background-color: rgba(0, 0, 0, 0.5);">
    <div class="bg-white rounded-2xl shadow-2xl w-full max-w-md mx-4 overflow-hidden transform scale-95 transition-transform duration-300" id="eventModalContent">
        <div class="bg-[#0F2A4A] p-4 flex justify-between items-center text-white">
            <h4 class="font-bold text-lg flex-1">Detail Kegiatan</h4>
            <button onclick="closeModal()" class="text-white hover:text-amber-400 focus:outline-none">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
            </button>
        </div>
        <div class="p-6">
            <h3 id="modalTitle" class="text-xl font-bold text-slate-800 mb-4"></h3>
            <div class="space-y-3 text-sm text-slate-600">
                <div class="flex items-start">
                    <svg class="w-5 h-5 mr-3 text-amber-500 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                    <div><span class="font-semibold block text-slate-700">Tanggal</span><span id="modalDate"></span></div>
                </div>
                <div class="flex items-start">
                    <svg class="w-5 h-5 mr-3 text-amber-500 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    <div><span class="font-semibold block text-slate-700">Waktu</span><span id="modalTime"></span></div>
                </div>
                <div class="flex items-start">
                    <svg class="w-5 h-5 mr-3 text-amber-500 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                    <div><span class="font-semibold block text-slate-700">Tempat</span><span id="modalLocation"></span></div>
                </div>
                <div class="flex items-start">
                    <svg class="w-5 h-5 mr-3 text-amber-500 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7"></path></svg>
                    <div><span class="font-semibold block text-slate-700">Deskripsi</span><span id="modalDesc"></span></div>
                </div>
            </div>
            <div class="mt-6 text-right">
                <button onclick="closeModal()" class="px-4 py-2 bg-slate-100 hover:bg-slate-200 text-slate-700 rounded-lg text-sm font-semibold transition-colors">Tutup</button>
            </div>
        </div>
    </div>
</div>

<!-- Scripts for FullCalendar -->
<script src='https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.js'></script>
<script src='https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/locales/id.js'></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        
        // Populate Year Dropdown
        var selectYear = document.getElementById('selectYear');
        var currentYear = new Date().getFullYear();
        for (var y = currentYear - 5; y <= currentYear + 5; y++) {
            var opt = document.createElement('option');
            opt.value = y;
            opt.innerHTML = y;
            selectYear.appendChild(opt);
        }
        selectYear.value = currentYear;

        // Set Month Dropdown
        var selectMonth = document.getElementById('selectMonth');
        var currentMonth = String(new Date().getMonth() + 1).padStart(2, '0');
        selectMonth.value = currentMonth;

        var calendarEl = document.getElementById('calendar');
        var eventsData = [
            @foreach($agenda as $item)
            {
                title: '{{ addslashes($item->kegiatan) }}',
                start: '{{ $item->tanggal }}',
                color: '{{ $item->status == "Selesai" ? "#94a3b8" : "#fbbf24" }}',
                textColor: '{{ $item->status == "Selesai" ? "#ffffff" : "#0f2a4a" }}',
                extendedProps: {
                    waktu: '{{ addslashes($item->waktu ?? "-") }}',
                    tempat: '{{ addslashes($item->tempat ?? "-") }}',
                    deskripsi: '{{ addslashes(str_replace(array("\r", "\n"), '', $item->deskripsi)) }}',
                    tanggal_indo: '{{ \Carbon\Carbon::parse($item->tanggal)->locale("id")->isoFormat("D MMMM YYYY") }}'
                }
            },
            @endforeach
        ];

        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            locale: 'id',
            headerToolbar: {
                left: 'prev,next today',
                center: 'title',
                right: 'dayGridMonth,listMonth'
            },
            height: 600, // Fixed height to match timeline
            events: eventsData,
            eventClick: function(info) {
                document.getElementById('modalTitle').textContent = info.event.title;
                document.getElementById('modalDate').textContent = info.event.extendedProps.tanggal_indo;
                document.getElementById('modalTime').textContent = info.event.extendedProps.waktu;
                document.getElementById('modalLocation').textContent = info.event.extendedProps.tempat;
                document.getElementById('modalDesc').textContent = info.event.extendedProps.deskripsi;
                
                var modal = document.getElementById('eventModal');
                var modalContent = document.getElementById('eventModalContent');
                modal.classList.remove('hidden');
                setTimeout(function() {
                    modal.classList.remove('opacity-0');
                    modalContent.classList.remove('scale-95');
                }, 10);
            }
        });
        calendar.render();

        // Sync Dropdown with Calendar
        function goToSelectedDate() {
            var y = selectYear.value;
            var m = selectMonth.value;
            calendar.gotoDate(y + '-' + m + '-01');
        }
        selectMonth.addEventListener('change', goToSelectedDate);
        selectYear.addEventListener('change', goToSelectedDate);

        calendar.on('datesSet', function(info) {
            var viewDate = calendar.getDate();
            selectMonth.value = String(viewDate.getMonth() + 1).padStart(2, '0');
            selectYear.value = viewDate.getFullYear();
        });
    });

    function closeModal() {
        var modal = document.getElementById('eventModal');
        var modalContent = document.getElementById('eventModalContent');
        modal.classList.add('opacity-0');
        modalContent.classList.add('scale-95');
        
        setTimeout(function() {
            modal.classList.add('hidden');
        }, 300);
    }
</script>

<style>
    /* Custom FullCalendar Overrides */
    .fc .fc-toolbar-title { font-weight: 700; color: #0F2A4A; font-size: 1.15rem;}
    @media (min-width: 1024px) {
        .fc .fc-toolbar-title { font-size: 1.25rem; }
    }
    .fc .fc-button-primary { background-color: #0F2A4A; border-color: #0F2A4A; text-transform: capitalize; font-size: 0.875rem; }
    .fc .fc-button-primary:not(:disabled):active, .fc .fc-button-primary:not(:disabled).fc-button-active {
        background-color: #fbbf24; border-color: #fbbf24; color: #0F2A4A;
    }
    .fc .fc-button-primary:hover { background-color: #1a4270; border-color: #1a4270; }
    .fc-event { cursor: pointer; padding: 2px 4px; border-radius: 4px; font-weight: 600; font-size: 0.75rem; border: none !important;}
    .fc-day-today { background-color: #f8fafc !important; }

    /* Custom Scrollbar for Timeline */
    .custom-scrollbar::-webkit-scrollbar { width: 6px; }
    .custom-scrollbar::-webkit-scrollbar-track { background: #f1f5f9; border-radius: 4px; }
    .custom-scrollbar::-webkit-scrollbar-thumb { background: #cbd5e1; border-radius: 4px; }
    .custom-scrollbar::-webkit-scrollbar-thumb:hover { background: #94a3b8; }
</style>
@endsection
