<?php
$menus = [
    [
        'label' => 'Beranda',
        'url' => '/',
        'children' => []
    ],
    [
        'label' => 'Profil',
        'url' => '/profil-lembaga',
        'children' => [
            ['label' => 'Profil Lembaga', 'url' => '/profil-lembaga'],
            ['label' => 'Profil Pegawai', 'url' => '/profil-pegawai'],
            ['label' => 'Tugas dan Fungsi', 'url' => '/tugas-fungsi'],
            ['label' => 'Visi dan Misi', 'url' => '/visi-misi'],
            ['label' => 'Struktur Organisasi', 'url' => '/struktur-organisasi'],
            ['label' => 'Struktur PPID', 'url' => '/struktur-ppid'],
        ]
    ],
    [
        'label' => 'Informasi Publik',
        'url' => '/informasi-publik',
        'children' => [
            ['label' => 'Informasi Berkala', 'url' => '/berkala'],
            ['label' => 'Informasi Program', 'url' => '/program-kegiatan'],
            ['label' => 'Informasi Agenda Kegiatan', 'url' => '/agenda-kegiatan'],
            ['label' => 'Informasi Kebijakan', 'url' => '/regulasi'],
            ['label' => 'Informasi Data Statistik', 'url' => '/capaian'],
            ['label' => 'Informasi Keuangan', 'url' => '/keuangan'],
        ]
    ],
    [
        'label' => 'Layanan Informasi',
        'url' => '/layanan-informasi',
        'children' => [
            ['label' => 'Formulir Permohonan Data', 'url' => '/form-permohonan'],
            ['label' => 'Formulir Keberatan', 'url' => '/form-keberatan'],
            ['label' => 'Formulir Pengaduan', 'url' => '/form-pengaduan'],
        ]
    ],
    [
        'label' => 'Pengaduan',
        'url' => '/pengaduan',
        'children' => [
            ['label' => 'LAPOR!', 'url' => 'https://kemendikdasmen.lapor.go.id/', 'target' => '_blank'],
            ['label' => 'SIPPN', 'url' => 'https://sippn.menpan.go.id/', 'target' => '_blank'],
            ['label' => 'WBS', 'url' => 'http://kemendikdasmen.com/wbs-sub/', 'target' => '_blank'],
        ]
    ],
    [
        'label' => 'Tata Cara',
        'url' => '#',
        'children' => [
            ['label' => 'Permohonan Informasi', 'url' => 'https://drive.google.com/file/d/1PMtoGA_8BWApYExx2JxVdYV6MvFbtXFk/view', 'target' => '_blank'],
            ['label' => 'Pengajuan Keberatan', 'url' => 'https://drive.google.com/file/d/1VlLXNILjGcKjlBsoiEEXYg-FwX5E6XaQ/view', 'target' => '_blank'],
        ]
    ],
    [
        'label' => 'Satu Data',
        'url' => '/satu-data',
        'children' => [
            ['label' => 'Satu Data Indonesia', 'url' => 'https://data.go.id/', 'target' => '_blank'],
            ['label' => 'Portal Data Pendidikan', 'url' => 'https://data.kemendikdasmen.go.id/', 'target' => '_blank'],
            ['label' => 'Data Pokok Kebahasaan', 'url' => 'https://dapobas.kemendikdasmen.go.id/', 'target' => '_blank'],
            ['label' => 'Lab Kebinekaan', 'url' => 'https://labbineka.kemendikdasmen.go.id/', 'target' => '_blank'],
        ]
    ],
];
?>
<header x-data="{ mobileMenuOpen: false, atTop: true }" @scroll.window="atTop = (window.pageYOffset <= 20)" :class="!atTop ? 'shadow-md backdrop-blur-xl bg-white/85 ' : 'shadow-sm bg-white '" class="sticky top-0 z-50 transition-all duration-300 ">
    <div class="container mx-auto px-4 xl:px-8">
        <div class="flex justify-between items-center transition-all duration-300" :class="!atTop ? 'h-16 md:h-20' : 'h-20 md:h-24'">
            
            <!-- Left: Logo & PPID Identity -->
            <div class="flex-shrink-0 flex items-center gap-3 md:gap-4">
                <a href="/" class="flex items-center group">
                    <img src="{{ asset('images/bbpsumbar.png') }}" alt="Logo Balai Bahasa Provinsi Sumatera Barat" 
                         class="w-auto object-contain drop-shadow-sm group-hover:opacity-90 transition-all duration-300" :class="{'h-7 md:h-9': !atTop, 'h-9 md:h-11 lg:h-12': atTop}">
                </a>
                
                <!-- Typographic PPID Branding -->
                <div class="hidden sm:flex flex-col border-l-2 border-gray-200 pl-3 md:pl-4 justify-center transition-all duration-300" :class="{'py-0.5': !atTop, 'py-1': atTop}">
                    <span class="text-[#0F2A4A] font-black tracking-tight leading-none" :class="{'text-lg': !atTop, 'text-xl md:text-2xl': atTop}">PPID</span>
                    <span class="text-amber-500 font-bold uppercase tracking-widest leading-none mt-1" :class="{'text-[9px]': !atTop, 'text-[10px] md:text-xs': atTop}">Layanan Publik</span>
                </div>
            </div>

            <!-- Center: Navigation (Desktop) -->
            <nav class="hidden lg:flex flex-1 justify-center px-4">
                <ul class="flex items-center gap-x-1 xl:gap-x-3 text-[12px] xl:text-[13px] font-bold uppercase tracking-wider text-[#0F2A4A]">
                    @foreach($menus as $menu)
                        @if(empty($menu['children']))
                            <li>
                                <a href="{{ $menu['url'] }}" 
                                   class="nav-link px-3 py-2 rounded-lg hover:bg-blue-50 hover:text-blue-700 transition-colors">
                                    {{ $menu['label'] }}
                                </a>
                            </li>
                        @else
                            <li x-data="{ dropdownOpen: false }" 
                                @mouseenter="dropdownOpen = true" 
                                @mouseleave="dropdownOpen = false" 
                                class="relative group">
                                
                                <a href="{{ $menu['url'] }}" 
                                   class="nav-link flex items-center text-center px-3 py-2 rounded-lg group-hover:bg-blue-50 group-hover:text-blue-700 transition-colors">
                                    {{ $menu['label'] }}
                                    <svg class="w-4 h-4 flex-shrink-0 ml-1 opacity-60 group-hover:opacity-100 transition-transform duration-200 group-hover:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"></path>
                                    </svg>
                                </a>

                                <!-- Desktop Dropdown -->
                                <div x-show="dropdownOpen" 
                                     x-transition:enter="transition ease-out duration-100"
                                     x-transition:enter-start="opacity-0 translate-y-2"
                                     x-transition:enter-end="opacity-100 translate-y-0"
                                     x-transition:leave="transition ease-in duration-75"
                                     x-transition:leave-start="opacity-100 translate-y-0"
                                     x-transition:leave-end="opacity-0 translate-y-2"
                                     x-cloak
                                     class="absolute left-0 top-full w-60 bg-white rounded-xl shadow-xl border border-gray-100 py-2 z-50 mt-1">
                                    
                                    @foreach($menu['children'] as $child)
                                        <a href="{{ $child['url'] }}" 
                                           @if(isset($child['target'])) target="{{ $child['target'] }}" @endif
                                           class="block px-5 py-2.5 text-gray-600 hover:bg-blue-50 hover:text-blue-700 hover:pl-6 transition-all font-semibold text-sm capitalize tracking-normal">
                                            {{ $child['label'] }}
                                        </a>
                                    @endforeach
                                </div>
                            </li>
                        @endif
                    @endforeach
                </ul>
            </nav>

            <!-- Right: Contact & Mobile Toggle -->
            <div class="flex items-center gap-3 flex-shrink-0">
                

                <!-- Mobile Menu Toggle Button -->
                <button @click="mobileMenuOpen = !mobileMenuOpen" class="lg:hidden p-2 text-[#0F2A4A] hover:bg-gray-100 rounded-xl focus:outline-none focus:ring-2 focus:ring-amber-400 transition-colors">
                    <svg x-show="!mobileMenuOpen" class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                    <svg x-show="mobileMenuOpen" x-cloak class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
        </div>

        <!-- Navigation (Mobile) -->
        <nav x-show="mobileMenuOpen" 
             x-collapse
             x-cloak
             class="lg:hidden bg-white border-t border-gray-100 absolute left-0 right-0 shadow-2xl">
            <ul class="flex flex-col divide-y divide-gray-50 max-h-[70vh] overflow-y-auto">
                @foreach($menus as $menu)
                    @if(empty($menu['children']))
                        <li>
                            <a href="{{ $menu['url'] }}" 
                               @click="mobileMenuOpen = false"
                               class="block px-6 py-4 text-[#0F2A4A] font-bold uppercase text-sm hover:bg-gray-50 hover:text-blue-600 transition-colors">
                                {{ $menu['label'] }}
                            </a>
                        </li>
                    @else
                        <li x-data="{ open: false }" class="bg-white">
                            <button @click="open = !open" 
                                    class="w-full flex justify-between items-center px-6 py-4 text-[#0F2A4A] font-bold uppercase text-sm hover:bg-gray-50 hover:text-blue-600 transition-colors">
                                {{ $menu['label'] }}
                                <svg class="w-5 h-5 flex-shrink-0 text-gray-400 transition-transform duration-200" :class="{ 'rotate-180': open }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </button>
                            
                            <div x-show="open" x-collapse x-cloak class="bg-slate-50/50">
                                @foreach($menu['children'] as $child)
                                    <a href="{{ $child['url'] }}" 
                                       @if(isset($child['target'])) target="{{ $child['target'] }}" @endif
                                       @click="mobileMenuOpen = false"
                                       class="block px-6 py-3 pl-10 text-gray-600 hover:text-blue-700 hover:bg-blue-50/80 text-sm font-semibold border-l-2 border-transparent hover:lue-500 transition-all">
                                        {{ $child['label'] }}
                                    </a>
                                @endforeach
                            </div>
                        </li>
                    @endif
                @endforeach
            </ul>
        </nav>
    </div>
</header>








