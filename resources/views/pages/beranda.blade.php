@extends('main.app')

@section('content')
<section id="beranda" class="mb-12">
    <!-- Hero Banner Image Slider -->
    <div x-data="{ 
            active: 0, 
            slides: [
                {
                    image: '{{ asset('images/foto1.jpg') }}',
                    label: 'Portal Informasi Resmi',
                    title1: 'Pejabat Pengelola',
                    title2: 'Informasi & Dokumentasi',
                    desc: 'Balai Bahasa Provinsi Sumatera Barat berkomitmen memberikan layanan informasi publik yang transparan, objektif, dan prima.',
                    btn1: { text: 'Minta Informasi', url: '/form-permohonan', type: 'primary' },
                    btn2: { text: 'Kenali Kami', url: '/profil-lembaga', type: 'secondary' }
                },
                {
                    image: '{{ asset('images/foto2.jpg') }}',
                    label: 'Keterbukaan Publik',
                    title1: 'Wujudkan Transparansi',
                    title2: 'Layanan Publik',
                    desc: 'Kemudahan akses regulasi, laporan keuangan, dan capaian kinerja melalui portal layanan terintegrasi.',
                    btn1: { text: 'Lihat Data', url: '/berkala', type: 'primary' },
                    btn2: { text: 'Regulasi', url: '/regulasi', type: 'secondary' }
                },
                {
                    image: '{{ asset('images/foto3.jpg') }}',
                    label: 'Aspirasi & Keluhan',
                    title1: 'Saluran Pengaduan',
                    title2: 'Masyarakat',
                    desc: 'Sampaikan aspirasi, keluhan, maupun saran Anda demi peningkatan kualitas pelayanan bahasa dan sastra.',
                    btn1: { text: 'Buat Pengaduan', url: '/form-pengaduan', type: 'primary' },
                    btn2: { text: 'Prosedur', url: '/pengaduan', type: 'secondary' }
                }
            ],
            init() {
                setInterval(() => {
                    this.active = (this.active + 1) % this.slides.length;
                }, 7000);
            }
        }" 
        class="w-screen relative left-1/2 -translate-x-1/2 overflow-hidden mt-[-2rem] bg-gray-900 h-[750px] md:h-[850px] flex items-center">
        
        <!-- Background Images with Ken Burns Effect -->
        <template x-for="(slide, index) in slides" :key="index">
            <div x-show="active === index"
                 x-transition:enter="transition-opacity ease-in-out duration-1000"
                 x-transition:enter-start="opacity-0"
                 x-transition:enter-end="opacity-100"
                 x-transition:leave="transition-opacity ease-in-out duration-1000"
                 x-transition:leave-start="opacity-100"
                 x-transition:leave-end="opacity-0"
                 class="absolute inset-0 z-0">
                <img :src="slide.image" 
                     class="w-full h-full object-cover origin-center transition-transform duration-[10000ms] ease-linear"
                     :class="active === index ? 'scale-110' : 'scale-100'"
                     alt="Background Slider">
                
                <!-- Premium Overlay Gradient (Dark Blue overlay for legibility) -->
                <div class="absolute inset-0 bg-gradient-to-r from-[#0F2A4A]/95 via-[#0F2A4A]/70 to-transparent"></div>
                <div class="absolute inset-0 bg-black/20"></div>
                
                <!-- Motif Batik Overlay -->
                <div class="absolute inset-0 bg-[url('/images/motif-batik-sumbar.png')] bg-repeat opacity-[0.05] mix-blend-overlay"></div>
            </div>
        </template>

<!-- Hero Content Slider -->
        <div class="relative z-10 w-full max-w-7xl mx-auto h-[600px] md:h-[700px]">
            <template x-for="(slide, index) in slides" :key="'content-'+index">
                <div x-show="active === index"
                     x-transition:enter="transition ease-out duration-700 delay-200 transform"
                     x-transition:enter-start="opacity-0 translate-x-16"
                     x-transition:enter-end="opacity-100 translate-x-0"
                     x-transition:leave="transition ease-in duration-500 transform"
                     x-transition:leave-start="opacity-100 translate-x-0"
                     x-transition:leave-end="opacity-0 -translate-x-16"
                     class="absolute top-1/2 -translate-y-1/2 left-4 sm:left-6 lg:left-8 w-[90%] md:w-full max-w-3xl mt-12 md:mt-0">
                    
                    <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-white/10 border border-white/20 backdrop-blur-md mb-8 shadow-xl">
                        <span class="w-2 h-2 rounded-full bg-emerald-400 animate-pulse"></span>
                        <span class="text-xs font-bold text-white tracking-widest uppercase" x-text="slide.label"></span>
                    </div>
                    
                    <h1 class="text-4xl md:text-5xl lg:text-7xl font-black text-white mb-6 tracking-tight drop-shadow-2xl leading-tight">
                        <span x-text="slide.title1"></span> <br class="hidden md:block"/>
                        <span class="text-transparent bg-clip-text bg-gradient-to-r from-amber-300 to-yellow-500 drop-shadow-sm" x-text="slide.title2"></span>
                    </h1>
                    
                    <p class="text-gray-100 text-lg md:text-xl font-medium opacity-90 max-w-2xl mb-10 drop-shadow-lg leading-relaxed" x-text="slide.desc"></p>
                    
                    <div class="flex flex-col sm:flex-row gap-4 w-full">
                        <a :href="slide.btn1.url" 
                           class="inline-flex justify-center items-center gap-2 bg-gradient-to-r from-amber-400 to-yellow-500 text-[#0F2A4A] px-8 py-4 rounded-full font-bold text-lg hover:shadow-xl hover:shadow-amber-500/30 hover:-translate-y-1 transition-all">
                            <span x-text="slide.btn1.text"></span>
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                        </a>
                        <a :href="slide.btn2.url" 
                           class="inline-flex justify-center items-center gap-2 bg-white/10 text-white border border-white/20 backdrop-blur-sm px-8 py-4 rounded-full font-bold text-lg hover:bg-white/20 hover:-translate-y-1 transition-all">
                            <span x-text="slide.btn2.text"></span>
                        </a>
                    </div>
                </div>
            </template>
        </div>

        <!-- Slider Controls / Indicators -->
        <div class="absolute bottom-24 md:bottom-32 left-0 right-0 flex justify-center items-center gap-6 z-30">
            <button @click="active = (active === 0 ? slides.length - 1 : active - 1)" class="w-10 h-10 rounded-full bg-white/10 border border-white/20 backdrop-blur hover:bg-white/30 flex items-center justify-center text-white transition">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
            </button>
            <div class="flex gap-3">
                <template x-for="(slide, index) in slides" :key="'indicator-'+index">
                    <button @click="active = index" 
                            class="h-1.5 rounded-full transition-all duration-500 focus:outline-none"
                            :class="active === index ? 'w-10 bg-amber-400 shadow-[0_0_10px_rgba(251,191,36,0.6)]' : 'w-4 bg-white/40 hover:bg-white/60'">
                    </button>
                </template>
            </div>
            <button @click="active = (active === slides.length - 1 ? 0 : active + 1)" class="w-10 h-10 rounded-full bg-white/10 border border-white/20 backdrop-blur hover:bg-white/30 flex items-center justify-center text-white transition">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
            </button>
        </div>
        
        <!-- Curved Bottom -->
        <div class="absolute bottom-0 w-full overflow-hidden leading-none z-20 translate-y-[2px]">
            <svg class="relative block w-full h-[60px]" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
                <path d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V120H0V95.8C59.71,118.08,130.83,121.32,201.3,114.22,242.41,110.15,283.47,94.23,321.39,56.44Z" fill="#F7F4ED"></path>
            </svg>
        </div>
    </div>

    <!-- Quick Services Cards -->
    <div class="relative z-30 max-w-6xl mx-auto px-4 -mt-16 md:-mt-24 mb-20">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            
            <!-- Card 1 -->
            <a href="/form-permohonan" class="group bg-white p-8 rounded-3xl shadow-xl shadow-[#0F2A4A]/5 border border-gray-100 hover:shadow-2xl hover:border-amber-300 transition-all hover:-translate-y-2">
                <div class="w-14 h-14 bg-blue-50 text-blue-600 rounded-2xl flex items-center justify-center mb-6 group-hover:bg-blue-600 group-hover:text-white transition-colors">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                </div>
                <h3 class="text-xl font-bold text-gray-800 mb-3 group-hover:text-[#0F2A4A] transition-colors">Permohonan Informasi</h3>
                <p class="text-gray-600 text-sm leading-relaxed">Ajukan permohonan untuk mendapatkan data dan informasi publik yang Anda butuhkan secara resmi.</p>
            </a>
            
            <!-- Card 2 -->
            <a href="/form-pengaduan" class="group bg-white p-8 rounded-3xl shadow-xl shadow-[#0F2A4A]/5 border border-gray-100 hover:shadow-2xl hover:border-amber-300 transition-all hover:-translate-y-2">
                <div class="w-14 h-14 bg-amber-50 text-amber-600 rounded-2xl flex items-center justify-center mb-6 group-hover:bg-amber-500 group-hover:text-white transition-colors">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z"></path></svg>
                </div>
                <h3 class="text-xl font-bold text-gray-800 mb-3 group-hover:text-[#0F2A4A] transition-colors">Pengaduan Layanan</h3>
                <p class="text-gray-600 text-sm leading-relaxed">Sampaikan keluhan atau masukan Anda terkait pelayanan kami. Kami siap menindaklanjutinya.</p>
            </a>
            
            <!-- Card 3 -->
            <a href="/form-keberatan" class="group bg-white p-8 rounded-3xl shadow-xl shadow-[#0F2A4A]/5 border border-gray-100 hover:shadow-2xl hover:border-amber-300 transition-all hover:-translate-y-2">
                <div class="w-14 h-14 bg-rose-50 text-rose-600 rounded-2xl flex items-center justify-center mb-6 group-hover:bg-rose-600 group-hover:text-white transition-colors">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>
                </div>
                <h3 class="text-xl font-bold text-gray-800 mb-3 group-hover:text-[#0F2A4A] transition-colors">Pengajuan Keberatan</h3>
                <p class="text-gray-600 text-sm leading-relaxed">Ajukan keberatan resmi jika tanggapan permohonan informasi dirasa belum memuaskan.</p>
            </a>
            
        </div>
    </div>

        <!-- Section Tentang PPID -->
    <div class="w-full bg-white py-20 relative overflow-hidden">
        <!-- Decorative Background Element -->
        <div class="absolute top-0 right-0 w-1/2 h-full bg-slate-50 rounded-l-[100px] opacity-50 z-0"></div>
        <div class="absolute -right-20 -top-20 w-64 h-64 bg-amber-100 rounded-full blur-3xl opacity-40 z-0"></div>
        <div class="absolute -left-20 bottom-0 w-80 h-80 bg-blue-100 rounded-full blur-3xl opacity-40 z-0"></div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-20 items-center">
                
                <!-- Left: Text Content -->
                <div class="space-y-6">
                    <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-blue-50 border border-blue-100 mb-2">
                        <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        <span class="text-sm font-bold text-blue-800 tracking-widest uppercase">Identitas Portal</span>
                    </div>
                    
                    <h2 class="text-3xl md:text-4xl lg:text-5xl font-black text-[#0F2A4A] leading-tight">
                        Pejabat Pengelola Informasi & Dokumentasi <span class="text-transparent bg-clip-text bg-gradient-to-r from-amber-500 to-yellow-600">(PPID)</span>
                    </h2>
                    
                    <p class="text-gray-600 text-lg leading-relaxed">
                        Sesuai dengan amanat <strong class="text-[#0F2A4A]">Undang-Undang Nomor 14 Tahun 2008</strong> tentang Keterbukaan Informasi Publik (KIP), Balai Bahasa Provinsi Sumatera Barat berkomitmen penuh untuk memberikan layanan informasi yang transparan, akuntabel, dan mudah diakses oleh seluruh lapisan masyarakat.
                    </p>
                    
                    <div class="flex flex-col sm:flex-row gap-6 pt-4">
                        <div class="flex items-start gap-4">
                            <div class="w-12 h-12 rounded-full bg-emerald-100 text-emerald-600 flex items-center justify-center shrink-0">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            </div>
                            <div>
                                <h4 class="font-bold text-gray-800">Transparan</h4>
                                <p class="text-sm text-gray-500 mt-1">Keterbukaan informasi tanpa diskriminasi.</p>
                            </div>
                        </div>
                        <div class="flex items-start gap-4">
                            <div class="w-12 h-12 rounded-full bg-blue-100 text-blue-600 flex items-center justify-center shrink-0">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                            </div>
                            <div>
                                <h4 class="font-bold text-gray-800">Responsif</h4>
                                <p class="text-sm text-gray-500 mt-1">Layanan cepat, tepat waktu, dan biaya ringan.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right: Visual/Illustration -->
                <div class="relative">
                    <div class="absolute inset-0 bg-gradient-to-tr from-[#0F2A4A] to-blue-700 rounded-3xl transform rotate-3 scale-105 opacity-10"></div>
                    <div class="bg-white border border-gray-100 rounded-3xl p-8 shadow-2xl relative z-10 flex flex-col items-center text-center">
                        <div class="w-32 h-32 bg-slate-50 rounded-full border-4 border-white shadow-lg flex items-center justify-center mb-6 -mt-16">
                            <img src="{{ asset('images/bbpsumbar.png') }}" alt="Logo PPID" class="w-20 h-auto object-contain">
                        </div>
                        <h3 class="text-2xl font-bold text-[#0F2A4A] mb-2">Maklumat PPID</h3>
                        <div class="w-16 h-1 bg-amber-400 rounded-full mb-6 mx-auto"></div>
                        <p class="text-gray-600 italic text-lg leading-relaxed mb-8">
                            "Menyediakan informasi publik yang akurat, benar, dan tidak menyesatkan, serta senantiasa proaktif dalam memenuhi kebutuhan informasi masyarakat."
                        </p>
                        <a href="/visi-misi" class="text-blue-600 font-bold hover:text-amber-500 transition-colors flex items-center gap-1 group">
                            Pelajari Visi & Misi Selengkapnya
                            <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Info Banner -->
    <div class="w-full bg-[#F7F4ED] py-10 border-t border-gray-200">
        <div class="max-w-6xl mx-auto px-4 flex flex-col md:flex-row items-center justify-between gap-6">
            <div class="flex items-center gap-4">
                <img src="{{ asset('images/logotutwuri.webp') }}" alt="Logo Kemdikbud" class="w-16 h-16 object-contain mix-blend-multiply opacity-80">
                <div>
                    <h4 class="font-bold text-[#0F2A4A] text-lg">Maklumat Pelayanan</h4>
                    <p class="text-gray-600 text-sm max-w-lg">Kami berjanji dan sanggup menyelenggarakan pelayanan sesuai dengan standar pelayanan yang telah ditetapkan.</p>
                </div>
            </div>
            <a href="/berkala" class="whitespace-nowrap px-6 py-2.5 rounded-full border-2 border-[#0F2A4A] text-[#0F2A4A] font-bold hover:bg-[#0F2A4A] hover:text-white transition-colors">
                Lihat Informasi Berkala
            </a>
        </div>
    </div>
</section>
@endsection










