@extends('main.app')

@section('content')
<section id="pengaduan" class="mb-12 bg-white p-8 rounded-lg shadow-md">
        <h2 class="text-3xl font-bold text-gray-800 mb-8">Pengaduan</h2>

        

        <!-- Portal Pengaduan -->
        <div class="mb-8">
            <h3 class="text-2xl font-semibold text-gray-800 mb-6 text-center">Portal Pengaduan</h3>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                

                <!-- LAPOR! -->
                <div class="bg-gradient-to-br from-green-50 to-green-100 border border-green-200 rounded-lg p-6 hover:shadow-lg transition-all duration-300 cursor-pointer transform hover:scale-105" onclick="window.open('https://kemendikdasmen.lapor.go.id/', '_blank')">
                    <div class="text-center">
                        <div class="w-16 h-16 bg-green-600 rounded-full flex items-center justify-center mx-auto mb-4">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v4m0 4h.01M12 2a10 10 0 110 20 10 10 0 010-20z"></path>
                            </svg>
                        </div>
                        <h4 class="text-lg font-semibold text-green-800 mb-2">LAPOR!</h4>
                        <p class="text-sm text-gray-700 mb-4">Kanal resmi pengaduan di lingkungan Kementerian
                            Pendidikan Dasar dan Menengah.</p>
                        <div class="bg-green-600 text-white px-4 py-2 rounded-full text-sm font-medium inline-flex items-center">
                            Kunjungi Portal
                            <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14">
                                </path>
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- SIPPN -->
                <div class="bg-gradient-to-br from-purple-50 to-purple-100 border border-purple-200 rounded-lg p-6 hover:shadow-lg transition-all duration-300 cursor-pointer transform hover:scale-105" onclick="window.open('https://sippn.menpan.go.id/instansi/kantor-bahasa-provinsi-banten-180712', '_blank')">
                    <div class="text-center">
                        <div class="w-16 h-16 bg-purple-600 rounded-full flex items-center justify-center mx-auto mb-4">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v6a2 2 0 01-2 2h-3l-4 4zm5-10v4m0 4h.01"></path>
                            </svg>
                        </div>
                        <h4 class="text-lg font-semibold text-purple-800 mb-2">SIPPN</h4>
                        <p class="text-sm text-gray-700 mb-4">Portal yang memuat data dan informasi seluruh layanan
                            publik di Indonesia</p>
                        <div class="bg-purple-600 text-white px-4 py-2 rounded-full text-sm font-medium inline-flex items-center">
                            Kunjungi Portal
                            <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14">
                                </path>
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- WBS -->
                <div class="bg-gradient-to-br from-orange-50 to-orange-100 border border-orange-200 rounded-lg p-6 hover:shadow-lg transition-all duration-300 cursor-pointer transform hover:scale-105" onclick="window.open('http://kemendikbudristek.com/wbs-sub/', '_blank')">
                    <div class="text-center">
                        <div class="w-16 h-16 bg-orange-600 rounded-full flex items-center justify-center mx-auto mb-4">
                            <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 16 16">
                                <path d="M13 2.5a1.5 1.5 0 0 1 3 0v11a1.5 1.5 0 0 1-3 0v-.214c-2.162-1.241-4.49-1.843-6.912-2.083l.405 2.712A1 1 0 0 1 5.51 15.1h-.548a1 1 0 0 1-.916-.599l-1.85-3.49-.202-.003A2.014 2.014 0 0 1 0 9V7a2.02 2.02 0 0 1 1.992-2.013 75 75 0 0 0 2.483-.075c3.043-.154 6.148-.849 8.525-2.199zm1 0v11a.5.5 0 0 0 1 0v-11a.5.5 0 0 0-1 0m-1 1.35c-2.344 1.205-5.209 1.842-8 2.033v4.233q.27.015.537.036c2.568.189 5.093.744 7.463 1.993zm-9 6.215v-4.13a95 95 0 0 1-1.992.052A1.02 1.02 0 0 0 1 7v2c0 .55.448 1.002 1.006 1.009A61 61 0 0 1 4 10.065m-.657.975 1.609 3.037.01.024h.548l-.002-.014-.443-2.966a68 68 0 0 0-1.722-.082z"></path>
                            </svg>
                        </div>
                        <h4 class="text-lg font-semibold text-orange-800 mb-2">WBS </h4>
                        <p class="text-sm text-gray-700 mb-4">Platform pelapor yang ingin menyampaikan dugaan
                            pelanggaran secara aman dan rahasia.</p>
                        <div class="bg-orange-600 text-white px-4 py-2 rounded-full text-sm font-medium inline-flex items-center">
                            Kunjungi Portal
                            <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14">
                                </path>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Closing Statement -->
        <div class="bg-blue-600 text-white p-6 rounded-lg text-center">
            <h3 class="text-xl font-semibold mb-3">Komitmen</h3>
            <p class="leading-relaxed">
                Melalui sistem pengaduan terpadu ini, kami berupaya memastikan setiap suara masyarakat didengar,
                ditindaklanjuti, dan menjadi dasar perbaikan berkelanjutan dalam pelayanan publik di bidang bahasa
                dan sastra.
            </p>
        </div>
    </section>
@endsection
