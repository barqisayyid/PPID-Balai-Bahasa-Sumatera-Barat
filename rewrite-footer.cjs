const fs = require('fs');
const path = 'c:\\laragon\\www\\PPID Balai Bahasa\\resources\\views\\main\\footer.blade.php';
let content = fs.readFileSync(path, 'utf8');

const newFooterHtml = `
<footer class="bg-[#18181b] text-gray-300 font-sans border-t-[6px] border-blue-700 relative">
    <div class="absolute top-[-6px] left-0 h-[6px] w-1/3 bg-amber-400"></div>

    <div class="container mx-auto px-6 py-16">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-12 lg:gap-16">
            
            <!-- Column 1: Alamat Kantor -->
            <div>
                <p class="text-amber-400 text-xs font-bold uppercase tracking-widest mb-1">Kantor Kami</p>
                <h3 class="text-white text-xl font-extrabold mb-6">Alamat Kantor</h3>
                
                <p class="font-semibold text-gray-200 mb-6">Balai Bahasa Provinsi Sumatera Barat</p>
                
                <ul class="space-y-5 text-sm">
                    <li class="flex items-start gap-4">
                        <svg class="w-5 h-5 text-amber-400 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a2 2 0 01-2.828 0l-4.243-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                        <span class="leading-relaxed">Jalan Simpang Alai, Cupak Tangah, Kec. Pauh,<br>Kota Padang, Sumatera Barat 25162</span>
                    </li>
                    <li class="flex items-center gap-4">
                        <svg class="w-5 h-5 text-amber-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                        <span>(0254) 221079</span>
                    </li>
                    <li class="flex items-start gap-4">
                        <svg class="w-5 h-5 text-amber-400 flex-shrink-0 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                        <div class="flex flex-col xl:flex-row xl:gap-6 gap-2">
                            <a href="mailto:balaibahasa.sumbar@kemendikdasmen.go.id" class="hover:text-amber-400 transition-colors break-words">balaibahasa.sumbar@<br class="hidden xl:block">kemendikdasmen.go.id</a>
                            <a href="mailto:ppid.balaibahasasumbar@kemendikdasmen.go.id" class="hover:text-amber-400 transition-colors break-words">ppid.balaibahasasumbar@<br class="hidden xl:block">kemendikdasmen.go.id</a>
                        </div>
                    </li>
                </ul>
            </div>

            <!-- Column 2: Jam Layanan -->
            <div>
                <p class="text-amber-400 text-xs font-bold uppercase tracking-widest mb-1">Kunjungi Kami</p>
                <h3 class="text-white text-xl font-extrabold mb-6">Jam Layanan</h3>
                
                <div class="space-y-3 text-sm mb-6">
                    <div class="flex justify-between max-w-[240px]">
                        <span>Senin&ndash;Kamis</span>
                        <span>08.00 &ndash; 16.00 WIB</span>
                    </div>
                    <div class="flex justify-between max-w-[240px]">
                        <span>Jumat</span>
                        <span>08.00 &ndash; 16.30 WIB</span>
                    </div>
                </div>

                <div class="border-t border-zinc-700 pt-6 mb-6">
                    <p class="text-zinc-500 text-xs font-bold uppercase tracking-widest mb-4">Jam Istirahat</p>
                    <div class="space-y-3 text-sm">
                        <div class="flex justify-between max-w-[240px]">
                            <span>Senin&ndash;Kamis</span>
                            <span>12.00 &ndash; 13.00</span>
                        </div>
                        <div class="flex justify-between max-w-[240px]">
                            <span>Jumat</span>
                            <span>11.30 &ndash; 13.00</span>
                        </div>
                    </div>
                </div>

                <div class="flex items-center gap-2 text-sm text-gray-300">
                    <span class="w-1.5 h-1.5 rounded-full bg-red-500"></span>
                    Sabtu & Minggu tutup
                </div>
            </div>

            <!-- Column 3: Ikuti Kami -->
            <div>
                <p class="text-amber-400 text-xs font-bold uppercase tracking-widest mb-1">Terhubung</p>
                <h3 class="text-white text-xl font-extrabold mb-6">Ikuti Kami</h3>
                
                <p class="text-sm leading-relaxed mb-8">
                    Dapatkan informasi kegiatan, publikasi, dan siniar kebahasaan terbaru.
                </p>
                
                <div class="flex gap-3">
                    <a href="#" aria-label="Instagram" class="w-10 h-10 rounded-full bg-zinc-800 flex items-center justify-center text-amber-400 hover:bg-amber-400 hover:text-zinc-900 transition-all">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.052.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98C8.333 23.986 8.741 24 12 24c3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z"/></svg>
                    </a>
                    <a href="#" aria-label="Facebook" class="w-10 h-10 rounded-full bg-zinc-800 flex items-center justify-center text-amber-400 hover:bg-amber-400 hover:text-zinc-900 transition-all">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.469h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.469h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                    </a>
                    <a href="#" aria-label="YouTube" class="w-10 h-10 rounded-full bg-zinc-800 flex items-center justify-center text-amber-400 hover:bg-amber-400 hover:text-zinc-900 transition-all">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/></svg>
                    </a>
                </div>
            </div>
            
        </div>
    </div>

    <!-- Bottom Bar -->
    <div class="border-t border-zinc-800">
        <div class="container mx-auto px-6 py-6">
            <p class="text-xs text-zinc-500 text-center">
                Copyright &copy; 2026 Balai Bahasa Provinsi Sumatera Barat.
            </p>
        </div>
    </div>
</footer>
`;

const jsSplit = content.split('<script>');
content = newFooterHtml + '\\n<script>' + jsSplit[1];

fs.writeFileSync(path, content, 'utf8');
console.log('Replaced footer with new dark design');
