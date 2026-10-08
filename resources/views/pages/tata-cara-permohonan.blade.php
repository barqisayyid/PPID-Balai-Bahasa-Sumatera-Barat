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

        <div class="absolute -top-40 -right-40 w-96 h-96 bg-amber-500 rounded-full blur-[100px] opacity-30"></div>
        <div class="absolute -bottom-40 -left-40 w-96 h-96 bg-blue-500 rounded-full blur-[100px] opacity-30"></div>

        <div class="relative z-20 max-w-5xl mx-auto text-center">
            <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-white/10 border border-white/20 backdrop-blur-md mb-6 shadow-xl">
                <span class="w-2 h-2 rounded-full bg-amber-400 animate-pulse"></span>
                <span class="text-xs font-bold text-white tracking-widest uppercase">Panduan Layanan</span>
            </div>
            
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-black text-white mb-6 tracking-tight drop-shadow-2xl">
                Tata Cara <span class="text-transparent bg-clip-text bg-gradient-to-r from-amber-300 to-yellow-500">Permohonan Informasi</span>
            </h1>
            <p class="text-blue-100 text-lg max-w-2xl mx-auto leading-relaxed font-medium">
                Prosedur standar pelayanan permohonan informasi publik di lingkungan Balai Bahasa Provinsi Sumatera Barat.
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
                            Pemohon informasi menyampaikan permohonan informasi kepada PPID melalui surat, posel, telepon, atau datang langsung ke tempat layanan PPID Balai Bahasa Provinsi Sumatera Barat.
                        </p>
                    </div>
                </div>

                <div class="flex items-start gap-5 group">
                    <div class="w-12 h-12 rounded-full bg-blue-50 text-blue-600 font-black flex items-center justify-center shrink-0 text-xl border border-blue-100 group-hover:bg-[#0F2A4A] group-hover:text-amber-400 group-hover:border-transparent transition-all shadow-sm">2</div>
                    <div>
                        <p class="mt-2.5">
                            Pemohon informasi mengisi <strong class="text-[#0F2A4A]">Formulir Permohonan Informasi</strong> dan memberikan salinan identitas diri/organisasi.
                        </p>
                    </div>
                </div>

                <div class="flex items-start gap-5 group">
                    <div class="w-12 h-12 rounded-full bg-blue-50 text-blue-600 font-black flex items-center justify-center shrink-0 text-xl border border-blue-100 group-hover:bg-[#0F2A4A] group-hover:text-amber-400 group-hover:border-transparent transition-all shadow-sm">3</div>
                    <div>
                        <p class="mt-2.5">
                            Pemohon informasi menerima tanda bukti permohonan informasi dari petugas informasi apabila syarat permohonan informasi telah dilengkapi.
                        </p>
                    </div>
                </div>

                <div class="flex items-start gap-5 group">
                    <div class="w-12 h-12 rounded-full bg-blue-50 text-blue-600 font-black flex items-center justify-center shrink-0 text-xl border border-blue-100 group-hover:bg-[#0F2A4A] group-hover:text-amber-400 group-hover:border-transparent transition-all shadow-sm">4</div>
                    <div>
                        <p class="mt-2.5">
                            Dalam hal permintaan disampaikan secara langsung atau melalui surat elektronik, nomor pendaftaran diberikan saat penerimaan permintaan.
                        </p>
                    </div>
                </div>

                <div class="flex items-start gap-5 group">
                    <div class="w-12 h-12 rounded-full bg-blue-50 text-blue-600 font-black flex items-center justify-center shrink-0 text-xl border border-blue-100 group-hover:bg-[#0F2A4A] group-hover:text-amber-400 group-hover:border-transparent transition-all shadow-sm">5</div>
                    <div>
                        <p class="mt-2.5">
                            Dalam hal permintaan disampaikan melalui surat, pengiriman nomor pendaftaran dapat diberikan bersamaan dengan pengiriman informasi paling lambat <strong class="text-[#0F2A4A]">sepuluh (10) hari kerja</strong> sejak diterimanya permintaan dari individu atau Badan Publik yang bersangkutan wajib menyampaikan pemberitahuan tertulis yang berisikan:
                        </p>
                        
                        <div class="mt-4 bg-slate-50 border border-slate-100 rounded-2xl p-6 shadow-inner">
                            <ul class="space-y-3 list-none">
                                <li class="flex items-start gap-3">
                                    <svg class="w-6 h-6 text-amber-500 shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                    <span>Informasi yang diminta berada di bawah penguasaannya ataupun tidak.</span>
                                </li>
                                <li class="flex items-start gap-3">
                                    <svg class="w-6 h-6 text-amber-500 shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                    <span>Badan Publik wajib memberitahukan Badan Publik yang menguasai informasi yang diminta apabila informasi yang diminta tidak berada di bawah penguasaannya dan Badan Publik yang menerima permintaan mengetahui keberadaan informasi yang diminta.</span>
                                </li>
                                <li class="flex items-start gap-3">
                                    <svg class="w-6 h-6 text-amber-500 shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                    <span>Penerimaan atau penolakan permintaan dengan alasan informasi yang diminta merupakan informasi yang dikecualikan (dirahasiakan).</span>
                                </li>
                                <li class="flex items-start gap-3">
                                    <svg class="w-6 h-6 text-amber-500 shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                    <span>Dalam hal permintaan diterima seluruhnya atau sebagian dicantumkan materi informasi yang akan diberikan.</span>
                                </li>
                                <li class="flex items-start gap-3">
                                    <svg class="w-6 h-6 text-amber-500 shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                    <span>Dalam hal suatu dokumen mengandung materi yang dikecualikan maka informasi yang dikecualikan tersebut dapat dihitamkan dengan disertai alasan dan materinya.</span>
                                </li>
                                <li class="flex items-start gap-3">
                                    <svg class="w-6 h-6 text-amber-500 shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                    <span>Alat penyampai dan format informasi yang akan diberikan.</span>
                                </li>
                                <li class="flex items-start gap-3">
                                    <svg class="w-6 h-6 text-amber-500 shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                    <span>Biaya serta cara pembayaran untuk memperoleh informasi yang diminta.</span>
                                </li>
                            </ul>
                        </div>
                        
                        <div class="mt-6 flex items-start gap-3 p-4 bg-amber-50 border border-amber-200 rounded-xl">
                            <svg class="w-6 h-6 text-amber-600 shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            <p class="text-amber-800 text-base">
                                Badan Publik yang bersangkutan dapat memperpanjang waktu untuk mengirimkan pemberitahuan sesuai dengan ketentuan yang berlaku, paling lambat <strong>tujuh (7) hari kerja berikutnya</strong> dengan memberikan alasan secara tertulis.
                            </p>
                        </div>
                        
                    </div>
                </div>

            </div>
            
            <div class="mt-12 pt-8 border-t border-gray-100 flex justify-center">
                <a href="{{ url('/form-permohonan') }}" class="inline-flex items-center gap-2 bg-gradient-to-r from-[#0F2A4A] to-blue-900 text-white px-8 py-4 rounded-full font-bold text-lg tracking-wide shadow-xl shadow-[#0F2A4A]/20 hover:shadow-2xl hover:-translate-y-1 transition-all border border-[#0F2A4A]/50 hover:border-amber-400">
                    Mulai Isi Formulir Permohonan
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                </a>
            </div>
            
        </div>
    </div>
</section>
@endsection

