@extends('main.app')

@section('content')
<section id="form-permohonan" class="mb-12">
    <!-- Hero Banner with Minangkabau Motif -->
    <div class="w-screen relative left-1/2 -translate-x-1/2 bg-[#0F2A4A] overflow-hidden pt-20 pb-40 px-8 mt-[-2rem]">
        <div class="absolute inset-0 opacity-10 pointer-events-none">
            <svg width="100%" height="100%" xmlns="http://www.w3.org/2000/svg">
                <defs>
                    <pattern id="minang-pattern-form" x="0" y="0" width="60" height="60" patternUnits="userSpaceOnUse">
                        <path d="M30 0 L60 30 L30 60 L0 30 Z" fill="none" stroke="#FBBF24" stroke-width="1.5"/>
                        <path d="M30 10 L50 30 L30 50 L10 30 Z" fill="none" stroke="#FBBF24" stroke-width="1"/>
                        <path d="M30 20 L40 30 L30 40 L20 30 Z" fill="#FBBF24"/>
                        <circle cx="30" cy="0" r="3" fill="#FBBF24"/>
                        <circle cx="30" cy="60" r="3" fill="#FBBF24"/>
                        <circle cx="0" cy="30" r="3" fill="#FBBF24"/>
                        <circle cx="60" cy="30" r="3" fill="#FBBF24"/>
                    </pattern>
                </defs>
                <rect width="100%" height="100%" fill="url(#minang-pattern-form)" />
            </svg>
        </div>

        <div class="absolute bottom-0 right-0 left-0 flex justify-center opacity-10 pointer-events-none translate-y-8">
            <svg viewBox="0 0 800 150" class="w-full max-w-5xl text-amber-400" fill="currentColor" preserveAspectRatio="xMidYMax meet">
                <path d="M 400 100 Q 250 10 100 50 L 100 150 L 700 150 L 700 50 Q 550 10 400 100 Z" />
                <path d="M 400 60 Q 300 0 150 40 L 150 150 L 650 150 L 650 40 Q 500 0 400 60 Z" />
                <path d="M 400 20 Q 350 -10 250 20 L 250 150 L 550 150 L 550 20 Q 450 -10 400 20 Z" />
            </svg>
        </div>

<div class="relative z-10 text-center max-w-3xl mx-auto">
            <span class="inline-block text-amber-400 font-extrabold tracking-widest uppercase text-xs mb-4 border border-amber-400/50 px-4 py-1 rounded-full bg-amber-400/10 backdrop-blur-sm">
                Layanan Publik
            </span>
            <h2 class="text-4xl md:text-5xl font-black text-white mb-6 tracking-tight drop-shadow-lg">
                Permohonan Informasi
            </h2>
            <p class="text-blue-100 text-lg font-medium opacity-90">Silakan lengkapi formulir di bawah ini untuk mengajukan permohonan informasi publik kepada Balai Bahasa Provinsi Sumatera Barat.</p>
        </div>
    </div>

    <!-- Main Content Area -->
    <div class="relative px-4 pb-20 md:px-8 max-w-5xl mx-auto -mt-24 z-20">
        
        <div class="bg-white rounded-3xl p-6 md:p-12 shadow-2xl shadow-[#0F2A4A]/10 border border-gray-100 mb-10 relative overflow-hidden">
            <div class="absolute top-0 right-0 w-full h-32 bg-[url('/images/motif-batik-sumbar.png')] bg-repeat-x bg-contain opacity-[0.02] pointer-events-none z-0"></div>
            
            <div class="relative z-10">

              <!-- Download Template Section -->
            <div class="bg-slate-50 border border-blue-200 rounded-xl p-6 mb-8">
                <h3 class="text-lg font-semibold text-blue-900 mb-3 flex items-center gap-2">
                    <span class="flex h-8 w-8 items-center justify-center rounded-lg bg-blue-600 text-white shrink-0">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                            </path>
                        </svg>
                    </span>
                    Unduh Template Formulir
                </h3>
                <p class="text-gray-600 mb-4 text-sm sm:text-base">Anda dapat mengunduh template formulir dalam format PDF atau Word untuk
                    diisi secara manual</p>
                <div class="flex flex-wrap gap-3">
                    <button id="download-word" class="bg-white text-blue-700 px-4 py-2.5 rounded-lg font-medium border border-blue-300 shadow-sm hover:bg-slate-50 hover:shadow-md transition flex items-center">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                            </path>
                        </svg>
                        Unduh Template
                    </button>
                </div>
            </div>
     
            <!-- Online Form -->
            <form id="permohonan-form" action="{{ route('main.storepermohonan') }}" method="POST" enctype="multipart/form-data" class="space-y-8">
                @csrf
                {{-- Honeypot: harus kosong, jangan diisi --}}
<div class="hp-field" aria-hidden="true" tabindex="-1">
    <label for="_confirm_email_permohonan">Jangan isi kolom ini</label>
    <input type="text" tabindex="-1" autocomplete="off" id="_confirm_email_permohonan" name="_confirm_email" value="">
</div>
                <!-- Personal Information -->
                <div class="bg-gray-50 border border-gray-200 p-6 rounded-xl">
                    <div class="flex items-center gap-3 mb-5">
                        <span class="flex h-8 w-8 items-center justify-center rounded-lg bg-blue-600 text-white text-sm font-bold">1</span>
                        <h3 class="text-lg sm:text-xl font-semibold text-gray-800">Data Pemohon</h3>
                    </div>
     
                    <div class="grid md:grid-cols-2 gap-5">
                        <div>
                            <label for="nama" class="block text-sm font-medium text-gray-700 mb-1.5">Nama Lengkap <span class="text-[#0F2A4A]">*</span></label>
                            <input type="text" id="nama" name="nama" required="" class="w-full px-3.5 py-2.5 bg-white border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-amber-400 focus:border-amber-400 transition" placeholder="Masukkan nama lengkap">
                        </div>
     
                        <div>
                            <label for="pekerjaan" class="block text-sm font-medium text-gray-700 mb-1.5">Pekerjaan <span class="text-[#0F2A4A]">*</span></label>
                            <input type="text" id="pekerjaan" name="pekerjaan" required="" class="w-full px-3.5 py-2.5 bg-white border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-amber-400 focus:border-amber-400 transition" placeholder="Masukkan pekerjaan">
                        </div>
                    </div>
     
                    <div class="mt-5">
                        <label for="alamat" class="block text-sm font-medium text-gray-700 mb-1.5">Alamat Lengkap <span class="text-[#0F2A4A]">*</span></label>
                        <textarea id="alamat" name="alamat" rows="3" required="" class="w-full px-3.5 py-2.5 bg-white border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-amber-400 focus:border-amber-400 transition resize-none" placeholder="Masukkan alamat lengkap"></textarea>
                    </div>
     
                    <div class="grid md:grid-cols-2 gap-5 mt-5">
                        <div>
                            <label for="telepon" class="block text-sm font-medium text-gray-700 mb-1.5">Nomor Telepon <span class="text-[#0F2A4A]">*</span></label>
                            <input type="tel" id="telepon" name="no_hp" required="" class="w-full px-3.5 py-2.5 bg-white border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-amber-400 focus:border-amber-400 transition" placeholder="Contoh: 08123456789">
                        </div>
     
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700 mb-1.5">Email <span class="text-[#0F2A4A]">*</span></label>
                            <input type="email" id="email" name="email" required="" class="w-full px-3.5 py-2.5 bg-white border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-amber-400 focus:border-amber-400 transition" placeholder="contoh@email.com">
                        </div>
                    </div>
                </div>
     
                <!-- Information Request Details -->
                <div class="bg-slate-50/70 border border-blue-100 p-6 rounded-xl">
                    <div class="flex items-center gap-3 mb-5">
                        <span class="flex h-8 w-8 items-center justify-center rounded-lg bg-blue-600 text-white text-sm font-bold">2</span>
                        <h3 class="text-lg sm:text-xl font-semibold text-blue-900">Rincian Permohonan Informasi</h3>
                    </div>
     
                    <div class="mb-5">
                        <label for="rincian-informasi" class="block text-sm font-medium text-gray-700 mb-1.5">Rincian Informasi yang Dibutuhkan <span class="text-[#0F2A4A]">*</span></label>
                        <textarea id="rincian-informasi" name="rincian" rows="4" required="" class="w-full px-3.5 py-2.5 bg-white border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-amber-400 focus:border-amber-400 transition resize-none" placeholder="Jelaskan secara detail informasi yang Anda butuhkan"></textarea>
                    </div>
     
                    <div class="mb-5">
                        <label for="tujuan-penggunaan" class="block text-sm font-medium text-gray-700 mb-1.5">Tujuan Penggunaan Informasi <span class="text-[#0F2A4A]">*</span></label>
                        <textarea id="tujuan-penggunaan" name="tujuan" rows="4" required="" class="w-full px-3.5 py-2.5 bg-white border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-amber-400 focus:border-amber-400 transition resize-none" placeholder="Jelaskan tujuan penggunaan informasi yang dimohon"></textarea>
                    </div>
     
                    <div>
                        <label for="cara-pengiriman" class="block text-sm font-medium text-gray-700 mb-1.5">Cara Pengiriman Informasi <span class="text-[#0F2A4A]">*</span></label>
                        <select id="cara-pengiriman" name="respon" required="" class="w-full px-3.5 py-2.5 bg-white border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-amber-400 focus:border-amber-400 transition">
                            <option value="">Pilih cara pengiriman</option>
                            <option value="langsung">Diambil Langsung di Kantor</option>
                            <option value="email">Dikirim via Email</option>
                            <option value="pos">Dikirim via Pos</option>
                            <option value="kurir">Dikirim via Kurir</option>
                        </select>
                    </div>
                </div>
     
                <!-- File Upload Section -->
                <div class="bg-gray-50 border border-gray-200 p-6 rounded-xl">
                    <div class="flex items-center gap-3 mb-5">
                        <span class="flex h-8 w-8 items-center justify-center rounded-lg bg-blue-600 text-white text-sm font-bold">3</span>
                        <h3 class="text-lg sm:text-xl font-semibold text-gray-800">Unggah Dokumen Pendukung</h3>
                    </div>
     
                    <div class="grid md:grid-cols-1 gap-6">
                        <div>
                            <label for="surat-permohonan" class="block text-sm font-medium text-gray-700 mb-2">Surat Permohonan (Opsional)</label>
                            <div class="border-2 border-dashed border-gray-300 bg-white rounded-xl p-5 text-center hover:border-blue-400 hover:bg-slate-50/30 transition-colors">
                                <input type="file" id="surat-permohonan" name="dokumen" accept=".pdf,.doc,.docx,.jpg,.jpeg,.png" class="hidden">
                                <label for="surat-permohonan" class="cursor-pointer">
                                    <svg class="mx-auto h-10 w-10 text-blue-400" stroke="currentColor" fill="none" viewBox="0 0 48 48">
                                        <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                    </svg>
                                    <div class="mt-2">
                                        <p class="text-sm font-medium text-gray-700">Klik untuk unggah file</p>
                                        <p class="text-xs text-gray-500 mt-0.5">PDF, DOC, DOCX, JPG, PNG (Max 5MB)</p>
                                    </div>
                                </label>
                            </div>
                            <div id="surat-permohonan-preview" class="mt-2 hidden">
                                <div class="flex items-center justify-between bg-slate-50 border border-blue-200 p-2.5 rounded-lg">
                                    <span class="text-sm text-blue-700" id="surat-permohonan-name"></span>
                                    <button type="button" onclick="removeFile('surat-permohonan')" class="text-red-500 hover:text-red-700">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
     
                        
                    </div>
                </div>
     
                <!-- Agreement Section -->
                <div class="bg-sky-50 border border-sky-200 rounded-xl p-5">
                    <div class="flex gap-3">
                        <div class="flex-shrink-0 mt-0.5">
                            <svg class="h-5 w-5 text-sky-500" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <div class="flex items-start gap-2.5">
                            <input id="persetujuan" name="persetujuan" type="checkbox" required="" class="mt-0.5 h-4 w-4 text-[#0F2A4A] focus:ring-amber-400 border-gray-300 rounded">
                            <label for="persetujuan" class="text-sm text-gray-700 leading-relaxed">
                                Saya menyatakan bahwa informasi yang saya berikan adalah benar dan saya bertanggung
                                jawab atas kebenaran data tersebut. Saya memahami bahwa permohonan ini akan diproses
                                sesuai dengan ketentuan yang berlaku. <span class="text-[#0F2A4A]">*</span>
                            </label>
                        </div>
                    </div>
                </div>
     
                <!-- Submit Button -->
                <div class="flex flex-col-reverse sm:flex-row justify-end gap-3 pt-2 border-t border-gray-100">
                    <button type="button" onclick="resetForm()" class="px-6 py-3 border border-gray-200 rounded-full text-gray-600 font-bold hover:bg-gray-50 hover:text-[#0F2A4A] focus:outline-none focus:ring-2 focus:ring-gray-300 transition-all">
                        Reset Form
                    </button>
                    <button type="submit" class="px-6 py-3 bg-gradient-to-r from-[#0F2A4A] to-blue-900 text-white font-bold tracking-wide rounded-full shadow-lg shadow-[#0F2A4A]/20 hover:shadow-xl hover:-translate-y-0.5 focus:outline-none focus:ring-2 focus:ring-amber-400 focus:ring-offset-2 transition-all border border-[#0F2A4A]/50 hover:border-amber-400">
                        Kirim Permohonan
                    </button>
                </div>
            </form>
     
            <!-- Success Message -->
            <div id="permohonan-message" class="hidden mt-6"></div>
            </div>
            </div>
        </div>
    </section>
@endsection




