@extends('main.app')

@section('content')
<!-- Profil Lembaga dengan Sentuhan Minangkabau -->
<section id="profil-lembaga" class="mb-12">
    
    <!-- Hero Banner with Minangkabau Motif (Pucuak Rabuang / Geometric) -->
    <div class="w-screen relative left-1/2 -translate-x-1/2 bg-[#0F2A4A] overflow-hidden pt-20 pb-24 px-8 mt-[-2rem]">
        <!-- SVG Pattern Background (Songket / Kaluak Paku / Pucuak Rabuang stylized) -->
        <div class="absolute inset-0 opacity-10 pointer-events-none">
            <svg width="100%" height="100%" xmlns="http://www.w3.org/2000/svg">
                <defs>
                    <pattern id="minang-pattern" x="0" y="0" width="60" height="60" patternUnits="userSpaceOnUse">
                        <!-- Ukiran Stylized Geometric -->
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

        <!-- Rumah Gadang Silhouette -->
        <div class="absolute bottom-0 right-0 left-0 flex justify-center opacity-15 pointer-events-none">
            <svg viewBox="0 0 800 150" class="w-full max-w-4xl text-amber-400" fill="currentColor" preserveAspectRatio="xMidYMax meet">
                <!-- Atap Gonjong 1 -->
                <path d="M 400 100 Q 250 10 100 50 L 100 150 L 700 150 L 700 50 Q 550 10 400 100 Z" />
                <!-- Atap Gonjong 2 (Tengah) -->
                <path d="M 400 60 Q 300 0 150 40 L 150 150 L 650 150 L 650 40 Q 500 0 400 60 Z" />
                <!-- Atap Gonjong 3 (Paling Atas) -->
                <path d="M 400 20 Q 350 -10 250 20 L 250 150 L 550 150 L 550 20 Q 450 -10 400 20 Z" />
            </svg>
        </div>

<div class="relative z-10 text-center">
            <span class="inline-block text-amber-400 font-extrabold tracking-widest uppercase text-sm mb-4 border border-amber-400/50 px-4 py-1 rounded-full bg-amber-400/10 backdrop-blur-sm">
                Balai Bahasa Provinsi Sumatera Barat
            </span>
            <h2 class="text-4xl md:text-5xl font-black text-white mb-6 tracking-tight drop-shadow-lg">
                Profil Lembaga
            </h2>
            <div class="w-24 h-1.5 bg-gradient-to-r from-transparent via-amber-400 to-transparent mx-auto"></div>
        </div>
    </div>

    <!-- Main Content Area -->
    <div class="relative px-6 py-12 md:px-16 md:py-16 -mt-6 mb-8">
        <!-- Overlay Card Effect -->
        <div class="absolute inset-0 bg-white shadow-[0_-10px_40px_rgba(0,0,0,0.08)] rounded-3xl border border-gray-100 -z-10"></div>

        <div class="space-y-8 text-gray-700 text-lg leading-loose max-w-4xl mx-auto">
            
            <p class="text-justify first-letter:text-6xl first-letter:font-black first-letter:text-[#0F2A4A] first-letter:float-left first-letter:mr-3 first-letter:mt-2">
                Balai Bahasa Provinsi Sumatera Barat merupakan unit pelaksana teknis Kementerian Pendidikan Dasar dan
                Menengah di bawah Badan Pengembangan dan Pembinaan Bahasa yang bertugas melaksanakan pelindungan,
                pembinaan, dan pengembangan bahasa serta sastra di wilayah kerjanya.
            </p>
            
            <p class="text-justify">
                Untuk menjalankan Undang-Undang Nomor 14 Tahun 2008 tentang Keterbukaan Informasi Publik (KIP), Balai
                Bahasa Provinsi Sumatera Barat membentuk <span class="font-bold text-[#0F2A4A]">Pejabat Pengelola Informasi dan Dokumentasi (PPID)</span>. Hal ini sebagai
                bentuk upaya mewujudkan tata kelola pemerintahan yang baik dan bertanggung jawab <em>(good governance)</em> melalui
                penerapan prinsip-prinsip akuntabilitas, transparansi, dan supremasi hukum, serta melibatkan partisipasi
                masyarakat dalam setiap proses kebijakan publik.
            </p>

            <!-- Milestones with Ornaments -->
            <div class="grid md:grid-cols-2 gap-6 my-10">
                <div class="relative border border-amber-200 bg-amber-50/50 rounded-2xl p-6 group hover:shadow-lg transition-all hover:-translate-y-1 hover:border-amber-400">
                    <div class="absolute top-0 right-0 p-4 opacity-10 group-hover:opacity-20 transition-opacity">
                        <svg class="w-16 h-16 text-amber-600" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M12 2L22 20H2L12 2Z" />
                        </svg>
                    </div>
                    <div class="flex items-center gap-4 mb-3">
                        <div class="w-12 h-12 bg-amber-100 rounded-full flex items-center justify-center text-amber-600 font-bold">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                        </div>
                        <div>
                            <p class="text-xs uppercase tracking-widest text-amber-600 font-bold">Terbentuk</p>
                            <p class="text-xl text-gray-900 font-extrabold">10 Maret 2022</p>
                        </div>
                    </div>
                    <p class="text-sm text-gray-600 font-medium">Pembentukan PPID secara resmi di lingkungan Balai Bahasa.</p>
                </div>
                
                <div class="relative border border-blue-200 bg-blue-50/50 rounded-2xl p-6 group hover:shadow-lg transition-all hover:-translate-y-1 hover:border-blue-400">
                    <div class="absolute top-0 right-0 p-4 opacity-10 group-hover:opacity-20 transition-opacity">
                        <svg class="w-16 h-16 text-blue-600" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M12 22L2 4H22L12 22Z" />
                        </svg>
                    </div>
                    <div class="flex items-center gap-4 mb-3">
                        <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center text-blue-600 font-bold">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                        </div>
                        <div>
                            <p class="text-xs uppercase tracking-widest text-blue-600 font-bold">Pendukung</p>
                            <p class="text-xl text-gray-900 font-extrabold">30 Mei 2021</p>
                        </div>
                    </div>
                    <p class="text-sm text-gray-600 font-medium">Pembentukan Tim Unit Layanan Terpadu (ULT).</p>
                </div>
            </div>

            <p class="text-justify">
                Dalam pelaksanaan tugas memberikan layanan informasi publik, PPID Balai Bahasa Provinsi Sumatera Barat
                berpedoman pada Peraturan Menteri Pendidikan dan Kebudayaan (Permendikbud) Nomor 41 Tahun 2020 tentang
                Layanan Informasi Publik di Lingkungan Kementerian Pendidikan dan Kebudayaan. Berdasarkan hal-hal
                tersebut, PPID di lingkungan Balai Bahasa Provinsi Sumatera Barat bertanggung jawab untuk melakukan <span class="font-bold text-gray-900">penyediaan,
                penyimpanan, pendokumentasian, pelayanan, dan pengamanan</span> informasi publik.
            </p>

            <div class="relative my-10">
                <!-- Motif Carano / Siriah (Decorative corner) -->
                <div class="absolute -top-4 -left-4 w-8 h-8 border-t-2 border-l-2 border-amber-400 rounded-tl-lg"></div>
                <div class="absolute -bottom-4 -right-4 w-8 h-8 border-b-2 border-r-2 border-amber-400 rounded-br-lg"></div>
                
                <div class="bg-gray-50 border-y border-gray-200 p-8 text-center italic text-gray-600">
                    Balai Bahasa Provinsi Sumatera Barat berkomitmen untuk melaksanakan layanan informasi publik secara
                    prima dan berkelanjutan sesuai dengan amanat Undang-Undang Nomor 14 Tahun 2008.
                </div>
            </div>

            <!-- Signature Section -->
            <div class="mt-16 flex flex-col items-center">
                <blockquote class="bg-[#0F2A4A] text-white rounded-full px-8 py-3 text-center mb-10 shadow-lg border-b-4 border-amber-400">
                    <p class="text-xl font-bold tracking-wide">Salam Keterbukaan Informasi</p>
                </blockquote>

                <div class="w-full max-w-sm bg-white rounded-2xl p-8 border border-gray-100 shadow-xl relative overflow-hidden">
                    <div class="absolute top-0 right-0 w-24 h-24 bg-blue-50 rounded-bl-full -mr-4 -mt-4 z-0"></div>
                    <div class="relative z-10 text-center">
                        <p class="text-sm font-medium text-gray-500 mb-1">Kepala Balai Bahasa Provinsi Sumatera Barat</p>
                        <p class="text-xs text-gray-400 mb-8 leading-relaxed">
                            Badan Pengembangan dan Pembinaan Bahasa<br>
                            Kementerian Pendidikan Dasar dan Menengah<br>
                            <span class="font-bold text-blue-900">Atasan PPID</span>
                        </p>
                        
                        <div class="my-6">
                            <!-- Digital Signature / "Ttd" styling -->
                            <p class="font-signature text-3xl text-gray-300 italic transform -rotate-2">ttd</p>
                        </div>
                        
                        <p class="font-extrabold text-[#0F2A4A] text-lg border-t border-gray-200 pt-3 inline-block px-4">
                            Rahmat, S.Ag., M.Hum
                        </p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
@endsection

