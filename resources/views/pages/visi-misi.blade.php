@extends('main.app')

@section('content')
<section id="visi-misi" class="mb-12">

    <!-- Hero Banner with Minangkabau Motif -->
    <div class="w-screen relative left-1/2 -translate-x-1/2 bg-[#0F2A4A] overflow-hidden pt-20 pb-40 px-8 mt-[-2rem]">
        <!-- SVG Pattern Background (Songket / Kaluak Paku / Pucuak Rabuang stylized) -->
        <div class="absolute inset-0 opacity-10 pointer-events-none">
            <svg width="100%" height="100%" xmlns="http://www.w3.org/2000/svg">
                <defs>
                    <pattern id="minang-pattern-visi" x="0" y="0" width="60" height="60" patternUnits="userSpaceOnUse">
                        <path d="M30 0 L60 30 L30 60 L0 30 Z" fill="none" stroke="#FBBF24" stroke-width="1.5"/>
                        <path d="M30 10 L50 30 L30 50 L10 30 Z" fill="none" stroke="#FBBF24" stroke-width="1"/>
                        <path d="M30 20 L40 30 L30 40 L20 30 Z" fill="#FBBF24"/>
                        <circle cx="30" cy="0" r="3" fill="#FBBF24"/>
                        <circle cx="30" cy="60" r="3" fill="#FBBF24"/>
                        <circle cx="0" cy="30" r="3" fill="#FBBF24"/>
                        <circle cx="60" cy="30" r="3" fill="#FBBF24"/>
                    </pattern>
                </defs>
                <rect width="100%" height="100%" fill="url(#minang-pattern-visi)" />
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
                Arah Cita-Cita &amp; Tujuan
            </span>
            <h2 class="text-4xl md:text-5xl font-black text-white mb-6 tracking-tight drop-shadow-lg">
                Visi &amp; Misi
            </h2>
            <p class="text-blue-100 text-lg font-medium opacity-90">Fondasi semangat dan komitmen kami dalam melayani serta melindungi kebudayaan bangsa di tanah Minang.</p>
        </div>
    </div>

    <!-- Main Content Area -->
    <div class="relative px-4 pb-20 md:px-8 max-w-6xl mx-auto -mt-24 z-20">
        
        <!-- VISI -->
        <div class="bg-gradient-to-br from-white to-amber-50/50 rounded-3xl p-8 md:p-14 shadow-2xl shadow-[#0F2A4A]/10 border border-amber-100 mb-20 relative overflow-hidden group">
            
            <!-- Large Quote Icon Background -->
            <div class="absolute top-4 left-8 text-amber-100/40 font-serif text-[200px] leading-none pointer-events-none select-none z-0 rotate-6 group-hover:-rotate-6 transition-transform duration-700">"</div>
            <div class="absolute -bottom-10 right-8 text-amber-100/40 font-serif text-[200px] leading-none pointer-events-none select-none z-0 rotate-180">"</div>

            <!-- Decorative Batik Accent -->
            <div class="absolute top-0 right-0 w-full h-24 bg-[url('/images/motif-batik-sumbar.png')] bg-repeat-x bg-contain opacity-[0.03] pointer-events-none"></div>

            <div class="relative z-10 text-center max-w-4xl mx-auto">
                <h3 class="text-2xl font-black text-amber-500 mb-8 tracking-widest uppercase flex items-center justify-center gap-4">
                    <div class="h-[2px] w-12 bg-amber-300"></div>
                    Visi Kami
                    <div class="h-[2px] w-12 bg-amber-300"></div>
                </h3>
                
                <p class="text-gray-800 font-medium leading-relaxed text-xl md:text-2xl italic">
                    "Terwujudnya pelayanan informasi publik kebahasaan dan kesastraan yang <strong class="text-[#0F2A4A] font-black underline decoration-amber-400 decoration-4 underline-offset-4">prima, transparan, dan akuntabel</strong>, mendukung pengembangan, pembinaan dan pelindungan bahasa Indonesia serta bahasa daerah di Sumatera Barat."
                </p>
            </div>
        </div>

        <!-- MISI -->
        <div>
            <div class="text-center mb-16">
                <h3 class="text-3xl font-black text-[#0F2A4A] mb-4">Misi Strategis</h3>
                <p class="text-gray-600 max-w-2xl mx-auto text-lg">Langkah-langkah nyata yang kami ambil untuk mewujudkan Visi besar Balai Bahasa Provinsi Sumatera Barat.</p>
            </div>

            <!-- Timeline / Step Grid -->
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8 items-stretch relative">
                
                @php
                    $misi = [
                        ['Menyediakan layanan informasi publik di bidang bahasa dan sastra yang cepat, tepat, dan mudah diakses.'],
                        ['Menjamin transparansi dalam pendokumentasian dan pengelolaan karya-karya kebahasaan dan kesastraan.'],
                        ['Meningkatkan literasi digital masyarakat terhadap informasi kebahasaan dan kesastraan.'],
                        ['Meningkatkan kompetensi sumber daya manusia PPID dalam pengelolaan dan pelayanan informasi publik.'],
                        ['Membangun sinergi dengan pemangku kepentingan (pemerintah daerah, akademisi, komunitas bahasa) untuk memperluas akses informasi publik kebahasaan dan kesastraan.']
                    ];
                @endphp

                @foreach($misi as $index => $item)
                <div class="bg-white rounded-3xl border border-gray-100 p-8 shadow-lg shadow-blue-900/5 hover:shadow-2xl hover:-translate-y-2 transition-all duration-300 relative overflow-hidden group z-10">
                    
                    <!-- Giant Faded Number Background -->
                    <div class="absolute -right-6 -bottom-10 text-gray-100 font-black text-[150px] leading-none pointer-events-none group-hover:text-amber-50 group-hover:-translate-y-4 transition-all duration-500 z-0 select-none">
                        0{{ $index + 1 }}
                    </div>

                    <div class="relative z-10">
                        <div class="w-14 h-14 bg-[#0F2A4A] text-white rounded-2xl flex items-center justify-center text-xl font-black mb-6 shadow-md shadow-[#0F2A4A]/20 group-hover:bg-amber-400 group-hover:text-[#0F2A4A] transition-colors">
                            {{ $index + 1 }}
                        </div>
                        <h4 class="text-gray-800 font-bold text-lg leading-relaxed group-hover:text-[#0F2A4A] transition-colors">
                            {{ $item[0] }}
                        </h4>
                    </div>
                </div>
                @endforeach

            </div>
        </div>

    </div>
</section>
@endsection

