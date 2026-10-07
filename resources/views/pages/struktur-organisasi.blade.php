@extends('main.app')

@section('content')
<section id="struktur-organisasi" class="mb-12">

    <!-- Hero Banner with Minangkabau Motif -->
    <div class="w-screen relative left-1/2 -translate-x-1/2 bg-[#0F2A4A] overflow-hidden pt-20 pb-40 px-8 mt-[-2rem]">
        <!-- SVG Pattern Background (Songket / Kaluak Paku / Pucuak Rabuang stylized) -->
        <div class="absolute inset-0 opacity-10 pointer-events-none">
            <svg width="100%" height="100%" xmlns="http://www.w3.org/2000/svg">
                <defs>
                    <pattern id="minang-pattern-org" x="0" y="0" width="60" height="60" patternUnits="userSpaceOnUse">
                        <path d="M30 0 L60 30 L30 60 L0 30 Z" fill="none" stroke="#FBBF24" stroke-width="1.5"/>
                        <path d="M30 10 L50 30 L30 50 L10 30 Z" fill="none" stroke="#FBBF24" stroke-width="1"/>
                        <path d="M30 20 L40 30 L30 40 L20 30 Z" fill="#FBBF24"/>
                        <circle cx="30" cy="0" r="3" fill="#FBBF24"/>
                        <circle cx="30" cy="60" r="3" fill="#FBBF24"/>
                        <circle cx="0" cy="30" r="3" fill="#FBBF24"/>
                        <circle cx="60" cy="30" r="3" fill="#FBBF24"/>
                    </pattern>
                </defs>
                <rect width="100%" height="100%" fill="url(#minang-pattern-org)" />
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
                Bagan Kepengurusan
            </span>
            <h2 class="text-4xl md:text-5xl font-black text-white mb-6 tracking-tight drop-shadow-lg">
                Struktur Organisasi
            </h2>
            <p class="text-blue-100 text-lg font-medium opacity-90">Susunan hierarki dan tata kerja Balai Bahasa Provinsi Sumatera Barat dalam mewujudkan visi kebudayaan.</p>
        </div>
    </div>

    <!-- Main Content Area (Organization Chart) -->
    <div class="relative px-4 pb-20 md:px-8 max-w-7xl mx-auto -mt-24 z-20">
        
        <div class="bg-white rounded-3xl p-8 md:p-16 shadow-2xl shadow-[#0F2A4A]/10 border border-gray-100 mb-16 relative overflow-hidden">
            <!-- Decorative Batik Accent -->
            <div class="absolute top-0 right-0 w-full h-32 bg-[url('/images/motif-batik-sumbar.png')] bg-repeat-x bg-contain opacity-[0.02] pointer-events-none"></div>
            
            <div class="relative z-10 flex flex-col items-center">
                
                <!-- LEVEL 1: Kepala Balai -->
                <div class="w-full max-w-md bg-gradient-to-b from-[#0F2A4A] to-blue-900 text-white rounded-2xl p-6 text-center shadow-xl border-t-4 border-amber-400 relative z-20 group hover:-translate-y-1 transition-transform">
                    <span class="inline-block bg-white/20 px-3 py-1 rounded-full text-xs font-bold tracking-widest uppercase mb-4 text-amber-300">Pimpinan Tertinggi</span>
                    <h3 class="text-2xl font-black mb-2 group-hover:text-amber-400 transition-colors">Kepala Balai Bahasa</h3>
                    <div class="h-px w-24 bg-white/30 mx-auto my-3"></div>
                    <p class="text-blue-100 font-medium">Rahmat, S.Ag., M.Hum.</p>
                </div>

                <!-- Vertical Line Down -->
                <div class="w-1 h-12 bg-[#0F2A4A]/20"></div>

                <!-- HORIZONTAL BRANCHING LINE -->
                <div class="w-full max-w-4xl border-t-4 border-[#0F2A4A]/20 relative">
                    <!-- Lines going down -->
                    <div class="absolute left-0 top-0 w-1 h-12 bg-[#0F2A4A]/20"></div>
                    <div class="absolute left-1/2 top-0 w-1 h-12 bg-[#0F2A4A]/20 -translate-x-1/2"></div>
                    <div class="absolute right-0 top-0 w-1 h-12 bg-[#0F2A4A]/20"></div>
                </div>

                <!-- LEVEL 2: Subbagian & Kepakaran -->
                <div class="w-full max-w-5xl flex flex-col lg:flex-row justify-between items-start mt-12 gap-8 lg:gap-4 relative z-10">
                    
                    <!-- Kiri: Subbagian Tata Usaha -->
                    <div class="w-full lg:w-1/3">
                        <div class="bg-gradient-to-br from-amber-50 to-orange-50 border border-amber-200 rounded-2xl p-6 text-center shadow-md hover:shadow-lg transition-all hover:border-amber-400 group">
                            <span class="inline-block bg-amber-200/50 text-amber-800 px-3 py-1 rounded-full text-xs font-bold tracking-widest uppercase mb-4">Administrasi</span>
                            <h4 class="text-xl font-bold text-[#0F2A4A] mb-2 group-hover:text-amber-600 transition-colors">Subbagian Tata Usaha</h4>
                            <p class="text-gray-600 text-sm leading-relaxed">Menangani urusan kepegawaian, keuangan, persuratan, dan kerumahtanggaan balai.</p>
                        </div>
                    </div>

                    <!-- Tengah: KKLP Pembinaan & Pelindungan -->
                    <div class="w-full lg:w-1/3">
                        <div class="bg-white border-2 border-[#0F2A4A]/10 rounded-2xl p-6 text-center shadow-md hover:shadow-xl hover:border-[#0F2A4A]/30 transition-all group h-full">
                            <div class="w-12 h-12 bg-blue-50 text-[#0F2A4A] rounded-full flex items-center justify-center mx-auto mb-4 group-hover:bg-[#0F2A4A] group-hover:text-white transition-colors">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                            </div>
                            <h4 class="text-lg font-bold text-[#0F2A4A] mb-3">KKLP Pembinaan & Literasi</h4>
                            <ul class="text-gray-600 text-sm text-left space-y-2 inline-block">
                                <li class="flex items-center gap-2"><div class="w-1.5 h-1.5 bg-amber-400 rounded-full"></div> Literasi Masyarakat</li>
                                <li class="flex items-center gap-2"><div class="w-1.5 h-1.5 bg-amber-400 rounded-full"></div> Pembinaan Bahasa</li>
                                <li class="flex items-center gap-2"><div class="w-1.5 h-1.5 bg-amber-400 rounded-full"></div> Bahasa dan Hukum</li>
                            </ul>
                        </div>
                    </div>

                    <!-- Kanan: KKLP Pengembangan -->
                    <div class="w-full lg:w-1/3">
                        <div class="bg-white border-2 border-[#0F2A4A]/10 rounded-2xl p-6 text-center shadow-md hover:shadow-xl hover:border-[#0F2A4A]/30 transition-all group h-full">
                            <div class="w-12 h-12 bg-blue-50 text-[#0F2A4A] rounded-full flex items-center justify-center mx-auto mb-4 group-hover:bg-[#0F2A4A] group-hover:text-white transition-colors">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            </div>
                            <h4 class="text-lg font-bold text-[#0F2A4A] mb-3">KKLP Pengembangan & BIPA</h4>
                            <ul class="text-gray-600 text-sm text-left space-y-2 inline-block">
                                <li class="flex items-center gap-2"><div class="w-1.5 h-1.5 bg-amber-400 rounded-full"></div> Penerjemahan</li>
                                <li class="flex items-center gap-2"><div class="w-1.5 h-1.5 bg-amber-400 rounded-full"></div> Kamus dan Istilah</li>
                                <li class="flex items-center gap-2"><div class="w-1.5 h-1.5 bg-amber-400 rounded-full"></div> BIPA (Penutur Asing)</li>
                            </ul>
                        </div>
                    </div>

                </div>

            </div>
        </div>

    </div>
</section>
@endsection

