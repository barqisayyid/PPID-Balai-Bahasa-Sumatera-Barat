@extends('main.app')

@section('content')
<section id="struktur-ppid" class="mb-12">

    <!-- Hero Banner with Minangkabau Motif -->
    <div class="w-screen relative left-1/2 -translate-x-1/2 bg-[#0F2A4A] overflow-hidden pt-20 pb-40 px-8 mt-[-2rem]">
        <!-- SVG Pattern Background -->
        <div class="absolute inset-0 opacity-10 pointer-events-none">
            <svg width="100%" height="100%" xmlns="http://www.w3.org/2000/svg">
                <defs>
                    <pattern id="minang-pattern-ppid" x="0" y="0" width="60" height="60" patternUnits="userSpaceOnUse">
                        <path d="M30 0 L60 30 L30 60 L0 30 Z" fill="none" stroke="#FBBF24" stroke-width="1.5"/>
                        <path d="M30 10 L50 30 L30 50 L10 30 Z" fill="none" stroke="#FBBF24" stroke-width="1"/>
                        <path d="M30 20 L40 30 L30 40 L20 30 Z" fill="#FBBF24"/>
                        <circle cx="30" cy="0" r="3" fill="#FBBF24"/>
                        <circle cx="30" cy="60" r="3" fill="#FBBF24"/>
                        <circle cx="0" cy="30" r="3" fill="#FBBF24"/>
                        <circle cx="60" cy="30" r="3" fill="#FBBF24"/>
                    </pattern>
                </defs>
                <rect width="100%" height="100%" fill="url(#minang-pattern-ppid)" />
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
                Bagan Pengelola
            </span>
            <h2 class="text-4xl md:text-5xl font-black text-white mb-6 tracking-tight drop-shadow-lg">
                Struktur PPID
            </h2>
            <p class="text-blue-100 text-lg font-medium opacity-90">Susunan Pejabat Pengelola Informasi dan Dokumentasi di lingkungan Balai Bahasa Provinsi Sumatera Barat.</p>
        </div>
    </div>

    <!-- Main Content Area (Organization Chart) -->
    <div class="relative px-4 pb-20 md:px-8 max-w-5xl mx-auto -mt-24 z-20">
        
        <div class="bg-white rounded-3xl p-8 md:p-16 shadow-2xl shadow-[#0F2A4A]/10 border border-gray-100 mb-16 relative overflow-hidden">
            <!-- Decorative Batik Accent -->
            <div class="absolute top-0 right-0 w-full h-32 bg-[url('/images/motif-batik-sumbar.png')] bg-repeat-x bg-contain opacity-[0.02] pointer-events-none"></div>
            
            <div class="relative z-10 flex flex-col items-center">
                
                <!-- LEVEL 1: Penanggung Jawab -->
                <div class="w-full max-w-md bg-gradient-to-b from-[#0F2A4A] to-blue-900 text-white rounded-2xl p-6 text-center shadow-xl border-t-4 border-amber-400 relative z-20 group hover:-translate-y-1 transition-transform">
                    <span class="inline-block bg-white/20 px-3 py-1 rounded-full text-xs font-bold tracking-widest uppercase mb-4 text-amber-300">Penanggung Jawab PPID</span>
                    <h3 class="text-xl font-bold mb-2 group-hover:text-amber-400 transition-colors">Kepala Balai Bahasa Provinsi Sumatera Barat</h3>
                    <div class="h-px w-24 bg-white/30 mx-auto my-3"></div>
                    <p class="text-blue-100 font-medium">Rahmat, S.Ag., M.Hum.</p>
                </div>

                <!-- Vertical Line Down -->
                <div class="w-1 h-8 bg-[#0F2A4A]/20"></div>

                <!-- LEVEL 2: Ketua PPID -->
                <div class="w-full max-w-md bg-gradient-to-br from-amber-50 to-orange-50 border border-amber-200 rounded-2xl p-6 text-center shadow-md hover:shadow-lg transition-all hover:border-amber-400 group relative z-20">
                    <span class="inline-block bg-amber-200/50 text-amber-800 px-3 py-1 rounded-full text-xs font-bold tracking-widest uppercase mb-4">Ketua PPID</span>
                    <h3 class="text-lg font-bold text-[#0F2A4A] mb-2 group-hover:text-amber-600 transition-colors">Kasubbag Umum</h3>
                    <div class="h-px w-24 bg-amber-200 mx-auto my-2"></div>
                    <p class="text-gray-700 font-medium">Endry Satya Ramadhan, S.E.</p>
                </div>

                <!-- Vertical Line Down -->
                <div class="w-1 h-8 bg-[#0F2A4A]/20"></div>

                <!-- LEVEL 3: Wakil Ketua PPID -->
                <div class="w-full max-w-md bg-white border-2 border-[#0F2A4A]/10 rounded-2xl p-6 text-center shadow-md hover:shadow-lg transition-all hover:border-[#0F2A4A]/30 group relative z-20">
                    <span class="inline-block bg-blue-50 text-blue-800 px-3 py-1 rounded-full text-xs font-bold tracking-widest uppercase mb-4">Wakil Ketua PPID</span>
                    <p class="text-gray-800 font-bold text-lg">Diana, M.Pd.</p>
                </div>

                <!-- Vertical Line Down -->
                <div class="w-1 h-12 bg-[#0F2A4A]/20"></div>

                <!-- HORIZONTAL BRANCHING LINE -->
                <div class="w-full max-w-3xl border-t-4 border-[#0F2A4A]/20 relative">
                    <!-- Lines going down -->
                    <div class="absolute left-0 top-0 w-1 h-8 bg-[#0F2A4A]/20"></div>
                    <div class="absolute left-1/2 top-0 w-1 h-8 bg-[#0F2A4A]/20 -translate-x-1/2"></div>
                    <div class="absolute right-0 top-0 w-1 h-8 bg-[#0F2A4A]/20"></div>
                </div>

                <!-- LEVEL 4: Anggota -->
                <div class="w-full max-w-4xl grid md:grid-cols-3 gap-6 mt-8 relative z-10">
                    
                    <!-- Anggota 1 -->
                    <div class="group bg-white border border-gray-100 rounded-2xl p-5 text-center shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all border-b-4 border-b-blue-400">
                        <div class="w-14 h-14 bg-blue-50 text-blue-600 rounded-full flex items-center justify-center mx-auto mb-4 font-black text-xl group-hover:bg-blue-600 group-hover:text-white transition-colors">
                            DO
                        </div>
                        <p class="font-bold text-[#0F2A4A] leading-tight mb-2">Dini Oktarina, S.Pd., M.A.</p>
                        <p class="text-xs text-gray-500 uppercase tracking-wider font-semibold">Widyabasa Ahli Muda</p>
                    </div>

                    <!-- Anggota 2 -->
                    <div class="group bg-white border border-gray-100 rounded-2xl p-5 text-center shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all border-b-4 border-b-amber-400">
                        <div class="w-14 h-14 bg-amber-50 text-amber-600 rounded-full flex items-center justify-center mx-auto mb-4 font-black text-xl group-hover:bg-amber-400 group-hover:text-white transition-colors">
                            AR
                        </div>
                        <p class="font-bold text-[#0F2A4A] leading-tight mb-2">Alvi Rianto Putra, S.E.</p>
                        <p class="text-xs text-gray-500 uppercase tracking-wider font-semibold">Pengolah Data & Informasi</p>
                    </div>

                    <!-- Anggota 3 -->
                    <div class="group bg-white border border-gray-100 rounded-2xl p-5 text-center shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all border-b-4 border-b-red-400">
                        <div class="w-14 h-14 bg-red-50 text-red-600 rounded-full flex items-center justify-center mx-auto mb-4 font-black text-xl group-hover:bg-red-500 group-hover:text-white transition-colors">
                            JS
                        </div>
                        <p class="font-bold text-[#0F2A4A] leading-tight mb-2">Joni Syahputra, S.S.</p>
                        <p class="text-xs text-gray-500 uppercase tracking-wider font-semibold">Widyabasa Ahli Pertama</p>
                    </div>

                </div>

            </div>
        </div>

    </div>
</section>
@endsection

