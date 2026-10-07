@extends('main.app')

@section('content')
<section id="layanan-informasi" class="mb-12 bg-white p-8 rounded-2xl shadow-lg">

        <!-- Header -->
        <div class="mb-10 text-center">
            <span class="inline-block px-4 py-1 bg-blue-100 text-blue-700 text-xs font-semibold rounded-full uppercase tracking-wide mb-3">PPID</span>
            <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-2">Layanan Informasi Publik</h2>
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
                    <h3 class="text-xl font-semibold text-white mb-3">Komitmen Transparansi dan Akuntabilitas</h3>
                    <p class="text-blue-50 leading-relaxed mb-3">
                        Balai Bahasa Provinsi Sumatera Barat berkomitmen untuk mewujudkan transparansi dan akuntabilitas
                        publik
                        melalui penyediaan layanan permohonan data dan informasi bagi masyarakat. Layanan ini merupakan
                        bagian dari pelaksanaan <strong class="text-white">Undang-Undang Nomor 14 Tahun 2008 tentang
                            Keterbukaan Informasi
                            Publik</strong>, yang menjamin hak setiap warga negara untuk memperoleh informasi publik
                        dengan
                        mudah, cepat, dan berbiaya ringan.
                    </p>
                    <p class="text-blue-50 leading-relaxed">
                        Masyarakat dapat mengajukan permohonan informasi atau data yang dimiliki Balai Bahasa Provinsi
                        Sumatera Barat, baik berupa dokumen, laporan kegiatan, hasil penelitian, maupun data kebahasaan dan
                        kesastraan yang tidak termasuk dalam kategori informasi yang dikecualikan. Permohonan dapat
                        dilakukan secara langsung ke meja layanan informasi, melalui surat resmi, atau secara daring
                        melalui
                        alamat surel PPID.
                    </p>
                </div>
            </div>
        </div>

        <!-- Standar Layanan -->
        <div class="mb-12">
            <div class="text-center mb-8">
                <h3 class="text-2xl font-bold text-gray-800 mb-2">Standar Layanan Informasi Publik</h3>
                <p class="text-gray-500 max-w-2xl mx-auto">PPID Pelaksana akan menindaklanjuti setiap permohonan sesuai
                    standar berikut</p>
            </div>

            <div class="grid md:grid-cols-3 gap-6">
                <div class="group bg-white p-6 rounded-2xl border border-gray-100 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
                    <div class="w-14 h-14 bg-gradient-to-br from-green-400 to-green-600 rounded-xl flex items-center justify-center mb-4 shadow-md group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <h4 class="font-bold text-gray-800 mb-2 text-lg">Waktu Tanggapan</h4>
                    <p class="text-sm text-gray-600 leading-relaxed">Memberikan tanggapan atas permohonan paling lambat
                        <span class="font-semibold text-green-700">10 hari kerja</span> sejak diterimanya permohonan,
                        dan dapat
                        diperpanjang paling lama <span class="font-semibold text-green-700">7 hari kerja</span> dengan
                        pemberitahuan tertulis.
                    </p>
                </div>

                <div class="group bg-white p-6 rounded-2xl border border-gray-100 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
                    <div class="w-14 h-14 bg-gradient-to-br from-green-400 to-green-600 rounded-xl flex items-center justify-center mb-4 shadow-md group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2">
                            </path>
                        </svg>
                    </div>
                    <h4 class="font-bold text-gray-800 mb-2 text-lg">Kelengkapan Informasi</h4>
                    <p class="text-sm text-gray-600 leading-relaxed">Memberikan informasi secara
                        <span class="font-semibold text-green-700">lengkap dan benar</span> sesuai format yang diminta,
                        kecuali
                        informasi tersebut termasuk kategori dikecualikan berdasarkan hasil uji konsekuensi.
                    </p>
                </div>

                <div class="group bg-white p-6 rounded-2xl border border-gray-100 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
                    <div class="w-14 h-14 bg-gradient-to-br from-green-400 to-green-600 rounded-xl flex items-center justify-center mb-4 shadow-md group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z">
                            </path>
                        </svg>
                    </div>
                    <h4 class="font-bold text-gray-800 mb-2 text-lg">Transparansi Penolakan</h4>
                    <p class="text-sm text-gray-600 leading-relaxed">Memberikan
                        <span class="font-semibold text-green-700">alasan tertulis</span> jika permohonan ditolak
                        sebagian atau
                        seluruhnya dengan dasar hukum yang jelas dan dapat dipertanggungjawabkan.
                    </p>
                </div>
            </div>
        </div>

        <!-- Alur Proses Permohonan -->
        <div>
            <div class="text-center mb-8">
                <h3 class="text-2xl font-bold text-gray-800 mb-2">Alur Proses Permohonan</h3>
                <p class="text-gray-500">Tiga langkah sederhana menuju informasi yang Anda butuhkan</p>
            </div>

            <div class="flex flex-col md:flex-row items-center gap-4">
                <div class="w-full bg-gradient-to-br from-blue-50 to-white p-6 rounded-2xl border-2 border-blue-100 text-center hover:border-blue-400 transition-colors duration-300">
                    <div class="w-14 h-14 bg-blue-600 text-white rounded-full flex items-center justify-center mx-auto mb-4 shadow-lg shadow-blue-200 text-xl font-bold">
                        1
                    </div>
                    <h4 class="font-bold text-gray-800 mb-2">Pengajuan</h4>
                    <p class="text-sm text-gray-600">Pemohon menyampaikan surat permohonan sesuai persyaratan</p>
                </div>

                <svg class="hidden md:block w-8 h-8 text-blue-300 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
                <svg class="md:hidden w-8 h-8 text-blue-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                </svg>

                <div class="w-full bg-gradient-to-br from-green-50 to-white p-6 rounded-2xl border-2 border-green-100 text-center hover:border-green-400 transition-colors duration-300">
                    <div class="w-14 h-14 bg-green-600 text-white rounded-full flex items-center justify-center mx-auto mb-4 shadow-lg shadow-green-200 text-xl font-bold">
                        2
                    </div>
                    <h4 class="font-bold text-gray-800 mb-2">Verifikasi</h4>
                    <p class="text-sm text-gray-600">PPID memverifikasi kelengkapan berkas permohonan</p>
                </div>

                <svg class="hidden md:block w-8 h-8 text-purple-300 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
                <svg class="md:hidden w-8 h-8 text-purple-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                    </path>
                </svg>

                <div class="w-full bg-gradient-to-br from-purple-50 to-white p-6 rounded-2xl border-2 border-purple-100 text-center hover:border-purple-400 transition-colors duration-300">
                    <div class="w-14 h-14 bg-purple-600 text-white rounded-full flex items-center justify-center mx-auto mb-4 shadow-lg shadow-purple-200 text-xl font-bold">
                        3
                    </div>
                    <h4 class="font-bold text-gray-800 mb-2">Penyampaian</h4>
                    <p class="text-sm text-gray-600">Informasi disampaikan sesuai cara yang diminta pemohon</p>
                </div>
            </div>
        </div>

    </section>
@endsection
