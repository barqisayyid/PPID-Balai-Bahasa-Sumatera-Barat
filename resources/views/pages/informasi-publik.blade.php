@extends('main.app')

@section('content')
<section id="informasi-publik" class="mb-12">
    <!-- Hero Banner with Minangkabau Motif -->
    <div class="w-screen relative left-1/2 -translate-x-1/2 bg-[#0F2A4A] overflow-hidden pt-20 pb-40 px-8 mt-[-2rem]">
        <div class="absolute inset-0 opacity-10 pointer-events-none">
            <svg width="100%" height="100%" xmlns="http://www.w3.org/2000/svg">
                <defs>
                    <pattern id="minang-pattern-form" x="0" y="0" width="60" height="60" patternUnits="userSpaceOnUse">
                        <path d="M30 0 L60 30 L30 60 L0 30 Z" fill="none" stroke="#FBBF24" stroke-width="1.5"/>
                        <path d="M30 10 L50 30 L30 50 L10 30 Z" fill="none" stroke="#FBBF24" stroke-width="1"/>
                        <path d="M30 20 L40 30 L30 40 L20 30 Z" fill="#FBBF24"/>
                        <circle cx="30" cy="0" r="3" fill="#FBBF24"/>
                        <circle cx="30" cy="60" r="3" fill="#FBBF24"/>
                        <circle cx="0" cy="30" r="3" fill="#FBBF24"/>
                        <circle cx="60" cy="30" r="3" fill="#FBBF24"/>
                    </pattern>
                </defs>
                <rect width="100%" height="100%" fill="url(#minang-pattern-form)" />
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
                Keterbukaan Informasi
            </span>
            <h2 class="text-4xl md:text-5xl font-black text-white mb-6 tracking-tight drop-shadow-lg">
                Informasi Publik
            </h2>
            <p class="text-blue-100 text-lg font-medium opacity-90">
                Balai Bahasa Provinsi Sumatera Barat
            </p>
        </div>
    </div>

    <!-- Main Content Area -->
    <div class="relative px-0 pb-20 -mt-24 z-20">
        
        <div class="bg-white rounded-3xl p-6 md:p-12 shadow-2xl shadow-[#0F2A4A]/10 border border-gray-100 relative overflow-hidden">
            <div class="absolute top-0 right-0 w-full h-32 bg-[url('/images/motif-batik-sumbar.png')] bg-repeat-x bg-contain opacity-[0.02] pointer-events-none z-0"></div>
            
            <div class="relative z-10">
                
                <!-- Introduction -->
                <div class="mb-12 border-l-4 border-amber-400 pl-6 py-2">
                    <h3 class="text-2xl font-bold text-[#0F2A4A] mb-4">Tentang Informasi Publik</h3>
                    <p class="text-gray-700 leading-relaxed text-lg">
                        Informasi publik di lingkungan Balai Bahasa Provinsi Sumatera Barat dikelola dan disediakan sesuai dengan ketentuan <strong>Undang-Undang Nomor 14 Tahun 2008 tentang Keterbukaan Informasi Publik</strong>, <strong>Peraturan Komisi Informasi Nomor 1 Tahun 2021 tentang Standar Layanan Informasi Publik</strong>, serta <strong>Permendikbudristek Nomor 69 Tahun 2024</strong> tentang Pengelolaan dan Pelayanan Informasi Publik.
                    </p>
                </div>

                <!-- Kategori Informasi -->
                <div class="mb-16">
                    <h3 class="text-2xl font-bold text-[#0F2A4A] mb-8 text-center">Kategori Informasi Publik</h3>
                    
                    <div class="grid md:grid-cols-3 gap-6">
                        <!-- Informasi Berkala -->
                        <div x-data="{ open: false }" class="bg-gray-50 border border-gray-200 rounded-2xl p-6 hover:shadow-md transition-shadow cursor-pointer" @click="open = !open">
                            <div class="flex items-center mb-4">
                                <div class="w-12 h-12 bg-blue-100 text-blue-700 rounded-xl flex items-center justify-center mr-4">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </div>
                                <h4 class="text-lg font-bold text-[#0F2A4A]">Informasi Berkala</h4>
                            </div>
                            <p class="text-gray-600 text-sm mb-4">Informasi yang wajib diumumkan secara rutin dan berkala kepada masyarakat.</p>
                            
                            <div class="text-blue-700 text-sm font-semibold flex items-center mb-2">
                                <span>Detail Informasi</span>
                                <svg class="w-4 h-4 ml-1 transition-transform" :class="{'rotate-180': open}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                            </div>

                            <div x-show="open" x-collapse x-cloak class="pt-4 border-t border-gray-200 mt-2">
                                <ul class="text-sm text-gray-700 space-y-2 mb-4">
                                    <li>&bull; Profil lembaga dan struktur organisasi</li>
                                    <li>&bull; Program kerja dan kegiatan tahunan</li>
                                    <li>&bull; Laporan kinerja dan keuangan</li>
                                    <li>&bull; Agenda kegiatan bulanan</li>
                                </ul>
                                <a href="/berkala" class="inline-flex items-center text-sm font-bold text-blue-700 hover:text-blue-900 underline">
                                    Lihat Daftar Informasi &rarr;
                                </a>
                            </div>
                        </div>

                        <!-- Informasi Serta Merta -->
                        <div x-data="{ open: false }" class="bg-gray-50 border border-gray-200 rounded-2xl p-6 hover:shadow-md transition-shadow cursor-pointer" @click="open = !open">
                            <div class="flex items-center mb-4">
                                <div class="w-12 h-12 bg-amber-100 text-amber-700 rounded-xl flex items-center justify-center mr-4">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                                    </svg>
                                </div>
                                <h4 class="text-lg font-bold text-[#0F2A4A]">Informasi Serta Merta</h4>
                            </div>
                            <p class="text-gray-600 text-sm mb-4">Informasi yang dapat mengancam hajat hidup orang banyak dan ketertiban umum.</p>
                            
                            <div class="text-amber-700 text-sm font-semibold flex items-center mb-2">
                                <span>Detail Informasi</span>
                                <svg class="w-4 h-4 ml-1 transition-transform" :class="{'rotate-180': open}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                            </div>

                            <div x-show="open" x-collapse x-cloak class="pt-4 border-t border-gray-200 mt-2">
                                <ul class="text-sm text-gray-700 space-y-2">
                                    <li>&bull; Pengumuman darurat atau peringatan</li>
                                    <li>&bull; Kebijakan berdampak luas</li>
                                    <li>&bull; Informasi bencana / keadaan darurat</li>
                                </ul>
                            </div>
                        </div>

                        <!-- Informasi Dikecualikan -->
                        <div x-data="{ open: false }" class="bg-gray-50 border border-gray-200 rounded-2xl p-6 hover:shadow-md transition-shadow cursor-pointer" @click="open = !open">
                            <div class="flex items-center mb-4">
                                <div class="w-12 h-12 bg-red-100 text-red-700 rounded-xl flex items-center justify-center mr-4">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                                    </svg>
                                </div>
                                <h4 class="text-lg font-bold text-[#0F2A4A]">Informasi Dikecualikan</h4>
                            </div>
                            <p class="text-gray-600 text-sm mb-4">Informasi yang secara hukum tidak dapat dibuka atau diakses untuk publik.</p>
                            
                            <div class="text-red-700 text-sm font-semibold flex items-center mb-2">
                                <span>Detail Informasi</span>
                                <svg class="w-4 h-4 ml-1 transition-transform" :class="{'rotate-180': open}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                            </div>

                            <div x-show="open" x-collapse x-cloak class="pt-4 border-t border-gray-200 mt-2">
                                <ul class="text-sm text-gray-700 space-y-2 mb-3">
                                    <li>&bull; Rahasia negara dan keamanan</li>
                                    <li>&bull; Perlindungan data pribadi</li>
                                    <li>&bull; Proses hukum yang sedang berjalan</li>
                                    <li>&bull; Hak kekayaan intelektual</li>
                                </ul>
                                <p class="text-xs text-gray-500 italic">Pengecualian berdasarkan UU No. 14 Tahun 2008 Pasal 17.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <hr class="border-gray-100 my-12">

                <!-- Akses Cepat & Layanan (Professional UI) -->
                <div class="grid md:grid-cols-2 gap-10">
                    <!-- Navigasi Informasi -->
                    <div>
                        <h3 class="text-xl font-bold text-[#0F2A4A] mb-5">Dokumen & Laporan</h3>
                        <div class="flex flex-col space-y-3">
                            <a href="/berkala" class="flex items-center justify-between p-4 bg-white border border-gray-200 rounded-xl hover:border-blue-500 hover:shadow-sm transition-all group">
                                <div>
                                    <h4 class="font-bold text-gray-800 group-hover:text-blue-700">Informasi Berkala</h4>
                                    <p class="text-sm text-gray-500">Dokumen, panduan, dan regulasi</p>
                                </div>
                                <svg class="w-5 h-5 text-gray-400 group-hover:text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                            </a>
                            <a href="/program-kegiatan" class="flex items-center justify-between p-4 bg-white border border-gray-200 rounded-xl hover:border-blue-500 hover:shadow-sm transition-all group">
                                <div>
                                    <h4 class="font-bold text-gray-800 group-hover:text-blue-700">Program & Kegiatan</h4>
                                    <p class="text-sm text-gray-500">Agenda dan ringkasan kegiatan</p>
                                </div>
                                <svg class="w-5 h-5 text-gray-400 group-hover:text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                            </a>
                            <a href="/keuangan" class="flex items-center justify-between p-4 bg-white border border-gray-200 rounded-xl hover:border-blue-500 hover:shadow-sm transition-all group">
                                <div>
                                    <h4 class="font-bold text-gray-800 group-hover:text-blue-700">Informasi Keuangan</h4>
                                    <p class="text-sm text-gray-500">Laporan anggaran dan realisasi</p>
                                </div>
                                <svg class="w-5 h-5 text-gray-400 group-hover:text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                            </a>
                        </div>
                    </div>

                    <!-- Layanan Elektronik -->
                    <div>
                        <h3 class="text-xl font-bold text-[#0F2A4A] mb-5">Layanan Elektronik PPID</h3>
                        <div class="flex flex-col space-y-3">
                            <a href="/form-permohonan" class="flex items-center justify-between p-4 bg-[#0F2A4A] text-white rounded-xl hover:bg-blue-900 shadow-md transition-all group">
                                <div>
                                    <h4 class="font-bold">Formulir Permohonan Informasi</h4>
                                    <p class="text-sm text-blue-200">Ajukan permintaan data publik secara online</p>
                                </div>
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                            </a>
                            
                            <a href="/form-keberatan" class="flex items-center justify-between p-4 bg-white border border-gray-200 rounded-xl hover:border-[#0F2A4A] hover:shadow-sm transition-all group">
                                <div>
                                    <h4 class="font-bold text-gray-800">Formulir Keberatan</h4>
                                    <p class="text-sm text-gray-500">Tanggapan atas permohonan yang ditolak</p>
                                </div>
                                <svg class="w-5 h-5 text-gray-400 group-hover:text-[#0F2A4A]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                            </a>

                            <a href="/form-pengaduan" class="flex items-center justify-between p-4 bg-white border border-gray-200 rounded-xl hover:border-[#0F2A4A] hover:shadow-sm transition-all group">
                                <div>
                                    <h4 class="font-bold text-gray-800">Layanan Pengaduan</h4>
                                    <p class="text-sm text-gray-500">Laporkan penyalahgunaan wewenang</p>
                                </div>
                                <svg class="w-5 h-5 text-gray-400 group-hover:text-[#0F2A4A]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
@endsection
