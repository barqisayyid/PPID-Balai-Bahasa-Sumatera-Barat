@extends('main.app')

@section('content')
<section id="profil-pegawai" class="mb-12"
    x-data="{
        searchQuery: '',
        filter: 'semua',
        pegawaiList: {{ json_encode($pegawai) }},
        get filteredPegawai() {
            return this.pegawaiList.filter(p => {
                const matchesSearch = p.nama.toLowerCase().includes(this.searchQuery.toLowerCase()) || 
                                      p.jabatan.toLowerCase().includes(this.searchQuery.toLowerCase());
                const matchesFilter = this.filter === 'semua' || p.kategori === this.filter;
                return matchesSearch && matchesFilter;
            });
        },
        counts: {
            semua: {{ count($pegawai) }},
            pimpinan: {{ count(array_filter($pegawai, fn($p) => $p['kategori'] === 'pimpinan')) }},
            fungsional: {{ count(array_filter($pegawai, fn($p) => $p['kategori'] === 'fungsional')) }},
            pelaksana: {{ count(array_filter($pegawai, fn($p) => $p['kategori'] === 'pelaksana')) }},
            pppk: {{ count(array_filter($pegawai, fn($p) => $p['kategori'] === 'pppk')) }}
        },
        modalOpen: false,
        selectedPegawai: null,
        openModal(pegawai) {
            this.selectedPegawai = pegawai;
            this.modalOpen = true;
            document.body.style.overflow = 'hidden';
        },
        closeModal() {
            this.modalOpen = false;
            document.body.style.overflow = '';
        }
    }">

    <!-- Hero Banner with Minangkabau Motif -->
    <div class="w-screen relative left-1/2 -translate-x-1/2 bg-[#0F2A4A] overflow-hidden pt-20 pb-32 px-8 mt-[-2rem]">
        <!-- SVG Pattern Background (Songket / Kaluak Paku / Pucuak Rabuang stylized) -->
        <div class="absolute inset-0 opacity-10 pointer-events-none">
            <svg width="100%" height="100%" xmlns="http://www.w3.org/2000/svg">
                <defs>
                    <pattern id="minang-pattern-pegawai" x="0" y="0" width="60" height="60" patternUnits="userSpaceOnUse">
                        <path d="M30 0 L60 30 L30 60 L0 30 Z" fill="none" stroke="#FBBF24" stroke-width="1.5"/>
                        <path d="M30 10 L50 30 L30 50 L10 30 Z" fill="none" stroke="#FBBF24" stroke-width="1"/>
                        <path d="M30 20 L40 30 L30 40 L20 30 Z" fill="#FBBF24"/>
                        <circle cx="30" cy="0" r="3" fill="#FBBF24"/>
                        <circle cx="30" cy="60" r="3" fill="#FBBF24"/>
                        <circle cx="0" cy="30" r="3" fill="#FBBF24"/>
                        <circle cx="60" cy="30" r="3" fill="#FBBF24"/>
                    </pattern>
                </defs>
                <rect width="100%" height="100%" fill="url(#minang-pattern-pegawai)" />
            </svg>
        </div>

        <!-- Rumah Gadang Silhouette -->
        <div class="absolute bottom-0 right-0 left-0 flex justify-center opacity-10 pointer-events-none translate-y-8">
            <svg viewBox="0 0 800 150" class="w-full max-w-5xl text-amber-400" fill="currentColor" preserveAspectRatio="xMidYMax meet">
                <path d="M 400 100 Q 250 10 100 50 L 100 150 L 700 150 L 700 50 Q 550 10 400 100 Z" />
                <path d="M 400 60 Q 300 0 150 40 L 150 150 L 650 150 L 650 40 Q 500 0 400 60 Z" />
                <path d="M 400 20 Q 350 -10 250 20 L 250 150 L 550 150 L 550 20 Q 450 -10 400 20 Z" />
            </svg>
        </div>

<div class="relative z-10 text-center max-w-3xl mx-auto">
            <span class="inline-block text-amber-400 font-extrabold tracking-widest uppercase text-xs mb-4 border border-amber-400/50 px-4 py-1 rounded-full bg-amber-400/10 backdrop-blur-sm">
                Sumber Daya Manusia
            </span>
            <h2 class="text-4xl md:text-5xl font-black text-white mb-6 tracking-tight drop-shadow-lg">
                Profil Pegawai
            </h2>
            <p class="text-blue-100 text-lg font-medium opacity-90">Tim profesional yang berdedikasi tinggi untuk kemajuan bahasa dan sastra di wilayah Sumatera Barat.</p>
        </div>
    </div>

    <!-- Main Content Area -->
    <div class="relative px-0 pb-20 -mt-20 z-20">
        
        <!-- Search and Filter Bar -->
        <div class="bg-white p-6 rounded-2xl shadow-xl shadow-blue-900/5 border border-blue-50 flex flex-col lg:flex-row gap-6 justify-between items-center mb-12">
            
            <!-- Search -->
            <div class="relative w-full lg:w-96">
                <input type="text" x-model="searchQuery" placeholder="Cari nama atau jabatan..." class="w-full px-5 py-3.5 pl-12 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-amber-400 focus:bg-white transition-all font-medium text-gray-700">
                <svg class="absolute left-4 top-4 w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                </svg>
            </div>

            <!-- Filters -->
            <div class="flex flex-wrap justify-center lg:justify-end gap-2 w-full lg:w-auto">
                <button @click="filter = 'semua'" 
                    :class="filter === 'semua' ? 'bg-[#0F2A4A] text-amber-400 ring-2 ring-offset-2 ring-[#0F2A4A]' : 'bg-gray-100 text-gray-600 hover:bg-gray-200'" 
                    class="px-5 py-2.5 rounded-xl font-bold text-sm transition-all shadow-sm">
                    Semua <span class="ml-1 opacity-75" x-text="'('+counts.semua+')'"></span>
                </button>
                <button @click="filter = 'pimpinan'" 
                    :class="filter === 'pimpinan' ? 'bg-[#0F2A4A] text-amber-400 ring-2 ring-offset-2 ring-[#0F2A4A]' : 'bg-gray-100 text-gray-600 hover:bg-gray-200'" 
                    class="px-5 py-2.5 rounded-xl font-bold text-sm transition-all shadow-sm">
                    Pimpinan <span class="ml-1 opacity-75" x-text="'('+counts.pimpinan+')'"></span>
                </button>
                <button @click="filter = 'fungsional'" 
                    :class="filter === 'fungsional' ? 'bg-[#0F2A4A] text-amber-400 ring-2 ring-offset-2 ring-[#0F2A4A]' : 'bg-gray-100 text-gray-600 hover:bg-gray-200'" 
                    class="px-5 py-2.5 rounded-xl font-bold text-sm transition-all shadow-sm">
                    Fungsional <span class="ml-1 opacity-75" x-text="'('+counts.fungsional+')'"></span>
                </button>
                <button @click="filter = 'pelaksana'" 
                    :class="filter === 'pelaksana' ? 'bg-[#0F2A4A] text-amber-400 ring-2 ring-offset-2 ring-[#0F2A4A]' : 'bg-gray-100 text-gray-600 hover:bg-gray-200'" 
                    class="px-5 py-2.5 rounded-xl font-bold text-sm transition-all shadow-sm">
                    Pelaksana <span class="ml-1 opacity-75" x-text="'('+counts.pelaksana+')'"></span>
                </button>
                <button @click="filter = 'pppk'" 
                    :class="filter === 'pppk' ? 'bg-[#0F2A4A] text-amber-400 ring-2 ring-offset-2 ring-[#0F2A4A]' : 'bg-gray-100 text-gray-600 hover:bg-gray-200'" 
                    class="px-5 py-2.5 rounded-xl font-bold text-sm transition-all shadow-sm">
                    PPPK <span class="ml-1 opacity-75" x-text="'('+counts.pppk+')'"></span>
                </button>
            </div>
        </div>

        <!-- Pegawai Grid -->
        <div class="grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            <template x-for="p in filteredPegawai" :key="p.nama">
                <div @click="openModal(p)" class="group bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-xl hover:-translate-y-1.5 transition-all duration-300 cursor-pointer border border-gray-100/80 flex flex-col h-full relative">
                    
                    <!-- Decorative Batik Strip on Card -->
                    <div class="absolute top-0 right-0 w-full h-24 bg-[url('/images/motif-batik-sumbar.png')] bg-repeat-x bg-contain opacity-[0.03] pointer-events-none z-0"></div>

                    <div class="w-full h-64 bg-gradient-to-br from-blue-50 to-amber-50/30 flex items-center justify-center overflow-hidden relative z-10 p-2">
                        <!-- Photo Frame -->
                        <div class="w-48 h-48 rounded-full overflow-hidden border-4 border-white shadow-md bg-white relative group-hover:border-amber-100 transition-colors">
                            <template x-if="p.foto">
                                <img :src="p.foto" :alt="p.nama" class="w-full h-full object-cover object-top group-hover:scale-110 transition-transform duration-500">
                            </template>
                            <template x-if="!p.foto">
                                <div class="w-full h-full bg-blue-50 flex items-center justify-center text-blue-200">
                                    <svg class="w-16 h-16" fill="currentColor" viewBox="0 0 24 24"><path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/></svg>
                                </div>
                            </template>
                        </div>

                        <!-- Kategori Badge -->
                        <div class="absolute top-4 right-4">
                            <span x-text="p.kategori.toUpperCase()" class="text-[10px] font-black text-amber-600 bg-amber-100 px-2.5 py-1 rounded-full tracking-wider border border-amber-200"></span>
                        </div>
                    </div>
                    
                    <div class="p-6 flex-1 flex flex-col items-center text-center relative z-10 bg-white">
                        <h3 x-text="p.nama" class="font-extrabold text-gray-900 text-lg mb-2 line-clamp-2 leading-tight group-hover:text-[#0F2A4A] transition-colors"></h3>
                        <p x-text="p.jabatan" class="text-blue-600/90 text-sm font-semibold line-clamp-2 mb-3"></p>
                        
                        <div class="mt-auto pt-4 border-t border-gray-100 w-full flex justify-center">
                            <span class="inline-flex items-center gap-1.5 text-xs font-bold text-gray-500 bg-gray-50 px-3 py-1.5 rounded-lg">
                                <svg class="w-3.5 h-3.5 text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                                <span x-text="p.tim"></span>
                            </span>
                        </div>
                    </div>
                </div>
            </template>
            
            <!-- Empty state -->
            <template x-if="filteredPegawai.length === 0">
                <div class="col-span-full py-20 text-center bg-white rounded-2xl border border-dashed border-gray-300">
                    <svg class="w-20 h-20 text-gray-200 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                    <p class="text-gray-500 text-xl font-bold mb-1">Pencarian Tidak Ditemukan</p>
                    <p class="text-gray-400 text-sm">Coba gunakan kata kunci lain untuk mencari pegawai.</p>
                </div>
            </template>
        </div>
    </div>

    <!-- Modal Detail Pegawai (Minang Themed) -->
    <div x-show="modalOpen" class="fixed inset-0 bg-[#0F2A4A]/80 z-50 flex items-center justify-center p-4 backdrop-blur-sm" x-cloak style="display: none;">
        <div @click.away="closeModal()" class="bg-white rounded-3xl max-w-sm w-full overflow-hidden shadow-2xl relative" x-show="modalOpen" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 scale-90 translate-y-8" x-transition:enter-end="opacity-100 scale-100 translate-y-0" x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100 scale-100 translate-y-0" x-transition:leave-end="opacity-0 scale-95 translate-y-8">
            
            <!-- Close button -->
            <button @click="closeModal()" class="absolute top-4 right-4 w-10 h-10 bg-black/20 hover:bg-black/40 backdrop-blur-md rounded-full flex items-center justify-center text-white transition-all z-20">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12"></path></svg>
            </button>
            
            <div class="relative h-56 bg-[#0F2A4A] overflow-hidden">
                <!-- Motif -->
                <div class="absolute inset-0 bg-[url('/images/motif-batik-sumbar.png')] bg-repeat-x bg-contain opacity-20 z-0"></div>
                <div class="absolute inset-0 bg-gradient-to-t from-[#0F2A4A] to-transparent z-10"></div>
            </div>

            <div class="px-6 pb-10 pt-0 relative z-20" x-if="selectedPegawai">
                <!-- Avatar overlapping header -->
                <div class="w-56 h-56 bg-white rounded-full mx-auto -mt-28 mb-6 p-2 shadow-xl">
                    <div class="w-full h-full rounded-full overflow-hidden bg-blue-50">
                        <template x-if="selectedPegawai && selectedPegawai.foto">
                            <img :src="selectedPegawai.foto" :alt="selectedPegawai.nama" class="w-full h-full object-cover object-top">
                        </template>
                        <template x-if="selectedPegawai && !selectedPegawai.foto">
                            <svg class="w-full h-full text-blue-200 p-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/></svg>
                        </template>
                    </div>
                </div>

                <div class="text-center">
                    <span x-text="selectedPegawai?.kategori.toUpperCase()" class="inline-block text-[10px] font-black text-amber-600 bg-amber-50 px-3 py-1 rounded-full tracking-widest mb-3 border border-amber-100"></span>
                    <h3 x-text="selectedPegawai?.nama" class="text-2xl font-black text-gray-900 mb-2 leading-tight"></h3>
                    <p x-text="selectedPegawai?.jabatan" class="text-blue-700 font-bold text-[15px] mb-6 px-4"></p>
                    
                    <div class="bg-gray-50 rounded-2xl p-5 border border-gray-100 text-left">
                        <p class="text-xs uppercase tracking-widest text-gray-400 font-bold mb-1">Unit Kerja / Tim</p>
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-full bg-blue-100 flex items-center justify-center text-blue-600 flex-shrink-0">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                            </div>
                            <p x-text="selectedPegawai?.tim" class="text-gray-800 font-bold text-sm leading-snug"></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>
@endsection

