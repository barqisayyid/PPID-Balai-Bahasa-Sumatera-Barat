@extends('main.app')

@section('content')
<section id="informasi-publik" class="mb-12 bg-white p-8 rounded-2xl shadow-lg">

        <!-- Header -->
        <div class="mb-10 text-center">
            <span class="inline-block px-4 py-1 bg-blue-100 text-blue-700 text-xs font-semibold rounded-full uppercase tracking-wide mb-3">Keterbukaan
                Informasi</span>
            <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-2">Informasi Publik</h2>
            <p class="text-gray-500 max-w-2xl mx-auto">Balai Bahasa Provinsi Sumatera Barat</p>
        </div>

        <!-- Introduction -->
        <div class="relative overflow-hidden bg-gradient-to-br from-blue-600 to-indigo-700 p-8 rounded-2xl mb-10 shadow-lg">
            <svg class="absolute -right-8 -top-8 w-40 h-40 text-white/10" fill="currentColor" viewBox="0 0 24 24">
                <path d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
            <div class="relative flex items-start gap-4">
                <div class="w-12 h-12 bg-white/20 backdrop-blur rounded-xl flex items-center justify-center flex-shrink-0">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <div>
                    <h3 class="text-xl font-semibold text-white mb-3">Tentang Informasi Publik</h3>
                    <p class="text-blue-50 leading-relaxed">
                        Informasi publik di lingkungan Balai Bahasa Provinsi Sumatera Barat, sebagai unit pelaksana
                        teknis
                        Kementerian Pendidikan Dasar dan Menengah di bawah Badan Pengembangan dan Pembinaan Bahasa,
                        dikelola
                        dan disediakan sesuai dengan ketentuan <strong class="text-white">Undang-Undang Nomor 14 Tahun
                            2008
                            tentang Keterbukaan Informasi Publik</strong>, <strong class="text-white">Peraturan Komisi
                            Informasi Nomor 1 Tahun 2021 tentang Standar Layanan Informasi Publik</strong>, serta
                        <strong class="text-white">Permendikbudristek Nomor 69 Tahun 2024 tentang Pengelolaan dan
                            Pelayanan Informasi Publik di Lingkungan Kementerian Pendidikan, Kebudayaan, Riset, dan
                            Teknologi</strong>.
                    </p>
                </div>
            </div>
        </div>

        <!-- Kategori Informasi -->
        <div class="mb-12">
            <div class="text-center mb-8">
                <h3 class="text-2xl font-bold text-gray-800 mb-2">Kategori Informasi Publik</h3>
                <p class="text-gray-500 max-w-2xl mx-auto">Berdasarkan regulasi tersebut, informasi publik dibagi
                    menjadi tiga kategori utama</p>
            </div>

            <div class="grid md:grid-cols-3 gap-6">
                <!-- Informasi Berkala -->
                <div x-data="{ open: false }" class="group bg-gradient-to-br from-green-50 to-white border border-green-100 rounded-2xl p-6 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300 cursor-pointer" @click="open = !open">
                    <div class="flex items-center mb-4">
                        <div class="w-14 h-14 bg-gradient-to-br from-green-400 to-green-600 rounded-xl flex items-center justify-center mr-4 shadow-md group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <h4 class="text-lg font-bold text-green-800">Informasi Berkala</h4>
                    </div>
                    <p class="text-gray-600 text-sm mb-3">Informasi yang wajib diumumkan secara rutin dan berkala</p>
                    <div class="flex items-center text-green-600 text-sm font-semibold">
                        <span>Klik untuk detail</span>
                        <svg class="w-4 h-4 ml-1 group-hover:translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7">
                            </path>
                        </svg>
                    </div>

                    <!-- Detail Content -->
                    <div id="berkala-detail" x-show="open" x-collapse="" x-cloak="" class=" mt-4 pt-4 border-t border-green-200">
                        <h5 class="font-semibold text-green-800 mb-2">Contoh Informasi Berkala:</h5>
                        <ul class="text-sm text-gray-700 space-y-1.5">
                            <li class="flex items-start"><span class="text-green-500 mr-2">•</span>Profil lembaga dan
                                struktur organisasi</li>
                            <li class="flex items-start"><span class="text-green-500 mr-2">•</span>Program kerja dan
                                kegiatan tahunan</li>
                            <li class="flex items-start"><span class="text-green-500 mr-2">•</span>Laporan kinerja dan
                                keuangan</li>
                            <li class="flex items-start"><span class="text-green-500 mr-2">•</span>Agenda kegiatan
                                bulanan</li>
                            <li class="flex items-start"><span class="text-green-500 mr-2">•</span>Maklumat pelayanan
                                publik</li>
                        </ul>
                        <div class="mt-3">
                            <a href="#berkala" class="inline-flex items-center text-green-600 hover:text-green-800 text-sm font-semibold">
                                Lihat Informasi Berkala
                                <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14">
                                    </path>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Informasi Serta Merta -->
                <div x-data="{ open: false }" class="group bg-gradient-to-br from-orange-50 to-white border border-orange-100 rounded-2xl p-6 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300 cursor-pointer" @click="open = !open">
                    <div class="flex items-center mb-4">
                        <div class="w-14 h-14 bg-gradient-to-br from-orange-400 to-orange-600 rounded-xl flex items-center justify-center mr-4 shadow-md group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L3.732 16c-.77.833.192 2.5 1.732 2.5z">
                                </path>
                            </svg>
                        </div>
                        <h4 class="text-lg font-bold text-orange-800">Informasi Serta Merta</h4>
                    </div>
                    <p class="text-gray-600 text-sm mb-3">Informasi yang harus disampaikan segera kepada masyarakat</p>
                    <div class="flex items-center text-orange-600 text-sm font-semibold">
                        <span>Klik untuk detail</span>
                        <svg class="w-4 h-4 ml-1 group-hover:translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7">
                            </path>
                        </svg>
                    </div>

                    <!-- Detail Content -->
                    <div id="sertamerta-detail" x-show="open" x-collapse="" x-cloak="" class=" mt-4 pt-4 border-t border-orange-200">
                        <h5 class="font-semibold text-orange-800 mb-2">Karakteristik Informasi Serta Merta:</h5>
                        <ul class="text-sm text-gray-700 space-y-1.5">
                            <li class="flex items-start"><span class="text-orange-500 mr-2">•</span>Dapat mengancam
                                hajat hidup orang banyak</li>
                            <li class="flex items-start"><span class="text-orange-500 mr-2">•</span>Berkaitan dengan
                                ketertiban umum</li>
                            <li class="flex items-start"><span class="text-orange-500 mr-2">•</span>Pengumuman darurat
                                atau peringatan</li>
                            <li class="flex items-start"><span class="text-orange-500 mr-2">•</span>Kebijakan penting
                                yang berdampak luas</li>
                            <li class="flex items-start"><span class="text-orange-500 mr-2">•</span>Informasi bencana
                                atau keadaan darurat</li>
                        </ul>
                        <div class="mt-3 p-3 bg-orange-100 rounded-lg">
                            <p class="text-xs text-orange-700">
                                <strong>Catatan:</strong> Informasi ini akan diumumkan melalui website resmi, media
                                sosial, dan saluran komunikasi lainnya segera setelah terjadi.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Informasi Dikecualikan -->
                <div x-data="{ open: false }" class="group bg-gradient-to-br from-red-50 to-white border border-red-100 rounded-2xl p-6 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300 cursor-pointer" @click="open = !open">
                    <div class="flex items-center mb-4">
                        <div class="w-14 h-14 bg-gradient-to-br from-red-400 to-red-600 rounded-xl flex items-center justify-center mr-4 shadow-md group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z">
                                </path>
                            </svg>
                        </div>
                        <h4 class="text-lg font-bold text-red-800">Informasi Dikecualikan</h4>
                    </div>
                    <p class="text-gray-600 text-sm mb-3">Informasi yang tidak dapat dibuka untuk publik</p>
                    <div class="flex items-center text-red-600 text-sm font-semibold">
                        <span>Klik untuk detail</span>
                        <svg class="w-4 h-4 ml-1 group-hover:translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7">
                            </path>
                        </svg>
                    </div>

                    <!-- Detail Content -->
                    <div id="dikecualikan-detail" x-show="open" x-collapse="" x-cloak="" class=" mt-4 pt-4 border-t border-red-200">
                        <h5 class="font-semibold text-red-800 mb-2">Jenis Informasi Dikecualikan:</h5>
                        <ul class="text-sm text-gray-700 space-y-1.5">
                            <li class="flex items-start"><span class="text-red-500 mr-2">•</span>Rahasia negara dan
                                keamanan</li>
                            <li class="flex items-start"><span class="text-red-500 mr-2">•</span>Perlindungan data
                                pribadi</li>
                            <li class="flex items-start"><span class="text-red-500 mr-2">•</span>Proses hukum yang
                                sedang berjalan</li>
                            <li class="flex items-start"><span class="text-red-500 mr-2">•</span>Kepentingan internal
                                instansi</li>
                            <li class="flex items-start"><span class="text-red-500 mr-2">•</span>Hak kekayaan
                                intelektual</li>
                        </ul>
                        <div class="mt-3 p-3 bg-red-100 rounded-lg">
                            <p class="text-xs text-red-700">
                                <strong>Dasar Hukum:</strong> Pengecualian berdasarkan UU No. 14 Tahun 2008 Pasal 17
                                dan peraturan perundang-undangan terkait.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- PPID Information -->
        <div class="bg-gray-50 p-8 rounded-2xl mb-10 border border-gray-100">
            <h3 class="text-xl font-bold text-gray-800 mb-4 flex items-center">
                <div class="w-10 h-10 bg-gray-800 rounded-lg flex items-center justify-center mr-3">
                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z">
                        </path>
                    </svg>
                </div>
                Pengelolaan oleh PPID
            </h3>
            <p class="text-gray-700 leading-relaxed mb-6">
                Pengelolaan ketiga jenis informasi tersebut dilaksanakan oleh <strong>Pejabat Pengelola Informasi
                    dan Dokumentasi (PPID) Pelaksana</strong> Balai Bahasa Provinsi Sumatera Barat secara transparan,
                akuntabel, dan sesuai dengan standar pelayanan informasi publik.
            </p>

            <div class="grid md:grid-cols-3 gap-4">
                <div class="bg-white p-5 rounded-xl border border-gray-200 hover:shadow-md transition-shadow duration-300">
                    <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center mb-3">
                        <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <h4 class="font-bold text-gray-800 mb-1">Transparan</h4>
                    <p class="text-sm text-gray-600">Informasi disediakan secara terbuka dan mudah diakses oleh
                        masyarakat</p>
                </div>

                <div class="bg-white p-5 rounded-xl border border-gray-200 hover:shadow-md transition-shadow duration-300">
                    <div class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center mb-3">
                        <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2">
                            </path>
                        </svg>
                    </div>
                    <h4 class="font-bold text-gray-800 mb-1">Akuntabel</h4>
                    <p class="text-sm text-gray-600">Pengelolaan informasi dapat dipertanggungjawabkan kepada publik
                    </p>
                </div>

                <div class="bg-white p-5 rounded-xl border border-gray-200 hover:shadow-md transition-shadow duration-300">
                    <div class="w-10 h-10 bg-purple-100 rounded-lg flex items-center justify-center mb-3">
                        <svg class="w-5 h-5 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                    </div>
                    <h4 class="font-bold text-gray-800 mb-1">Standar Layanan</h4>
                    <p class="text-sm text-gray-600">Mengikuti standar pelayanan informasi publik yang ditetapkan</p>
                </div>
            </div>
        </div>

        <!-- Quick Access -->
        <div class="relative overflow-hidden bg-gradient-to-br from-blue-700 to-indigo-800 text-white p-8 rounded-2xl shadow-lg">
            <svg class="absolute -left-10 -bottom-10 w-48 h-48 text-white/5" fill="currentColor" viewBox="0 0 24 24">
                <path d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1">
                </path>
            </svg>
            <h3 class="relative text-xl font-bold mb-6 flex items-center">
                <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1">
                    </path>
                </svg>
                Akses Cepat Informasi
            </h3>
            <div class="relative grid md:grid-cols-2 gap-6">
                <div>
                    <h4 class="font-semibold mb-3 text-blue-100 text-sm uppercase tracking-wide">Lihat Informasi</h4>
                    <div class="space-y-2">
                        <a href="#berkala" class="flex items-center justify-between bg-white/10 hover:bg-white/20 backdrop-blur px-4 py-3 rounded-xl text-sm font-medium transition-colors duration-300">
                            Informasi Berkala
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </a>
                        <a href="#program-kegiatan" class="flex items-center justify-between bg-white/10 hover:bg-white/20 backdrop-blur px-4 py-3 rounded-xl text-sm font-medium transition-colors duration-300">
                            Program dan Kegiatan
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </a>
                        <a href="#keuangan" class="flex items-center justify-between bg-white/10 hover:bg-white/20 backdrop-blur px-4 py-3 rounded-xl text-sm font-medium transition-colors duration-300">
                            Informasi Keuangan
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </a>
                    </div>
                </div>
                <div>
                    <h4 class="font-semibold mb-3 text-blue-100 text-sm uppercase tracking-wide">Layanan</h4>
                    <div class="space-y-2">
                        <a href="#form-permohonan" class="flex items-center justify-between bg-green-500/90 hover:bg-green-400 px-4 py-3 rounded-xl text-sm font-medium transition-colors duration-300">
                            Ajukan Permohonan
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </a>
                        <a href="#form-keberatan" class="flex items-center justify-between bg-orange-500/90 hover:bg-orange-400 px-4 py-3 rounded-xl text-sm font-medium transition-colors duration-300">
                            Ajukan Keberatan
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </a>
                        <a href="#form-pengaduan" class="flex items-center justify-between bg-red-500/90 hover:bg-red-400 px-4 py-3 rounded-xl text-sm font-medium transition-colors duration-300">
                            Sampaikan Pengaduan
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>

    </section>
@endsection
