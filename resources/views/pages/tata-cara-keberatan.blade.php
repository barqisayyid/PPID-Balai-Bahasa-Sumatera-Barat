@extends('main.app')

@section('content')
<section class="mb-12">

    <!-- Hero Banner with Minangkabau Motif -->
    <div class="w-screen relative left-1/2 -translate-x-1/2 bg-[#0F2A4A] overflow-hidden pt-20 pb-40 px-8 mt-[-2rem]">
        <!-- SVG Pattern Background (Songket / Kaluak Paku / Pucuak Rabuang stylized) -->
        <div class="absolute inset-0 opacity-10 pointer-events-none">
            <svg width="100%" height="100%" xmlns="http://www.w3.org/2000/svg">
                <defs>
                    <pattern id="minang-pattern-tatacara" x="0" y="0" width="60" height="60" patternUnits="userSpaceOnUse">
                        <path d="M30 0 L60 30 L30 60 L0 30 Z" fill="none" stroke="#FBBF24" stroke-width="1.5"/>
                        <path d="M30 10 L50 30 L30 50 L10 30 Z" fill="none" stroke="#FBBF24" stroke-width="1"/>
                        <path d="M30 20 L40 30 L30 40 L20 30 Z" fill="#FBBF24"/>
                        <circle cx="30" cy="0" r="3" fill="#FBBF24"/>
                        <circle cx="30" cy="60" r="3" fill="#FBBF24"/>
                        <circle cx="0" cy="30" r="3" fill="#FBBF24"/>
                        <circle cx="60" cy="30" r="3" fill="#FBBF24"/>
                    </pattern>
                </defs>
                <rect width="100%" height="100%" fill="url(#minang-pattern-tatacara)" />
            </svg>
        </div>

        <div class="absolute -top-40 -right-40 w-96 h-96 bg-red-500 rounded-full blur-[100px] opacity-20"></div>
        <div class="absolute -bottom-40 -left-40 w-96 h-96 bg-amber-500 rounded-full blur-[100px] opacity-20"></div>

        <div class="relative z-20 max-w-5xl mx-auto text-center">
            <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-white/10 border border-white/20 backdrop-blur-md mb-6 shadow-xl">
                <span class="w-2 h-2 rounded-full bg-amber-400 animate-pulse"></span>
                <span class="text-xs font-bold text-white tracking-widest uppercase">Panduan Layanan</span>
            </div>
            
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-black text-white mb-6 tracking-tight drop-shadow-2xl">
                Tata Cara <span class="text-transparent bg-clip-text bg-gradient-to-r from-amber-300 to-yellow-500">Pengajuan Keberatan</span>
            </h1>
            <p class="text-blue-100 text-lg max-w-2xl mx-auto leading-relaxed font-medium">
                Prosedur standar pelayanan pengajuan keberatan informasi publik di lingkungan Balai Bahasa Provinsi Sumatera Barat.
            </p>
        </div>

        <!-- Custom Bottom Curve -->
        <div class="absolute bottom-0 left-0 w-full overflow-hidden leading-none rotate-180">
            <svg class="relative block w-full h-[60px]" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
                <path d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z" fill="#F7F4ED"></path>
            </svg>
        </div>
    </div>

    <!-- Main Content Container -->
    <div class="relative z-30 max-w-4xl mx-auto px-4 -mt-24 mb-16">
        
        <div class="bg-white rounded-[2rem] shadow-2xl p-8 md:p-12 border border-gray-100">
            
            <div class="space-y-8 text-gray-700 leading-relaxed text-lg">
                
                <div class="flex items-start gap-5 group">
                    <div class="w-12 h-12 rounded-full bg-blue-50 text-blue-600 font-black flex items-center justify-center shrink-0 text-xl border border-blue-100 group-hover:bg-[#0F2A4A] group-hover:text-amber-400 group-hover:border-transparent transition-all shadow-sm">1</div>
                    <div>
                        <p class="mt-2.5">
                            Layanan informasi di Balai Bahasa Provinsi Sumatera Barat dikelola secara terpusat (satu pintu) oleh Pejabat Koordinator Pengelola Informasi dan Dokumentasi (PPID) yaitu <strong>Kepala Balai Bahasa Provinsi Sumatera Barat</strong>. Unit layanan informasi publik diselenggarakan oleh Unit Layanan Terpadu (ULT) di bawah pengelolaan Tim PPID dan Tim ULT.
                        </p>
                        <div class="mt-3 inline-flex items-center gap-2 text-sm text-gray-500 bg-gray-50 px-4 py-2 rounded-lg border border-gray-200">
                            <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                            Jalan Simpang Alai, Cupak Tangah, Pauh, Padang, 25162
                        </div>
                    </div>
                </div>

                <div class="flex items-start gap-5 group">
                    <div class="w-12 h-12 rounded-full bg-blue-50 text-blue-600 font-black flex items-center justify-center shrink-0 text-xl border border-blue-100 group-hover:bg-[#0F2A4A] group-hover:text-amber-400 group-hover:border-transparent transition-all shadow-sm">2</div>
                    <div>
                        <p class="mt-2.5">
                            Pemohon informasi yang telah menerima tanggapan tertulis dari PPID Balai Bahasa Provinsi Sumatera Barat dan dinilai tidak memenuhi permintaan informasi atau alasan lainnya, dapat mengajukan keberatan kepada Atasan PPID. Alasan tersebut meliputi:
                        </p>
                        
                        <div class="mt-4 bg-slate-50 border border-slate-100 rounded-2xl p-6 shadow-inner">
                            <ul class="space-y-3 list-none">
                                <li class="flex items-start gap-3">
                                    <div class="w-6 h-6 rounded-full bg-amber-100 text-amber-600 flex items-center justify-center shrink-0 mt-0.5 text-xs font-bold">a</div>
                                    <span>Informasi yang diminta termasuk dalam informasi yang dikecualikan.</span>
                                </li>
                                <li class="flex items-start gap-3">
                                    <div class="w-6 h-6 rounded-full bg-amber-100 text-amber-600 flex items-center justify-center shrink-0 mt-0.5 text-xs font-bold">b</div>
                                    <span>Tidak disediakannya informasi publik secara berkala.</span>
                                </li>
                                <li class="flex items-start gap-3">
                                    <div class="w-6 h-6 rounded-full bg-amber-100 text-amber-600 flex items-center justify-center shrink-0 mt-0.5 text-xs font-bold">c</div>
                                    <span>Tidak ditanggapinya permohonan informasi publik.</span>
                                </li>
                                <li class="flex items-start gap-3">
                                    <div class="w-6 h-6 rounded-full bg-amber-100 text-amber-600 flex items-center justify-center shrink-0 mt-0.5 text-xs font-bold">d</div>
                                    <span>Permohonan informasi publik tidak sebagaimana yang diminta.</span>
                                </li>
                                <li class="flex items-start gap-3">
                                    <div class="w-6 h-6 rounded-full bg-amber-100 text-amber-600 flex items-center justify-center shrink-0 mt-0.5 text-xs font-bold">e</div>
                                    <span>Tidak dipenuhinya permohonan informasi publik.</span>
                                </li>
                                <li class="flex items-start gap-3">
                                    <div class="w-6 h-6 rounded-full bg-amber-100 text-amber-600 flex items-center justify-center shrink-0 mt-0.5 text-xs font-bold">f</div>
                                    <span>Pengenaan biaya yang tidak wajar.</span>
                                </li>
                                <li class="flex items-start gap-3">
                                    <div class="w-6 h-6 rounded-full bg-amber-100 text-amber-600 flex items-center justify-center shrink-0 mt-0.5 text-xs font-bold">g</div>
                                    <span>Penyampaian informasi publik melebihi jangka waktu yang diatur dalam Undang-Undang.</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="flex items-start gap-5 group">
                    <div class="w-12 h-12 rounded-full bg-blue-50 text-blue-600 font-black flex items-center justify-center shrink-0 text-xl border border-blue-100 group-hover:bg-[#0F2A4A] group-hover:text-amber-400 group-hover:border-transparent transition-all shadow-sm">3</div>
                    <div>
                        <p class="mt-2.5">
                            Jangka waktu pengajuan keberatan informasi selambat-lambatnya <strong class="text-[#0F2A4A]">30 (tiga puluh) hari kerja</strong> sejak diterimanya tanggapan tertulis dari PPID.
                        </p>
                    </div>
                </div>

                <div class="flex items-start gap-5 group">
                    <div class="w-12 h-12 rounded-full bg-blue-50 text-blue-600 font-black flex items-center justify-center shrink-0 text-xl border border-blue-100 group-hover:bg-[#0F2A4A] group-hover:text-amber-400 group-hover:border-transparent transition-all shadow-sm">4</div>
                    <div>
                        <p class="mt-2.5">
                            Dalam waktu maksimal <strong class="text-[#0F2A4A]">30 hari kerja</strong> sejak diterimanya pengajuan keberatan yang telah teregister, Atasan PPID akan memberikan tanggapan tertulis atas pengajuan tersebut.
                        </p>
                    </div>
                </div>

                <div class="flex items-start gap-5 group">
                    <div class="w-12 h-12 rounded-full bg-blue-50 text-blue-600 font-black flex items-center justify-center shrink-0 text-xl border border-blue-100 group-hover:bg-[#0F2A4A] group-hover:text-amber-400 group-hover:border-transparent transition-all shadow-sm">5</div>
                    <div>
                        <p class="mt-2.5">
                            Atasan PPID dalam hal ini adalah <strong class="text-[#0F2A4A]">Kepala Balai Bahasa Provinsi Sumatera Barat</strong>.
                        </p>
                    </div>
                </div>

                <div class="flex items-start gap-5 group">
                    <div class="w-12 h-12 rounded-full bg-blue-50 text-blue-600 font-black flex items-center justify-center shrink-0 text-xl border border-blue-100 group-hover:bg-[#0F2A4A] group-hover:text-amber-400 group-hover:border-transparent transition-all shadow-sm">6</div>
                    <div class="w-full">
                        <p class="mt-2.5 mb-4">
                            Jadwal layanan pengajuan keberatan informasi:
                        </p>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div class="bg-blue-50/50 border border-blue-100 rounded-xl p-4 flex items-center gap-4">
                                <div class="w-10 h-10 rounded-full bg-blue-100 text-blue-600 flex items-center justify-center shrink-0">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                </div>
                                <div>
                                    <h4 class="font-bold text-[#0F2A4A]">Senin -- Kamis</h4>
                                    <p class="text-sm text-gray-600 mt-1">07.30 - 12.00 WIB<br>13.30 - 16.00 WIB</p>
                                </div>
                            </div>
                            <div class="bg-amber-50/50 border border-amber-100 rounded-xl p-4 flex items-center gap-4">
                                <div class="w-10 h-10 rounded-full bg-amber-100 text-amber-600 flex items-center justify-center shrink-0">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                </div>
                                <div>
                                    <h4 class="font-bold text-[#0F2A4A]">Jumat</h4>
                                    <p class="text-sm text-gray-600 mt-1">07.30 - 11.30 WIB<br>13.30 - 16.30 WIB</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            
            <div class="mt-12 pt-8 border-t border-gray-100 flex justify-center">
                <a href="{{ url('/form-keberatan') }}" class="inline-flex items-center gap-2 bg-gradient-to-r from-[#0F2A4A] to-blue-900 text-white px-8 py-4 rounded-full font-bold text-lg tracking-wide shadow-xl shadow-[#0F2A4A]/20 hover:shadow-2xl hover:-translate-y-1 transition-all border border-[#0F2A4A]/50 hover:border-amber-400">
                    Mulai Isi Formulir Keberatan
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                </a>
            </div>
            
        </div>
    </div>
</section>
@endsection
