@extends('main.app')

@section('content')
<section id="satu-data" class="mb-12 bg-white p-8 rounded-lg shadow-md">
        <h2 class="text-3xl font-bold text-gray-800 mb-8">Satu Data Indonesia</h2>

        <!-- Introduction -->
        <div class="bg-gradient-to-r from-blue-50 to-indigo-50 border-l-4 border-blue-600 p-6 rounded-lg mb-8">
            <h3 class="text-xl font-semibold text-blue-800 mb-4 flex items-center">
                <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z">
                    </path>
                </svg>
                Komitmen Satu Data Indonesia
            </h3>
            <p class="text-gray-700 leading-relaxed mb-4">
                Balai Bahasa Provinsi Sumatera Barat mendukung pelaksanaan <strong>Kebijakan Satu Data Indonesia
                    (SDI)</strong> sebagaimana diamanatkan dalam <strong>Peraturan Presiden Nomor 39 Tahun 2019
                    tentang Satu Data Indonesia</strong>. Kebijakan ini bertujuan mewujudkan tata kelola data
                pemerintah yang akurat, mutakhir, terpadu, dan dapat dipertanggungjawabkan, serta mudah diakses dan
                dibagipakaikan antarinstansi dan masyarakat.
            </p>
            <p class="text-gray-700 leading-relaxed">
                Sebagai Unit Pelaksana Teknis Kementerian Pendidikan Dasar dan Menengah di bawah Badan Pengembangan
                dan Pembinaan Bahasa, Balai Bahasa Provinsi Sumatera Barat berperan dalam menyediakan data dan informasi
                kebahasaan, kesastraan, dan literasi yang mendukung sektor pendidikan serta pembangunan kebudayaan
                di daerah. Data tersebut menjadi bagian dari ekosistem Satu Data Indonesia yang dikelola melalui
                Portal Data Pendidikan di bawah Kementerian Pendidikan Dasar dan Menengah.
            </p>
        </div>

        <!-- Kontribusi Data -->
        <div class="bg-green-50 p-6 rounded-lg mb-8">
            <h3 class="text-xl font-semibold text-green-800 mb-4 flex items-center">
                <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253">
                    </path>
                </svg>
                Kontribusi Data Kebahasaan dan Kesastraan
            </h3>
            <p class="text-gray-700 leading-relaxed mb-4">
                Sebagai wujud keterlibatan dalam sistem data nasional, Balai Bahasa Provinsi Sumatera Barat juga
                berkontribusi melalui <strong>Data Pokok Kebahasaan dan Kesastraan (DPKK)</strong> yang dapat
                diakses melalui <a href="https://dapobas.kemendikdasmen.go.id/" target="_blank" rel="noopener noreferrer" class="text-green-600 hover:text-green-800 underline font-medium">dapobas.kemendikdasmen.go.id</a>
                serta <strong>Laboratorium Kebinekaan Bahasa dan Sastra</strong> di <a href="https://labbineka.kemendikdasmen.go.id/" target="_blank" rel="noopener noreferrer" class="text-green-600 hover:text-green-800 underline font-medium">labbineka.kemendikdasmen.go.id</a>.
            </p>
            <p class="text-gray-700 leading-relaxed">
                Kedua platform ini menyediakan data terbuka mengenai penelitian, pemetaan, dan pelindungan bahasa
                serta sastra di Indonesia, termasuk di wilayah Sumatera Barat.
            </p>
        </div>

        <!-- Portal Akses Data -->
        <div class="mb-8">
            <h3 class="text-2xl font-semibold text-gray-800 mb-6 text-center">Portal Akses Data Pemerintah</h3>
            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- Satu Data Indonesia -->
                <div class="bg-gradient-to-br from-blue-50 to-blue-100 border border-blue-200 rounded-lg p-6 hover:shadow-lg transition-all duration-300 cursor-pointer transform hover:scale-105" onclick="window.open('https://data.go.id/', '_blank')">
                    <div class="text-center">
                        <div class="w-16 h-16 bg-blue-600 rounded-full flex items-center justify-center mx-auto mb-4">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z">
                                </path>
                            </svg>
                        </div>
                        <h4 class="text-lg font-semibold text-blue-800 mb-2">Satu Data Indonesia</h4>
                        <p class="text-sm text-gray-700 mb-4">Portal utama data pemerintah Indonesia yang
                            menyediakan akses terpadu ke berbagai dataset nasional</p>
                        <div class="bg-blue-600 text-white px-4 py-2 rounded-full text-sm font-medium inline-flex items-center">
                            Kunjungi Portal
                            <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14">
                                </path>
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Portal Data Pendidikan -->
                <div class="bg-gradient-to-br from-green-50 to-green-100 border border-green-200 rounded-lg p-6 hover:shadow-lg transition-all duration-300 cursor-pointer transform hover:scale-105" onclick="window.open('https://data.kemendikdasmen.go.id/', '_blank')">
                    <div class="text-center">
                        <div class="w-16 h-16 bg-green-600 rounded-full flex items-center justify-center mx-auto mb-4">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253">
                                </path>
                            </svg>
                        </div>
                        <h4 class="text-lg font-semibold text-green-800 mb-2">Portal Data Pendidikan</h4>
                        <p class="text-sm text-gray-700 mb-4">Data dan statistik pendidikan nasional dari
                            Kementerian Pendidikan Dasar dan Menengah</p>
                        <div class="bg-green-600 text-white px-4 py-2 rounded-full text-sm font-medium inline-flex items-center">
                            Kunjungi Portal
                            <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14">
                                </path>
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Data Pokok Kebahasaan dan Kesastraan -->
                <div class="bg-gradient-to-br from-purple-50 to-purple-100 border border-purple-200 rounded-lg p-6 hover:shadow-lg transition-all duration-300 cursor-pointer transform hover:scale-105" onclick="window.open('https://dapobas.kemendikdasmen.go.id/', '_blank')">
                    <div class="text-center">
                        <div class="w-16 h-16 bg-purple-600 rounded-full flex items-center justify-center mx-auto mb-4">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 14v3m4-3v3m4-3v3M3 21h18M3 10h18M3 7l9-4 9 4M4 10h16v11H4V10z"></path>
                            </svg>
                        </div>
                        <h4 class="text-lg font-semibold text-purple-800 mb-2">Data Pokok Kebahasaan</h4>
                        <p class="text-sm text-gray-700 mb-4">Database komprehensif bahasa dan sastra Indonesia
                            serta daerah dari Badan Bahasa</p>
                        <div class="bg-purple-600 text-white px-4 py-2 rounded-full text-sm font-medium inline-flex items-center">
                            Kunjungi Portal
                            <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14">
                                </path>
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Lab Kebinekaan -->
                <div class="bg-gradient-to-br from-orange-50 to-orange-100 border border-orange-200 rounded-lg p-6 hover:shadow-lg transition-all duration-300 cursor-pointer transform hover:scale-105" onclick="window.open('https://labbineka.kemendikdasmen.go.id/', '_blank')">
                    <div class="text-center">
                        <div class="w-16 h-16 bg-orange-600 rounded-full flex items-center justify-center mx-auto mb-4">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9">
                                </path>
                            </svg>
                        </div>
                        <h4 class="text-lg font-semibold text-orange-800 mb-2">Lab Kebinekaan</h4>
                        <p class="text-sm text-gray-700 mb-4">Laboratorium penelitian dan pemetaan kebinekaan bahasa
                            dan sastra Indonesia</p>
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

        <!-- Manfaat dan Komitmen -->
        <div class="bg-gray-50 p-6 rounded-lg mb-8">
            <h3 class="text-xl font-semibold text-gray-800 mb-4 flex items-center">
                <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                Manfaat Satu Data untuk Masyarakat
            </h3>
            <div class="grid md:grid-cols-3 gap-6">
                <div class="bg-white p-4 rounded-lg border border-gray-200">
                    <div class="flex items-center mb-3">
                        <div class="w-10 h-10 bg-blue-100 rounded-full flex items-center justify-center mr-3">
                            <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2">
                                </path>
                            </svg>
                        </div>
                        <h4 class="font-semibold text-gray-800">Riset dan Penelitian</h4>
                    </div>
                    <p class="text-sm text-gray-600">Data terbuka mendukung penelitian akademik dan pengembangan
                        ilmu pengetahuan di bidang kebahasaan dan kesastraan</p>
                </div>

                <div class="bg-white p-4 rounded-lg border border-gray-200">
                    <div class="flex items-center mb-3">
                        <div class="w-10 h-10 bg-green-100 rounded-full flex items-center justify-center mr-3">
                            <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253">
                                </path>
                            </svg>
                        </div>
                        <h4 class="font-semibold text-gray-800">Pendidikan</h4>
                    </div>
                    <p class="text-sm text-gray-600">Menyediakan sumber belajar dan referensi untuk pendidik, siswa,
                        dan masyarakat umum</p>
                </div>

                <div class="bg-white p-4 rounded-lg border border-gray-200">
                    <div class="flex items-center mb-3">
                        <div class="w-10 h-10 bg-purple-100 rounded-full flex items-center justify-center mr-3">
                            <svg class="w-5 h-5 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z">
                                </path>
                            </svg>
                        </div>
                        <h4 class="font-semibold text-gray-800">Pengambilan Kebijakan</h4>
                    </div>
                    <p class="text-sm text-gray-600">Data akurat mendukung perumusan kebijakan berbasis bukti di
                        bidang bahasa dan sastra</p>
                </div>
            </div>
        </div>

        <!-- Closing Statement -->
        <div class="bg-blue-600 text-white p-6 rounded-lg text-center">
            <h3 class="text-xl font-semibold mb-3">Komitmen Keterbukaan Data</h3>
            <p class="leading-relaxed">
                Melalui keterlibatan dalam Satu Data, Balai Bahasa Provinsi Sumatera Barat berkomitmen untuk memperkuat
                prinsip keterbukaan informasi publik, memastikan bahwa data dan informasi yang dikelola dapat
                dimanfaatkan secara luas untuk riset, pendidikan, dan pengambilan kebijakan. Masyarakat dapat
                mengakses berbagai data pendidikan melalui Portal Satu Data Indonesia di <a href="https://data.go.id/" target="_blank" rel="noopener noreferrer" class="text-blue-200 hover:text-white underline font-medium">data.go.id</a> dan Portal Data
                Pendidikan di <a href="https://data.kemendikdasmen.go.id/" target="_blank" rel="noopener noreferrer" class="text-blue-200 hover:text-white underline font-medium">data.kemendikdasmen.go.id</a>.
            </p>
        </div>
    </section>
@endsection
