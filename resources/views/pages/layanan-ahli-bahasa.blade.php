@extends('main.app')

@section('content')
<section id="layanan-ahli-bahasa" class="mb-12 bg-white p-8 rounded-lg shadow-md">
        <h2 class="text-3xl font-bold text-gray-800 mb-8">Informasi Layanan Ahli Bahasa</h2>

        <!-- Introduction -->
        <div class="bg-blue-50 border-l-4 border-blue-600 p-6 rounded-lg mb-8">
            <h3 class="text-xl font-semibold text-blue-800 mb-4 flex items-center">
                <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z">
                    </path>
                </svg>
                Tentang Layanan Ahli Bahasa
            </h3>
            <p class="text-blue-700 leading-relaxed mb-4">
                Balai Bahasa Provinsi Sumatera Barat menyediakan <strong>Layanan Ahli Bahasa</strong> sebagai bagian
                dari
                pelayanan publik di bidang kebahasaan dan kesastraan. Layanan ini ditujukan bagi masyarakat, lembaga
                pemerintahan, lembaga pendidikan, media, serta instansi lain yang memerlukan pendampingan atau
                konsultasi dalam pengembangan, pembinaan, dan pelindungan bahasa dan sastra.
            </p>
            <p class="text-blue-700 leading-relaxed">
                Melalui layanan ini, masyarakat dapat memperoleh bantuan dari tenaga ahli bahasa yang berpengalaman
                dalam berbagai bidang kebahasaan dan kesastraan.
            </p>
        </div>

        <!-- Jenis Layanan -->
        <div class="mb-8">
            <h3 class="text-2xl font-semibold text-gray-800 mb-6">Jenis Layanan yang Tersedia</h3>

            <div class="space-y-4">
                <!-- Layanan 1 -->
                <div class="bg-white border border-green-200 rounded-lg shadow-sm hover:shadow-md transition-shadow duration-300">
                    <div x-data="{ open: false }" class="p-6 cursor-pointer" @click="open = !open">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center mr-4">
                                    <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253">
                                        </path>
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="text-lg font-semibold text-green-800">Penyuluhan dan Pelatihan
                                        Kebahasaan</h4>
                                    <p class="text-green-600 text-sm">Meningkatkan kemahiran berbahasa Indonesia dan
                                        pemahaman kaidah bahasa</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Layanan 2 -->
                <div class="bg-white border border-green-200 rounded-lg shadow-sm hover:shadow-md transition-shadow duration-300">
                    <div x-data="{ open: false }" class="p-6 cursor-pointer" @click="open = !open">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center mr-4">
                                    <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z">
                                        </path>
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="text-lg font-semibold text-green-800">Penyuntingan Naskah dan Dokumen
                                        Resmi</h4>
                                    <p class="text-green-600 text-sm">Memastikan kesesuaian dengan kaidah bahasa
                                        Indonesia dan keterbacaan publik</p>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>

                <!-- Layanan 3 -->
                <div class="bg-white border border-green-200 rounded-lg shadow-sm hover:shadow-md transition-shadow duration-300">
                    <div x-data="{ open: false }" class="p-6 cursor-pointer" @click="open = !open">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center mr-4">
                                    <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10">
                                        </path>
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="text-lg font-semibold text-green-800">Pemateri dan Narasumber</h4>
                                    <p class="text-green-600 text-sm">Fasilitator di bidang pengembangan, pembinaan,
                                        dan pelindungan bahasa serta sastra</p>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>

                <!-- Layanan 4 -->
                <div class="bg-white border border-green-200 rounded-lg shadow-sm hover:shadow-md transition-shadow duration-300">
                    <div x-data="{ open: false }" class="p-6 cursor-pointer" @click="open = !open">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center mr-4">
                                    <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z">
                                        </path>
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="text-lg font-semibold text-green-800">Penjurian Lomba Kebahasaan dan
                                        Kesastraan</h4>
                                    <p class="text-green-600 text-sm">Untuk kegiatan pendidikan, literasi, dan
                                        apresiasi budaya</p>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>

                <!-- Layanan 5 -->
                <div class="bg-white border border-green-200 rounded-lg shadow-sm hover:shadow-md transition-shadow duration-300">
                    <div x-data="{ open: false }" class="p-6 cursor-pointer" @click="open = !open">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center mr-4">
                                    <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3">
                                        </path>
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="text-lg font-semibold text-green-800">Pendampingan Ahli Bahasa dalam
                                        Ranah Hukum</h4>
                                    <p class="text-green-600 text-sm">Penelaahan bahasa dalam peraturan
                                        perundang-undangan dan keterangan ahli</p>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>

        <!-- Prosedur Permohonan -->
        <div class="bg-gray-50 p-6 rounded-lg mb-8">
            <h3 class="text-xl font-semibold text-gray-800 mb-4 flex items-center">
                <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2">
                    </path>
                </svg>
                Prosedur Permohonan Layanan
            </h3>
            <div class="grid md:grid-cols-3 gap-6">
                <div class="bg-white p-4 rounded-lg border border-blue-200 text-center">
                    <div class="w-12 h-12 bg-blue-600 text-white rounded-full flex items-center justify-center mx-auto mb-3">
                        <span class="font-bold">1</span>
                    </div>
                    <h4 class="font-semibold text-gray-800 mb-2">Pengajuan Permohonan</h4>
                    <p class="text-sm text-gray-600">Ajukan permohonan melalui surat resmi atau email dengan
                        menyertakan detail kebutuhan layanan</p>
                </div>
                <div class="bg-white p-4 rounded-lg border border-blue-200 text-center">
                    <div class="w-12 h-12 bg-orange-600 text-white rounded-full flex items-center justify-center mx-auto mb-3">
                        <span class="font-bold">2</span>
                    </div>
                    <h4 class="font-semibold text-gray-800 mb-2">Koordinasi dan Konfirmasi</h4>
                    <p class="text-sm text-gray-600">Tim akan menghubungi pemohon untuk koordinasi jadwal dan teknis
                        pelaksanaan</p>
                </div>
                <div class="bg-white p-4 rounded-lg border border-green-200 text-center">
                    <div class="w-12 h-12 bg-green-600 text-white rounded-full flex items-center justify-center mx-auto mb-3">
                        <span class="font-bold">3</span>
                    </div>
                    <h4 class="font-semibold text-gray-800 mb-2">Pelaksanaan Layanan</h4>
                    <p class="text-sm text-gray-600">Ahli bahasa melaksanakan layanan sesuai kesepakatan dan
                        memberikan laporan hasil</p>
                </div>
            </div>
        </div>
    </section>
@endsection
