@extends('main.app')

@section('content')
<section id="laporan-layanan" class="mb-12 bg-white p-8 rounded-lg shadow-md">
        <h2 class="text-3xl font-bold text-gray-800 mb-8">Laporan Layanan Informasi Publik Tahun 2024</h2>

        <div class="flex flex-col lg:flex-row gap-8 items-start mb-8">

            <!-- Cover Book Preview -->
            <div class="lg:w-1/3 w-full">
                <div class="relative group cursor-pointer overflow-hidden rounded-lg shadow-2xl" style="height: 500px;" onclick="openFlipbook()">

                    <!-- Cover Image -->
                    <img src="images/cover-laporan.jpg" alt="Cover Laporan Layanan Informasi Publik 2024" class="w-full h-full object-cover" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">


                    <!-- Placeholder Cover dengan Gradient -->
                    <div class="w-full h-full bg-gradient-to-br from-blue-600 via-blue-700 to-blue-800 flex flex-col items-center justify-center text-white p-6 relative">
                        <!-- Book spine effect -->
                        <div class="absolute left-0 top-0 w-2 h-full bg-gradient-to-b from-blue-800 to-blue-900 shadow-inner">
                        </div>

                        <div class="text-center">
                            <svg class="w-16 h-16 mx-auto mb-4 text-blue-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                </path>
                            </svg>
                            <h4 class="text-lg font-bold mb-2 leading-tight">LAPORAN LAYANAN</h4>
                            <h4 class="text-lg font-bold mb-2 leading-tight">INFORMASI PUBLIK</h4>
                            <div class="border-t border-blue-300 my-3 w-20 mx-auto"></div>
                            <p class="text-2xl font-bold mb-3">2024</p>
                            <div class="border-t border-blue-300 my-3 w-16 mx-auto"></div>
                            <p class="text-sm text-blue-100 leading-tight">Balai Bahasa <br>PROVINSI BANTEN</p>
                            <div class="mt-4">
                                <p class="text-xs text-blue-200">PPID</p>
                            </div>
                        </div>

                        <!-- Decorative corner -->
                        <div class="absolute bottom-4 right-4 w-8 h-8 border-2 border-blue-300 rounded-full opacity-30">
                        </div>
                    </div>

                    <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-60 transition-all duration-500">
                    </div>

                    <div class="absolute inset-0 flex flex-col items-center justify-center text-center px-6 opacity-0 group-hover:opacity-100 transition-opacity duration-500 text-white">
                        <svg class="w-12 h-12 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                            </path>
                        </svg>
                        <p class="text-lg font-semibold">Klik untuk melihat laporan</p>
                    </div>
                </div>
            </div>

            <!-- Introduction -->
            <div class="lg:w-2/3 w-full">
                <div class="bg-gradient-to-r from-blue-50 to-indigo-50 border-l-4 border-blue-600 p-6 rounded-lg" style="height: 500px; overflow-y: auto;">
                    <h3 class="text-xl font-semibold text-blue-800 mb-4 flex items-center">
                        <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                            </path>
                        </svg>
                        Ringkasan Laporan Layanan Informasi Publik
                    </h3>
                    <p class="text-gray-700 leading-relaxed mb-4 text-sm">
                        Laporan Layanan Informasi Publik Tahun 2024 merupakan bentuk pertanggungjawaban Kantor
                        Bahasa Provinsi Sumatera Barat dalam melaksanakan keterbukaan informasi publik sesuai dengan
                        <strong>Undang-Undang Nomor 14 Tahun 2008 tentang Keterbukaan Informasi Publik</strong> dan
                        <strong>Permendikbudristek Nomor 69 Tahun 2024</strong>.
                    </p>
                    <p class="text-gray-700 leading-relaxed mb-4 text-sm">
                        Laporan ini memuat data statistik permohonan informasi, tingkat kepuasan masyarakat, serta
                        evaluasi kinerja PPID dalam memberikan pelayanan informasi publik kepada masyarakat
                        sepanjang tahun 2024.
                    </p>

                    <!-- Key Highlights -->
                    <div class="mb-4">
                        <h4 class="font-semibold text-blue-800 mb-2 text-sm">Pencapaian Utama 2024:</h4>
                        <ul class="text-xs text-gray-700 space-y-1">
                            <li>• 100% permohonan informasi ditanggapi sesuai standar waktu</li>
                            <li>• Total permohonan 75 pengajuan terpenuhi sepanjang tahun 2024.</li>
                            <li>• Rata-rata waktu menjawab di bawah 2 hari.</li>
                            <li>• Implementasi sistem digital untuk layanan informasi telah diterapkan.</li>
                        </ul>
                    </div>

                    <!-- Statistics Cards -->
                    <div class="grid grid-cols-3 gap-3">
                        <div class="bg-white p-3 rounded-lg border border-blue-200 text-center">
                            <div class="text-xl font-bold text-blue-600 mb-1">75</div>
                            <p class="text-xs text-gray-600">Total Permohonan</p>
                        </div>
                        <div class="bg-white p-3 rounded-lg border border-blue-200 text-center">
                            <div class="text-xl font-bold text-green-600 mb-1">84,3</div>
                            <p class="text-xs text-gray-600">Survei Kepuasan Masyarakat</p>
                        </div>
                        <div class="bg-white p-3 rounded-lg border border-blue-200 text-center">
                            <div class="text-xl font-bold text-purple-600 mb-1">1,6 hari</div>
                            <p class="text-xs text-gray-600">Rata-Rata waktu Menjawab</p>
                        </div>
                    </div>

                    <!-- Action Button -->
                    <div class="mt-4 text-center">
                        <button class="bg-blue-600 text-white px-4 py-2 rounded-lg text-sm hover:bg-blue-700 transition-colors inline-flex items-center">
                            <a href="https://drive.google.com/file/d/1zD8mgYeRkmIILEd03IjE09DZqLBkk7qb/view?usp=sharing" target="_blank">Unduh Laporan Lengkap</a>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Flipbook Embed -->
        <div id="flipbook-container" class="hidden mb-8">
            <div class="bg-gray-100 p-6 rounded-lg">
                <div class="flex justify-between items-center mb-4">
                    <h4 class="text-xl font-semibold text-gray-800">Laporan Layanan Informasi Publik 2024</h4>
                    <button onclick="closeFlipbook()" class="text-gray-600 hover:text-gray-800">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>

                <!-- Flipbook Iframe -->
                <div style="position:relative;padding-top:max(60%,324px);width:100%;height:0;">
                    <iframe style="position:absolute;border:none;width:100%;height:100%;left:0;top:0;" src="https://online.fliphtml5.com/vkpjz/xkog/" seamless="seamless" scrolling="no" frameborder="0" allowtransparency="true" allowfullscreen="true">
                    </iframe>
                </div>
            </div>
        </div>

    </section>
@endsection
