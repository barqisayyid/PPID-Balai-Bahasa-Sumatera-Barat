@extends('main.app')

@section('content')
<section id="profil-pengembang" class="mb-12">
    
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
                Informasi Sistem
            </span>
            <h2 class="text-4xl md:text-5xl font-black text-white mb-6 tracking-tight drop-shadow-lg">
                Profil Pengembang
            </h2>
            <div class="w-24 h-1.5 bg-gradient-to-r from-transparent via-amber-400 to-transparent mx-auto"></div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="max-w-5xl mx-auto pt-16 px-4 md:px-8 relative z-20">
        <div class="bg-white rounded-3xl shadow-xl shadow-blue-900/5 border border-slate-100 p-8 md:p-12 mb-12 overflow-hidden relative">
            
            <!-- Dekorasi Abstrak Ringan -->
            <div class="absolute -right-20 -top-20 opacity-5 pointer-events-none">
                <svg width="300" height="300" viewBox="0 0 24 24" fill="currentColor">
                    <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8zm-1-13h2v6h-2zm0 8h2v2h-2z"/>
                </svg>
            </div>

            <div class="flex flex-col md:flex-row gap-10 items-center md:items-start relative z-10">
                
                <!-- Foto Pengembang -->
                <div class="w-48 h-48 md:w-64 md:h-64 flex-shrink-0 relative">
                    <div class="absolute inset-0 bg-amber-400 rounded-full transform translate-x-2 translate-y-2 opacity-30"></div>
                    <div class="absolute inset-0 bg-[#0F2A4A] rounded-full transform -translate-x-2 -translate-y-2 opacity-10"></div>
                    <img src="{{ asset('images/barqi.png') }}" alt="Sayyid Barqi" class="w-full h-full object-cover rounded-full shadow-lg border-4 border-white relative z-10" onerror="this.src='https://ui-avatars.com/api/?name=Sayyid+Barqi&background=0F2A4A&color=fff&size=256';">
                </div>

                <!-- Informasi Biodata -->
                <div class="flex-1 text-center md:text-left">
                    <h3 class="text-3xl font-bold text-[#0F2A4A] mb-2">Sayyid Barqi Almukarrom Ramadhan</h3>
                    <p class="text-amber-500 font-semibold mb-6 uppercase tracking-wider text-sm">Full-Stack Developer & Mobile Engineer</p>
                    
                    <p class="text-slate-600 leading-relaxed mb-6">
                        Pengembang utama di balik perancangan dan pembuatan sistem portal Pejabat Pengelola Informasi dan Dokumentasi (PPID) Balai Bahasa Provinsi Sumatera Barat. Berkomitmen untuk menciptakan arsitektur perangkat lunak yang aman, responsif, modern, dan sangat mudah diakses oleh masyarakat (ramah pengguna).
                    </p>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-8">
                        <div class="bg-slate-50 p-4 rounded-xl border border-slate-100 flex items-start gap-3">
                            <svg class="w-6 h-6 text-[#0F2A4A] flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                            <div>
                                <h4 class="font-bold text-slate-800 text-sm">Spesialisasi</h4>
                                <p class="text-xs text-slate-500 mt-1">Laravel (Web), Flutter (Mobile), Database & API Integration</p>
                            </div>
                        </div>
                        <div class="bg-slate-50 p-4 rounded-xl border border-slate-100 flex items-start gap-3">
                            <svg class="w-6 h-6 text-[#0F2A4A] flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 14l9-5-9-5-9 5 9 5z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"></path></svg>
                            <div>
                                <h4 class="font-bold text-slate-800 text-sm">Almamater</h4>
                                <p class="text-xs text-slate-500 mt-1">Pendidikan Teknik Informatika dan Komputer (PTIK)<br>UIN Sjech M. Djamil Djambek Bukittinggi</p>
                            </div>
                        </div>
                    </div>

                    <div class="flex flex-wrap justify-center md:justify-start gap-3">
                        <a href="mailto:sayyidbarqi0911@gmail.com" class="inline-flex items-center px-5 py-2.5 bg-[#0F2A4A] text-white rounded-lg text-sm font-semibold hover:bg-[#1a4270] transition-colors shadow-sm">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                            Email
                        </a>
                        <a href="https://github.com/barqisayyid" target="_blank" class="inline-flex items-center px-5 py-2.5 bg-slate-100 text-slate-700 rounded-lg text-sm font-semibold hover:bg-slate-200 transition-colors shadow-sm border border-slate-200">
                            <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 24 24"><path fill-rule="evenodd" clip-rule="evenodd" d="M12 2C6.477 2 2 6.477 2 12c0 4.42 2.865 8.166 6.839 9.489.5.092.682-.217.682-.482 0-.237-.008-.866-.013-1.7-2.782.603-3.369-1.34-3.369-1.34-.454-1.156-1.11-1.462-1.11-1.462-.908-.62.069-.608.069-.608 1.003.07 1.531 1.03 1.531 1.03.892 1.529 2.341 1.087 2.91.831.092-.646.35-1.086.636-1.336-2.22-.253-4.555-1.11-4.555-4.943 0-1.091.39-1.984 1.029-2.683-.103-.253-.446-1.27.098-2.647 0 0 .84-.269 2.75 1.025A9.578 9.578 0 0112 6.836c.85.004 1.705.114 2.504.336 1.909-1.294 2.747-1.025 2.747-1.025.546 1.377.203 2.394.1 2.647.64.699 1.028 1.592 1.028 2.683 0 3.842-2.339 4.687-4.566 4.935.359.309.678.919.678 1.852 0 1.336-.012 2.415-.012 2.743 0 .267.18.578.688.48C19.138 20.161 22 16.418 22 12c0-5.523-4.477-10-10-10z"/></svg>
                            GitHub
                        </a>
                        <a href="https://www.linkedin.com/in/sayyid-barqi-almukarrom-ramadhan-62372632a/" target="_blank" class="inline-flex items-center px-5 py-2.5 bg-[#0077b5] text-white rounded-lg text-sm font-semibold hover:bg-[#005a8a] transition-colors shadow-sm">
                            <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 24 24"><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/></svg>
                            LinkedIn
                        </a>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</section>
@endsection
