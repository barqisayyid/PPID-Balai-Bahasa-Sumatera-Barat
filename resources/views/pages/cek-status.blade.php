@extends('main.app')

@section('content')
<section id="cek-status" class="mb-12">
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
                Cek Status Pengajuan
            </h2>
            <p class="text-blue-100 text-lg font-medium opacity-90">Masukkan Email Anda untuk melihat semua riwayat pengajuan, atau tambahkan Nomor Registrasi jika ingin mencari pengajuan secara spesifik.</p>
        </div>
    </div>

    <!-- Main Content Area -->
    <div class="relative px-4 pb-20 md:px-8 max-w-4xl mx-auto -mt-24 z-20">
        
        <div class="bg-white rounded-3xl p-6 md:p-12 shadow-2xl shadow-[#0F2A4A]/10 border border-gray-100 mb-10 relative overflow-hidden">
            <div class="absolute top-0 right-0 w-full h-32 bg-[url('/images/motif-batik-sumbar.png')] bg-repeat-x bg-contain opacity-[0.02] pointer-events-none z-0"></div>
            
            <div class="relative z-10">
                <!-- Form Pencarian -->
                <form action="{{ route('cek-status') }}" method="GET" class="space-y-6 mb-8">
                    @if($error)
                    <div class="bg-red-50 border-l-4 border-red-500 p-4 mb-6 rounded-r-lg">
                        <div class="flex">
                            <div class="flex-shrink-0">
                                <svg class="h-5 w-5 text-red-400" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                                </svg>
                            </div>
                            <div class="ml-3">
                                <p class="text-sm text-red-700">{{ $error }}</p>
                            </div>
                        </div>
                    </div>
                    @endif

                    <div class="grid md:grid-cols-2 gap-5">
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700 mb-1.5">Email Terdaftar <span class="text-[#0F2A4A]">*</span></label>
                            <input type="email" id="email" name="email" value="{{ $email ?? '' }}" required class="w-full px-3.5 py-2.5 bg-white border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-amber-400 focus:border-amber-400 transition" placeholder="contoh@email.com">
                        </div>
                        <div>
                            <label for="nomor" class="block text-sm font-medium text-gray-700 mb-1.5">Nomor Registrasi <span class="text-gray-400 font-normal">(Opsional)</span></label>
                            <input type="text" id="nomor" name="nomor" value="{{ $nomor ?? '' }}" class="w-full px-3.5 py-2.5 bg-white border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-amber-400 focus:border-amber-400 transition" placeholder="Contoh: PMH-20261007-ABCDEF">
                        </div>
                    </div>
                    
                    <div class="flex justify-end pt-2">
                        <button type="submit" class="w-full md:w-auto px-8 py-3 bg-gradient-to-r from-[#0F2A4A] to-blue-900 text-white font-bold tracking-wide rounded-full shadow-lg shadow-[#0F2A4A]/20 hover:shadow-xl hover:-translate-y-0.5 focus:outline-none focus:ring-2 focus:ring-amber-400 focus:ring-offset-2 transition-all border border-[#0F2A4A]/50 hover:border-amber-400 flex items-center justify-center gap-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                            Cari Pengajuan
                        </button>
                    </div>
                </form>

                <!-- Hasil Pencarian -->
                @if(isset($items) && $items->isNotEmpty())
                <div class="mt-10 border-t border-gray-100 pt-8 animate-fade-in-up">
                    <h3 class="text-xl font-bold text-[#0F2A4A] mb-6">Ditemukan {{ $items->count() }} Pengajuan</h3>
                    
                    <div class="space-y-6">
                        @foreach($items as $item)
                        <div class="bg-gray-50 rounded-2xl p-6 md:p-8 border border-gray-200 shadow-sm hover:shadow-md transition-shadow">
                            <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4 mb-6">
                                <div>
                                    <p class="text-sm text-gray-500 font-medium mb-1">{{ $item->jenis_layanan }}</p>
                                    <h3 class="text-xl font-bold text-[#0F2A4A]">{{ $item->no_registrasi }}</h3>
                                </div>
                                <div>
                                    @php
                                        $statusColor = match($item->status) {
                                            'diterima' => 'bg-gray-200 text-gray-800 border-gray-300',
                                            'diproses' => 'bg-amber-100 text-amber-800 border-amber-300',
                                            'selesai' => 'bg-green-100 text-green-800 border-green-300',
                                            'ditolak' => 'bg-red-100 text-red-800 border-red-300',
                                            default => 'bg-gray-100 text-gray-800 border-gray-200'
                                        };
                                        $statusLabel = match($item->status) {
                                            'diterima' => 'Diterima',
                                            'diproses' => 'Sedang Diproses',
                                            'selesai' => 'Selesai',
                                            'ditolak' => 'Ditolak',
                                            default => ucfirst($item->status)
                                        };
                                    @endphp
                                    <span class="px-4 py-1.5 rounded-full text-sm font-bold border shadow-sm {{ $statusColor }}">
                                        {{ $statusLabel }}
                                    </span>
                                </div>
                            </div>

                            <div class="grid md:grid-cols-2 gap-6 mb-6">
                                <div>
                                    <p class="text-sm text-gray-500 mb-1">Tanggal Pengajuan</p>
                                    <p class="font-medium text-gray-800">{{ $item->created_at->format('d F Y, H:i') }}</p>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-500 mb-1">Nama Pemohon</p>
                                    <p class="font-medium text-gray-800">{{ $item->nama }}</p>
                                </div>
                            </div>

                            @if($item->tanggapan)
                            <div class="mt-6 bg-white border border-blue-100 rounded-xl p-5 shadow-sm">
                                <h4 class="text-sm font-bold text-blue-900 mb-3 flex items-center gap-2">
                                    <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"></path>
                                    </svg>
                                    Tanggapan / Keterangan Admin
                                </h4>
                                <p class="text-gray-700 whitespace-pre-line">{{ $item->tanggapan }}</p>
                                
                                @if($item->ditanggapi_at)
                                <p class="text-xs text-gray-400 mt-4 text-right">
                                    Ditanggapi pada: {{ $item->ditanggapi_at->format('d F Y, H:i') }}
                                </p>
                                @endif
                            </div>
                            @else
                            <div class="mt-6 bg-yellow-50 border border-yellow-100 rounded-xl p-4 shadow-sm">
                                <p class="text-sm text-yellow-800 text-center flex items-center justify-center gap-2">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                    Belum ada tanggapan dari tim Admin.
                                </p>
                            </div>
                            @endif
                        </div>
                        @endforeach
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</section>

<style>
    .animate-fade-in-up {
        animation: fadeInUp 0.5s ease-out forwards;
    }
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
</style>
@endsection
