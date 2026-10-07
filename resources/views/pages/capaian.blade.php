@extends('main.app')

@section('content')
<section id="capaian" class="mb-12">

    <!-- Hero Banner with Minangkabau Motif -->
    <div class="w-screen relative left-1/2 -translate-x-1/2 bg-[#0F2A4A] overflow-hidden pt-20 pb-40 px-8 mt-[-2rem]">
        <div class="absolute inset-0 opacity-10 pointer-events-none">
            <svg width="100%" height="100%" xmlns="http://www.w3.org/2000/svg">
                <defs>
                    <pattern id="minang-pattern-capaian" x="0" y="0" width="60" height="60" patternUnits="userSpaceOnUse">
                        <path d="M30 0 L60 30 L30 60 L0 30 Z" fill="none" stroke="#FBBF24" stroke-width="1.5"/>
                        <path d="M30 10 L50 30 L30 50 L10 30 Z" fill="none" stroke="#FBBF24" stroke-width="1"/>
                        <path d="M30 20 L40 30 L30 40 L20 30 Z" fill="#FBBF24"/>
                        <circle cx="30" cy="0" r="3" fill="#FBBF24"/>
                        <circle cx="30" cy="60" r="3" fill="#FBBF24"/>
                        <circle cx="0" cy="30" r="3" fill="#FBBF24"/>
                        <circle cx="60" cy="30" r="3" fill="#FBBF24"/>
                    </pattern>
                </defs>
                <rect width="100%" height="100%" fill="url(#minang-pattern-capaian)" />
            </svg>
        </div>

        <div class="absolute bottom-0 right-0 left-0 flex justify-center opacity-10 pointer-events-none translate-y-8">
            <svg viewBox="0 0 800 150" class="w-full max-w-5xl text-amber-400" fill="currentColor" preserveAspectRatio="xMidYMax meet">
                <path d="M 400 100 Q 250 10 100 50 L 100 150 L 700 150 L 700 50 Q 550 10 400 100 Z" />
                <path d="M 400 60 Q 300 0 150 40 L 150 150 L 650 150 L 650 40 Q 500 0 400 60 Z" />
                <path d="M 400 20 Q 350 -10 250 20 L 250 150 L 550 150 L 550 20 Q 450 -10 400 20 Z" />
            </svg>
        </div>

<div class="relative z-10 text-center max-w-3xl mx-auto">
            <span class="inline-block text-amber-400 font-extrabold tracking-widest uppercase text-xs mb-4 border border-amber-400/50 px-4 py-1 rounded-full bg-amber-400/10 backdrop-blur-sm">
                Transparansi Publik
            </span>
            <h2 class="text-4xl md:text-5xl font-black text-white mb-6 tracking-tight drop-shadow-lg">
                Statistik &amp; Capaian
            </h2>
            <p class="text-blue-100 text-lg font-medium opacity-90">Dokumentasi hasil kinerja, capaian program, serta laporan evaluasi Balai Bahasa Provinsi Sumatera Barat.</p>
        </div>
    </div>

    <div class="w-screen relative left-1/2 -translate-x-1/2 px-4 md:px-12 pb-20 -mt-16 z-20">
        
        
            
            
            <div class="relative z-10 overflow-x-auto rounded-xl shadow-2xl shadow-[#0F2A4A]/10 bg-white p-6 md:p-8">
                <style>
                    .dataTables_wrapper .dataTables_length select { border-radius: 0.5rem; border-color: #E5E7EB; padding: 0.25rem 2rem 0.25rem 0.5rem; outline: none; box-shadow: none; }
                    .dataTables_wrapper .dataTables_filter input { border-radius: 9999px; border: 1px solid #E5E7EB; padding: 0.5rem 1rem; outline: none; margin-left: 0.5rem; background: #F9FAFB; transition: all 0.3s; }
                    .dataTables_wrapper .dataTables_filter input:focus { border-color: #FBBF24; box-shadow: 0 0 0 3px rgba(251, 191, 36, 0.2); background: white; }
                    table.dataTable { border-collapse: collapse !important; border-radius: 0.75rem; overflow: hidden; margin-top: 1rem !important; margin-bottom: 1rem !important; box-shadow: 0 10px 15px -3px rgba(0,0,0,0.1), 0 4px 6px -4px rgba(0,0,0,0.1); }
                    table.dataTable thead th { background-color: #0F2A4A !important; color: white !important; font-weight: 600; padding: 1rem; border-bottom: 4px solid #FBBF24 !important; }
                    table.dataTable tbody td { padding: 1rem; border-bottom: 1px solid #F3F4F6; vertical-align: middle; }
                    table.dataTable tbody tr:hover { background-color: #F0F9FF !important; }
                    .dataTables_wrapper .dataTables_paginate .paginate_button.current { background: #0F2A4A !important; color: white !important; border: none !important; border-radius: 0.5rem; font-weight: bold; }
                    .dataTables_wrapper .dataTables_paginate .paginate_button:hover:not(.current) { background: #F3F4F6 !important; color: #0F2A4A !important; border: none !important; border-radius: 0.5rem; }
                </style>

                <table id="tabel-capaian" class="min-w-full w-full bg-white">
                    <thead>
                        <tr>
                            <th class="text-left whitespace-nowrap">Nama Dokumen</th>
                            <th class="text-left whitespace-nowrap">Tahun Capaian</th>
                            <th class="text-left whitespace-nowrap">Penanggung Jawab</th>
                            <th class="text-center whitespace-nowrap">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dokumen->get('statistik', []) as $item)
                        <tr class="transition-colors">
                            <td class="font-semibold text-gray-800">{{ $item->nama }}</td>
                            <td class="text-[#0F2A4A] font-black text-lg">{{ $item->tahun }}</td>
                            <td class="text-gray-600">
                                <span class="bg-emerald-50 text-emerald-700 px-3 py-1 rounded-full text-xs font-bold whitespace-nowrap inline-block">{{ $item->pj ?? '-' }}</span>
                            </td>
                            <td class="text-center">@include('main.partials.tombol-dokumen')</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="mt-8 p-4 bg-amber-50 rounded-xl border border-amber-100 flex items-start gap-4 shadow-sm">
                <div class="bg-amber-100 text-amber-600 p-2 rounded-full shrink-0">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                </div>
                <p class="text-sm text-amber-800 leading-relaxed">
                    <strong>Catatan:</strong> Informasi ini diperbarui secara berkala sesuai dengan peraturan yang berlaku. Untuk pertanyaan lebih lanjut, silakan hubungi layanan pengaduan PPID Balai Bahasa Provinsi Sumatera Barat.
                </p>
            </div>
    </div>
</section>
@endsection







