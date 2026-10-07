@if ($item->dokumen)
    @php
        $previewUrl = str_starts_with($item->dokumen, 'http') ? $item->dokumen : route('preview.dokumen', ['file' => $item->dokumen]);
    @endphp
    <a href="{{ $previewUrl }}" target="_blank" rel="noopener noreferrer" title="Lihat dan Unduh Dokumen"
        class="group inline-flex items-center gap-2 bg-gradient-to-r from-[#0F2A4A] to-blue-900 text-white px-4 py-1.5 rounded-full text-xs font-bold tracking-wide shadow-md shadow-[#0F2A4A]/20 hover:shadow-lg hover:-translate-y-0.5 transition-all border border-[#0F2A4A]/50 hover:border-amber-400 focus:outline-none focus:ring-2 focus:ring-amber-400 focus:ring-offset-1">
        <svg class="w-4 h-4 text-amber-400 group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path>
        </svg>
        UNDUH
    </a>
@else
    <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full bg-gray-50 text-gray-400 text-xs font-semibold border border-dashed border-gray-200">
        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
        </svg>
        Proses
    </span>
@endif




