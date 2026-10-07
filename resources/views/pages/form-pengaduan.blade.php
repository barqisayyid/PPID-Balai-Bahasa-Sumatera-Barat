@extends('main.app')

@section('content')
<section id="form-pengaduan" class="mb-12">
    <!-- Hero Banner with Minangkabau Motif -->
    <div class="w-screen relative left-1/2 -translate-x-1/2 bg-[#0F2A4A] overflow-hidden pt-20 pb-40 px-8 mt-[-2rem]">
        <div class="absolute inset-0 opacity-10 pointer-events-none">
            <svg width="100%" height="100%" xmlns="http://www.w3.org/2000/svg">
                <defs>
                    <pattern id="minang-pattern-pengaduan" x="0" y="0" width="60" height="60" patternUnits="userSpaceOnUse">
                        <path d="M30 0 L60 30 L30 60 L0 30 Z" fill="none" stroke="#FBBF24" stroke-width="1.5"/>
                        <path d="M30 10 L50 30 L30 50 L10 30 Z" fill="none" stroke="#FBBF24" stroke-width="1"/>
                        <path d="M30 20 L40 30 L30 40 L20 30 Z" fill="#FBBF24"/>
                        <circle cx="30" cy="0" r="3" fill="#FBBF24"/>
                        <circle cx="30" cy="60" r="3" fill="#FBBF24"/>
                        <circle cx="0" cy="30" r="3" fill="#FBBF24"/>
                        <circle cx="60" cy="30" r="3" fill="#FBBF24"/>
                    </pattern>
                </defs>
                <rect width="100%" height="100%" fill="url(#minang-pattern-pengaduan)" />
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
                Pengaduan Masyarakat
            </h2>
            <p class="text-blue-100 text-lg font-medium opacity-90">Silakan lengkapi formulir di bawah ini untuk menyampaikan pengaduan terkait layanan informasi publik.</p>
        </div>
    </div>

    <!-- Main Content Area -->
    <div class="relative px-4 pb-20 md:px-8 max-w-5xl mx-auto -mt-24 z-20">
        
        <div class="bg-white rounded-3xl p-6 md:p-12 shadow-2xl shadow-[#0F2A4A]/10 border border-gray-100 mb-10 relative overflow-hidden">
            <div class="absolute top-0 right-0 w-full h-32 bg-[url('/images/motif-batik-sumbar.png')] bg-repeat-x bg-contain opacity-[0.02] pointer-events-none z-0"></div>
            
            <div class="relative z-10">

            <form id="pengaduan-form" action="{{ route('main.storepengaduan') }}" method="POST" enctype="multipart/form-data" class="space-y-8">
                @csrf
                {{-- Honeypot: harus kosong, jangan diisi --}}
<div class="hp-field" aria-hidden="true" tabindex="-1">
    <label for="_confirm_email_pengaduan">Jangan isi kolom ini</label>
    <input type="text" tabindex="-1" autocomplete="off" id="_confirm_email_pengaduan" name="_confirm_email" value="">
</div>
                <!-- Personal Information -->
                <div class="bg-gray-50 border border-gray-200 p-6 rounded-xl">
                    <div class="flex items-center gap-3 mb-5">
                        <span class="flex h-8 w-8 items-center justify-center rounded-lg bg-blue-600 text-white text-sm font-bold">1</span>
                        <h3 class="text-lg sm:text-xl font-semibold text-gray-800">Data Pengadu</h3>
                    </div>
     
                    <div class="grid md:grid-cols-2 gap-5">
                        <div>
                            <label for="pengaduan-nama" class="block text-sm font-medium text-gray-700 mb-1.5">Nama Lengkap <span class="text-[#0F2A4A]">*</span></label>
                            <input type="text" id="pengaduan-nama" name="nama" required="" class="w-full px-3.5 py-2.5 bg-white border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-amber-400 focus:border-amber-400 transition" placeholder="Masukkan nama lengkap">
                        </div>
     
                        <div>
                            <label for="pengaduan-pekerjaan" class="block text-sm font-medium text-gray-700 mb-1.5">Pekerjaan <span class="text-[#0F2A4A]">*</span></label>
                            <input type="text" id="pengaduan-pekerjaan" name="pekerjaan" required="" class="w-full px-3.5 py-2.5 bg-white border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-amber-400 focus:border-amber-400 transition" placeholder="Masukkan pekerjaan">
                        </div>
                    </div>
     
                    <div class="mt-5">
                        <label for="pengaduan-alamat" class="block text-sm font-medium text-gray-700 mb-1.5">Alamat Lengkap <span class="text-[#0F2A4A]">*</span></label>
                        <textarea id="pengaduan-alamat" name="alamat" rows="3" required="" class="w-full px-3.5 py-2.5 bg-white border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-amber-400 focus:border-amber-400 transition resize-none" placeholder="Masukkan alamat lengkap"></textarea>
                    </div>
     
                    <div class="grid md:grid-cols-2 gap-5 mt-5">
                        <div>
                            <label for="pengaduan-telepon" class="block text-sm font-medium text-gray-700 mb-1.5">Nomor Telepon <span class="text-[#0F2A4A]">*</span></label>
                            <input type="tel" id="pengaduan-telepon" name="no_hp" required="" class="w-full px-3.5 py-2.5 bg-white border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-amber-400 focus:border-amber-400 transition" placeholder="Contoh: 08123456789">
                        </div>
     
                        <div>
                            <label for="pengaduan-email" class="block text-sm font-medium text-gray-700 mb-1.5">Email <span class="text-[#0F2A4A]">*</span></label>
                            <input type="email" id="pengaduan-email" name="email" required="" class="w-full px-3.5 py-2.5 bg-white border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-amber-400 focus:border-amber-400 transition" placeholder="contoh@email.com">
                        </div>
                    </div>
                </div>
     
                <!-- Complaint Details -->
                <div class="bg-slate-50/70 border border-blue-100 p-6 rounded-xl">
                    <div class="flex items-center gap-3 mb-5">
                        <span class="flex h-8 w-8 items-center justify-center rounded-lg bg-blue-600 text-white text-sm font-bold">2</span>
                        <h3 class="text-lg sm:text-xl font-semibold text-blue-900">Rincian Pengaduan</h3>
                    </div>
     
                    <div class="grid md:grid-cols-2 gap-5 mb-5">
                        <div>
                            <label for="tanggal-kejadian" class="block text-sm font-medium text-gray-700 mb-1.5">Tanggal Kejadian <span class="text-[#0F2A4A]">*</span></label>
                            <input type="date" id="tanggal-kejadian" name="tgl_kejadian" required="" class="w-full px-3.5 py-2.5 bg-white border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-amber-400 focus:border-amber-400 transition">
                        </div>
     
                        <div>
                            <label for="jenis-pengaduan" class="block text-sm font-medium text-gray-700 mb-1.5">Jenis Pengaduan <span class="text-[#0F2A4A]">*</span></label>
                            <select id="jenis-pengaduan" name="jenis_kejadian" required="" class="w-full px-3.5 py-2.5 bg-white border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-amber-400 focus:border-amber-400 transition">
                                <option value="">Pilih jenis pengaduan</option>
                                <option value="pelayanan">Pelayanan Publik</option>
                                <option value="fasilitas">Fasilitas Kantor</option>
                                <option value="pegawai">Perilaku Pegawai</option>
                                <option value="informasi">Informasi Publik</option>
                                <option value="lainnya">Lainnya</option>
                            </select>
                        </div>
                    </div>
     
                    <div class="mb-5">
                        <label for="subjek-pengaduan" class="block text-sm font-medium text-gray-700 mb-1.5">Subjek Pengaduan <span class="text-[#0F2A4A]">*</span></label>
                        <input type="text" id="subjek-pengaduan" name="subjek_pengaduan" required="" class="w-full px-3.5 py-2.5 bg-white border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-amber-400 focus:border-amber-400 transition" placeholder="Masukkan subjek atau judul pengaduan">
                    </div>
     
                    <div class="mb-5">
                        <label for="uraian-pengaduan" class="block text-sm font-medium text-gray-700 mb-1.5">Uraian Pengaduan <span class="text-[#0F2A4A]">*</span></label>
                        <textarea id="uraian-pengaduan" name="uraian_pengaduan" rows="6" required="" class="w-full px-3.5 py-2.5 bg-white border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-amber-400 focus:border-amber-400 transition resize-none" placeholder="Jelaskan secara detail pengaduan Anda, termasuk kronologi kejadian, pihak yang terlibat, dan dampak yang dirasakan"></textarea>
                    </div>
     
                    <div class="mb-5">
                        <label for="harapan-penyelesaian" class="block text-sm font-medium text-gray-700 mb-1.5">Harapan Penyelesaian <span class="text-[#0F2A4A]">*</span></label>
                        <textarea id="harapan-penyelesaian" name="harapan" rows="4" required="" class="w-full px-3.5 py-2.5 bg-white border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-amber-400 focus:border-amber-400 transition resize-none" placeholder="Jelaskan harapan Anda terhadap penyelesaian pengaduan ini"></textarea>
                    </div>
     
                    <div>
                        <label for="cara-respon" class="block text-sm font-medium text-gray-700 mb-1.5">Cara Respon yang Diinginkan <span class="text-[#0F2A4A]">*</span></label>
                        <select id="cara-respon" name="respon" required="" class="w-full px-3.5 py-2.5 bg-white border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-amber-400 focus:border-amber-400 transition">
                            <option value="">Pilih cara respon</option>
                            <option value="email">Via Email</option>
                            <option value="telepon">Via Telepon</option>
                            <option value="surat">Via Surat</option>
                            <option value="langsung">Bertemu Langsung di Kantor</option>
                        </select>
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
                            <input id="persetujuan-pengaduan" name="persetujuan-pengaduan" type="checkbox" required="" class="mt-0.5 h-4 w-4 text-[#0F2A4A] focus:ring-amber-400 border-gray-300 rounded">
                            <label for="persetujuan-pengaduan" class="text-sm text-gray-700 leading-relaxed">
                                Saya menyatakan bahwa informasi yang saya berikan adalah benar dan dapat
                                dipertanggungjawabkan. Saya memahami bahwa pengaduan ini akan diproses sesuai dengan
                                prosedur yang berlaku dan saya bersedia dihubungi untuk klarifikasi lebih lanjut
                                jika diperlukan. <span class="text-[#0F2A4A]">*</span>
                            </label>
                        </div>
                    </div>
                </div>
     
                <!-- Submit Button -->
                <div class="flex flex-col-reverse sm:flex-row justify-end gap-3 pt-2 border-t border-gray-100">
                    <button type="button" onclick="resetPengaduanForm()" class="px-6 py-3 border border-gray-200 rounded-full text-gray-600 font-bold hover:bg-gray-50 hover:text-[#0F2A4A] focus:outline-none focus:ring-2 focus:ring-gray-300 transition-all">
                        Reset Form
                    </button>
                    <button type="submit" class="px-6 py-3 bg-gradient-to-r from-[#0F2A4A] to-blue-900 text-white font-bold tracking-wide rounded-full shadow-lg shadow-[#0F2A4A]/20 hover:shadow-xl hover:-translate-y-0.5 focus:outline-none focus:ring-2 focus:ring-amber-400 focus:ring-offset-2 transition-all border border-[#0F2A4A]/50 hover:border-amber-400">
                        Kirim Pengaduan
                    </button>
                </div>
            </form>
     
            <!-- Success Message -->
            <div id="pengaduan-message" class="hidden mt-6"></div>
            </div>
            </div>
            </div>
            </div>
        </div>
    </section>
@endsection




