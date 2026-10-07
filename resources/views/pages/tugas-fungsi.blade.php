@extends('main.app')

@section('content')
<section id="tugas-fungsi" class="mb-12">

    <!-- Hero Banner with Minangkabau Motif -->
    <div class="w-screen relative left-1/2 -translate-x-1/2 bg-[#0F2A4A] overflow-hidden pt-20 pb-40 px-8 mt-[-2rem]">
        <!-- SVG Pattern Background (Songket / Kaluak Paku / Pucuak Rabuang stylized) -->
        <div class="absolute inset-0 opacity-10 pointer-events-none">
            <svg width="100%" height="100%" xmlns="http://www.w3.org/2000/svg">
                <defs>
                    <pattern id="minang-pattern-tugas" x="0" y="0" width="60" height="60" patternUnits="userSpaceOnUse">
                        <path d="M30 0 L60 30 L30 60 L0 30 Z" fill="none" stroke="#FBBF24" stroke-width="1.5"/>
                        <path d="M30 10 L50 30 L30 50 L10 30 Z" fill="none" stroke="#FBBF24" stroke-width="1"/>
                        <path d="M30 20 L40 30 L30 40 L20 30 Z" fill="#FBBF24"/>
                        <circle cx="30" cy="0" r="3" fill="#FBBF24"/>
                        <circle cx="30" cy="60" r="3" fill="#FBBF24"/>
                        <circle cx="0" cy="30" r="3" fill="#FBBF24"/>
                        <circle cx="60" cy="30" r="3" fill="#FBBF24"/>
                    </pattern>
                </defs>
                <rect width="100%" height="100%" fill="url(#minang-pattern-tugas)" />
            </svg>
        </div>

        <!-- Rumah Gadang Silhouette -->
        <div class="absolute bottom-0 right-0 left-0 flex justify-center opacity-10 pointer-events-none translate-y-8">
            <svg viewBox="0 0 800 150" class="w-full max-w-5xl text-amber-400" fill="currentColor" preserveAspectRatio="xMidYMax meet">
                <path d="M 400 100 Q 250 10 100 50 L 100 150 L 700 150 L 700 50 Q 550 10 400 100 Z" />
                <path d="M 400 60 Q 300 0 150 40 L 150 150 L 650 150 L 650 40 Q 500 0 400 60 Z" />
                <path d="M 400 20 Q 350 -10 250 20 L 250 150 L 550 150 L 550 20 Q 450 -10 400 20 Z" />
            </svg>
        </div>

<div class="relative z-10 text-center max-w-3xl mx-auto">
            <span class="inline-block text-amber-400 font-extrabold tracking-widest uppercase text-xs mb-4 border border-amber-400/50 px-4 py-1 rounded-full bg-amber-400/10 backdrop-blur-sm">
                Dasar Pelaksanaan Organisasi
            </span>
            <h2 class="text-4xl md:text-5xl font-black text-white mb-6 tracking-tight drop-shadow-lg">
                Tugas &amp; Fungsi
            </h2>
            <p class="text-blue-100 text-lg font-medium opacity-90">Pedoman utama dalam menjalankan komitmen pelestarian, pembinaan, dan pengembangan bahasa di Sumatera Barat.</p>
        </div>
    </div>

    <!-- Main Content Area -->
    <div class="relative px-4 pb-20 md:px-8 max-w-6xl mx-auto -mt-24 z-20">
        
        <!-- TUGAS Utama -->
        <div class="bg-white rounded-3xl p-8 md:p-12 shadow-xl shadow-[#0F2A4A]/5 border border-gray-100 mb-16 relative overflow-hidden group hover:border-amber-200 transition-colors">
            <!-- Decorative Motif Accent -->
            <div class="absolute top-0 right-0 w-64 h-full bg-[url('/images/motif-batik-sumbar.png')] bg-repeat-y bg-contain opacity-[0.02] pointer-events-none transform translate-x-10 group-hover:translate-x-8 transition-transform duration-700"></div>
            
            <div class="flex items-start gap-6 relative z-10">
                <div class="hidden sm:flex w-16 h-16 bg-gradient-to-br from-amber-400 to-amber-500 rounded-2xl items-center justify-center text-[#0F2A4A] flex-shrink-0 shadow-lg shadow-amber-500/20 rotate-3 group-hover:rotate-0 transition-transform">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                </div>
                <div>
                    <h3 class="text-2xl font-black text-[#0F2A4A] mb-4 flex items-center gap-3">
                        Tugas Pokok
                        <div class="h-1 w-12 bg-amber-400 rounded-full"></div>
                    </h3>
                    <p class="text-gray-700 leading-loose text-lg md:text-xl">
                        Balai Bahasa Provinsi Sumatera Barat mempunyai tugas <strong class="text-[#0F2A4A] bg-amber-50 px-2 py-0.5 rounded">melaksanakan pelindungan dan pemasyarakatan bahasa dan sastra Indonesia di wilayah kerjanya</strong>, serta mendukung pelaksanaan kebijakan nasional di bidang pengembangan, pembinaan, dan pelindungan bahasa dan sastra.
                    </p>
                </div>
            </div>
        </div>

        <!-- FUNGSI -->
        <div class="mb-16">
            <div class="text-center mb-12">
                <h3 class="text-3xl font-black text-[#0F2A4A] mb-4">Fungsi Pelaksanaan</h3>
                <p class="text-gray-600 max-w-2xl mx-auto text-lg">Dalam melaksanakan tugas utamanya, Balai Bahasa Provinsi Sumatera Barat menyelenggarakan 9 fungsi esensial sebagai berikut:</p>
            </div>

            <!-- Grid of 9 Functions -->
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6 items-start">
                
                @php
                    $fungsi = [
                        ['A', 'Pemetaan Bahasa', 'Pelaksanaan pemetaan bahasa dan sastra daerah di wilayah kerja.', 'Melakukan identifikasi, dokumentasi, dan pemetaan sebaran bahasa dan sastra daerah di wilayah Sumatera Barat untuk keperluan pelindungan dan revitalisasi.'],
                        ['B', 'Inventarisasi', 'Pelaksanaan inventarisasi kosakata dan karya sastra di wilayah kerja.', 'Mengumpulkan, mencatat, dan mendokumentasikan kosakata bahasa daerah serta karya sastra tradisional dan modern untuk keperluan penelitian dan pelestarian.'],
                        ['C', 'Konservasi', 'Pelaksanaan konservasi dan revitalisasi bahasa dan sastra daerah.', 'Melakukan upaya pelestarian dan penghidupan kembali bahasa dan sastra daerah yang terancam punah melalui berbagai program revitalisasi.'],
                        ['D', 'Pemasyarakatan', 'Pelaksanaan pemasyarakatan bahasa Indonesia di wilayah kerja.', 'Mensosialisasikan penggunaan bahasa Indonesia yang baik dan benar kepada masyarakat melalui berbagai kegiatan pembinaan dan penyuluhan.'],
                        ['E', 'Fasilitasi', 'Pelaksanaan fasilitasi pelindungan dan pemasyarakatan bahasa dan sastra.', 'Memberikan dukungan teknis dan administratif kepada komunitas dan lembaga dalam upaya pelindungan dan pemasyarakatan bahasa daerah.'],
                        ['F', 'Layanan Publik', 'Pemberian layanan kebahasaan dan kesastraan kepada masyarakat dan lembaga.', 'Menyediakan layanan konsultasi, pelatihan, dan bimbingan teknis di bidang kebahasaan dan kesastraan untuk masyarakat dan institusi.'],
                        ['G', 'Kemitraan', 'Pelaksanaan kemitraan di bidang kebahasaan dan kesastraan dengan berbagai pihak.', 'Membangun dan mengembangkan kerja sama dengan perguruan tinggi, komunitas, pemerintah daerah, dan stakeholder lainnya.'],
                        ['H', 'Monitoring', 'Pelaksanaan pemantauan dan evaluasi di bidang kebahasaan dan kesastraan.', 'Melakukan pemantauan dan evaluasi terhadap pelaksanaan program dan kegiatan kebahasaan serta kesastraan di wilayah kerja.'],
                        ['I', 'Administrasi', 'Pelaksanaan urusan administrasi dan ketatausahaan.', 'Menyelenggarakan urusan administrasi umum, kepegawaian, keuangan, dan ketatausahaan untuk mendukung kelancaran pelaksanaan tugas dan fungsi.']
                    ];
                @endphp

                @foreach($fungsi as $index => $item)
                <div x-data="{ open: false }" 
                     class="bg-white rounded-2xl border border-blue-50 p-6 shadow-md shadow-blue-900/5 hover:shadow-xl transition-all duration-300 cursor-pointer flex flex-col group relative overflow-hidden" 
                     @click="open = !open" 
                     :class="open ? 'ring-2 ring-amber-400 border-transparent shadow-amber-400/20' : ''">
                    
                    <!-- Decorative Batik Accent -->
                    <div class="absolute top-0 right-0 w-16 h-16 bg-[url('/images/motif-batik-sumbar.png')] bg-contain opacity-5 transform rotate-180 translate-x-4 -translate-y-4 group-hover:opacity-10 transition-opacity"></div>

                    <div class="flex items-center gap-4 mb-4 relative z-10">
                        <div class="w-10 h-10 rounded-full flex items-center justify-center font-black text-lg flex-shrink-0 transition-colors"
                             :class="open ? 'bg-amber-400 text-[#0F2A4A]' : 'bg-blue-50 text-blue-800 group-hover:bg-[#0F2A4A] group-hover:text-white'">
                            {{ $item[0] }}
                        </div>
                        <h4 class="font-bold text-gray-900 text-lg group-hover:text-[#0F2A4A] transition-colors line-clamp-1">{{ $item[1] }}</h4>
                    </div>
                    
                    <p class="text-sm text-gray-600 mb-4 flex-1 line-clamp-3 relative z-10">{{ $item[2] }}</p>
                    
                    <div class="text-amber-600 text-xs font-bold uppercase tracking-wider flex items-center mt-auto relative z-10">
                        <span x-text="open ? 'Tutup Detail' : 'Baca Detail'"></span>
                        <svg class="w-4 h-4 ml-1 transform transition-transform" :class="open ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    </div>
                    
                    <!-- Expanded Detail -->
                    <div x-show="open" x-collapse x-cloak class="relative z-10">
                        <div class="mt-4 pt-4 border-t border-gray-100">
                            <p class="text-sm text-gray-700 leading-relaxed font-medium">
                                {{ $item[3] }}
                            </p>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>

        <!-- Summary Section -->
        <div class="bg-[#0F2A4A] rounded-3xl p-8 md:p-10 text-white relative overflow-hidden shadow-2xl">
            <!-- Background Elements -->
            <div class="absolute top-0 right-0 w-1/2 h-full bg-[url('/images/motif-batik-sumbar.png')] bg-repeat-y bg-contain opacity-10 pointer-events-none transform -scale-x-100"></div>
            <div class="absolute -bottom-20 -left-20 w-64 h-64 bg-amber-400/20 rounded-full blur-3xl pointer-events-none"></div>

            <div class="relative z-10">
                <h3 class="text-2xl md:text-3xl font-black text-amber-400 mb-6 flex items-center gap-3">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                    Integrasi Tugas dan Fungsi
                </h3>
                
                <div class="grid md:grid-cols-2 gap-8 text-blue-50 text-lg leading-relaxed">
                    <div>
                        <p class="mb-4">
                            Kesembilan fungsi tersebut saling terintegrasi dan mendukung pencapaian tugas pokok Balai Bahasa Provinsi Sumatera Barat. Mulai dari <strong class="text-white">pemetaan dan inventarisasi</strong> sebagai langkah awal, dilanjutkan dengan <strong class="text-white">konservasi dan revitalisasi</strong>, hingga <strong class="text-white">pemasyarakatan dan fasilitasi</strong> kepada masyarakat.
                        </p>
                    </div>
                    <div>
                        <p>
                            Semua aktivitas ini didukung oleh <strong class="text-white border-b border-amber-400/50">layanan publik yang prima</strong>, <strong class="text-white border-b border-amber-400/50">kemitraan strategis</strong>, <strong class="text-white border-b border-amber-400/50">monitoring dan evaluasi</strong> yang berkelanjutan, serta <strong class="text-white border-b border-amber-400/50">administrasi yang tertib</strong> untuk memastikan efektivitas dan efisiensi pelaksanaan program.
                        </p>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>
@endsection

