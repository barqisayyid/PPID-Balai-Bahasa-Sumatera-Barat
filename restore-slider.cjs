const fs = require('fs');
const path = 'c:\\laragon\\www\\PPID Balai Bahasa\\resources\\views\\main\\index.blade.php';
let content = fs.readFileSync(path, 'utf8');

const sliderCode = `
<section id="beranda" class="mb-12 mt-8">
    <div class="slider-container w-full overflow-hidden rounded-2xl shadow-xl relative">
        <div class="slider-track flex transition-transform duration-700 ease-in-out" id="slider-track">

            <!-- Slide 1 -->
            <div class="slide relative h-[420px] md:h-[520px] w-full flex-shrink-0" id="slide-0"
                style="background: url('images/kantorbahasa.jpg') center/cover no-repeat;">
                <div
                    class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/30 to-transparent flex items-end justify-center text-white pb-16">
                    <div class="text-center px-4 max-w-2xl">
                        <span
                            class="inline-block text-xs tracking-widest uppercase text-amber-300 font-semibold mb-3">Layanan
                            Publik</span>
                        <h3 class="text-3xl md:text-4xl font-bold mb-3 drop-shadow-lg" id="slide-0-title">Transparansi
                            Informasi</h3>
                        <p class="text-lg text-gray-200 drop-shadow" id="slide-0-desc">Komitmen kami untuk keterbukaan
                            informasi publik</p>
                    </div>
                </div>
            </div>

            <!-- Slide 2 -->
            <div class="slide relative h-[420px] md:h-[520px] w-full flex-shrink-0" id="slide-1"
                style="background: url('images/slide2.jpg') center/cover no-repeat;">
                <div
                    class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/30 to-transparent flex items-end justify-center text-white pb-16">
                    <div class="text-center px-4 max-w-2xl">
                        <span
                            class="inline-block text-xs tracking-widest uppercase text-amber-300 font-semibold mb-3">Layanan
                            Publik</span>
                        <h3 class="text-3xl md:text-4xl font-bold mb-3 drop-shadow-lg" id="slide-1-title">Pelayanan
                            Prima</h3>
                        <p class="text-lg text-gray-200 drop-shadow" id="slide-1-desc">Melayani masyarakat dengan
                            profesional dan responsif</p>
                    </div>
                </div>
            </div>

            <!-- Slide 3 -->
            <div class="slide relative h-[420px] md:h-[520px] w-full flex-shrink-0" id="slide-2"
                style="background: url('images/slide3.jpg') center/cover no-repeat;">
                <div
                    class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/30 to-transparent flex items-end justify-center text-white pb-16">
                    <div class="text-center px-4 max-w-2xl">
                        <span
                            class="inline-block text-xs tracking-widest uppercase text-amber-300 font-semibold mb-3">Layanan
                            Publik</span>
                        <h3 class="text-3xl md:text-4xl font-bold mb-3 drop-shadow-lg" id="slide-2-title">
                            Akuntabilitas</h3>
                        <p class="text-lg text-gray-200 drop-shadow" id="slide-2-desc">Menjamin akses informasi yang
                            mudah dan cepat</p>
                    </div>
                </div>
            </div>

        </div>

        <!-- Slider Controls -->
        <div class="flex justify-center -mt-10 relative z-10 space-x-2 pb-4">
            <button
                class="slider-dot h-2 rounded-full bg-amber-400 w-8 transition-all duration-500 ease-out hover:scale-110"
                data-slide="0"></button>
            <button
                class="slider-dot h-2 rounded-full bg-white/50 w-2 transition-all duration-500 ease-out hover:scale-110 hover:bg-white/80"
                data-slide="1"></button>
            <button
                class="slider-dot h-2 rounded-full bg-white/50 w-2 transition-all duration-500 ease-out hover:scale-110 hover:bg-white/80"
                data-slide="2"></button>
        </div>
    </div>
</section>
`;

if (!content.includes('id="beranda"')) {
    content = content.replace('<main class="container mx-auto px-4 py-8">', '<main class="container mx-auto px-4 py-8">\n' + sliderCode);
    fs.writeFileSync(path, content, 'utf8');
    console.log('Slider restored to index.blade.php');
} else {
    console.log('Slider already exists.');
}
