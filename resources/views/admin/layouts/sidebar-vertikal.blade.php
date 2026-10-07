@php
    // Menu otomatis aktif begitu route-nya tersedia (Fase 4 dan Fase 6).
    $menu = [
        ['label' => 'Beranda', 'items' => [
            ['title' => 'Dashboard', 'icon' => 'solar:screencast-2-line-duotone', 'route' => 'dashboard', 'params' => []],
        ]],
        ['label' => 'Kelola Informasi Publik', 'items' => [
            ['title' => 'Informasi Berkala',    'icon' => 'solar:calendar-bold-duotone',       'route' => 'informasi.index', 'params' => ['kategori' => 'berkala']],
            ['title' => 'Regulasi / Kebijakan', 'icon' => 'solar:book-2-bold-duotone',         'route' => 'informasi.index', 'params' => ['kategori' => 'kebijakan']],
            ['title' => 'Informasi Keuangan',   'icon' => 'solar:wallet-2-line-duotone',       'route' => 'informasi.index', 'params' => ['kategori' => 'keuangan']],
            ['title' => 'Program & Kegiatan',   'icon' => 'solar:clipboard-list-bold-duotone', 'route' => 'informasi.index', 'params' => ['kategori' => 'program']],
            ['title' => 'Statistik & Capaian',  'icon' => 'solar:chart-2-bold-duotone',        'route' => 'informasi.index', 'params' => ['kategori' => 'statistik']],
        ]],
        ['label' => 'Layanan Masuk', 'items' => [
            ['title' => 'Permohonan Informasi', 'icon' => 'solar:inbox-bold-duotone',           'route' => 'permohonan.index', 'params' => []],
            ['title' => 'Pengaduan',            'icon' => 'solar:chat-round-line-bold-duotone', 'route' => 'pengaduan.index',  'params' => []],
            ['title' => 'Keberatan',            'icon' => 'solar:shield-warning-bold-duotone',  'route' => 'keberatan.index',  'params' => []],
        ]],
        
                ['label' => 'Akun', 'items' => [
            ['title' => 'Profil Saya', 'icon' => 'solar:user-circle-bold-duotone', 'route' => 'profile.edit', 'params' => []],
            ['title' => 'Kelola Pengguna', 'icon' => 'solar:users-group-rounded-bold-duotone', 'route' => 'pengguna.index', 'params' => [], 'admin' => true],
            ['title' => 'Log Aktivitas', 'icon' => 'solar:history-bold-duotone', 'route' => 'admin.activity-log', 'params' => [], 'admin' => true],
        ]],
    ];
@endphp

<aside class="left-sidebar with-vertical">
    <div class="brand-logo d-flex align-items-center justify-content-between">
        <a href="{{ route('dashboard') }}" class="text-nowrap logo-img d-flex align-items-center gap-2">
            <img src="{{ asset('images/tutwuri.png') }}" alt="Logo" style="height: 34px; width: auto;">
            <span class="fw-bolder fs-5">PPID Balai Bahasa</span>
        </a>
    </div>

    <div class="scroll-sidebar" data-simplebar>
        <nav class="sidebar-nav">
            <ul id="sidebarnav" class="mb-0">
                @foreach ($menu as $group)
                    @php
                        // Item bertanda 'admin' hanya tampil untuk admin
                        $itemTampil = collect($group['items'])->filter(fn ($i) => empty($i['admin']) || auth()->user()->isAdmin());
                    @endphp
                    @continue($itemTampil->isEmpty())

                    <li class="nav-small-cap">
                        <iconify-icon icon="solar:menu-dots-bold-duotone" class="nav-small-cap-icon fs-5"></iconify-icon>
                        <span class="hide-menu">{{ $group['label'] }}</span>
                    </li>

                    @foreach ($itemTampil as $item)
                        @php
                            $siap    = Route::has($item['route']);
                            $url     = $siap ? route($item['route'], $item['params']) : '#';
                            $current = url()->current();
                            $aktif   = $siap && ($current === $url || str_starts_with($current, $url . '/'));
                        @endphp
                        <li class="sidebar-item">
                            <a class="sidebar-link indigo-hover-bg {{ $aktif ? 'active' : '' }} {{ $siap ? '' : 'opacity-50' }}"
                                href="{{ $url }}" aria-expanded="false">
                                <span class="aside-icon p-2 bg-indigo-subtle rounded-1">
                                    <iconify-icon icon="{{ $item['icon'] }}" class="fs-6"></iconify-icon>
                                </span>
                                <span class="hide-menu ps-1">{{ $item['title'] }}</span>
                                @unless ($siap)
                                    <span class="badge bg-secondary-subtle text-secondary ms-auto hide-menu">Segera</span>
                                @endunless
                            </a>
                        </li>
                    @endforeach
                @endforeach

                <li class="nav-small-cap">
                    <iconify-icon icon="solar:menu-dots-bold-duotone" class="nav-small-cap-icon fs-5"></iconify-icon>
                    <span class="hide-menu">Situs</span>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link indigo-hover-bg" href="{{ route('main') }}" target="_blank" rel="noopener"
                        aria-expanded="false">
                        <span class="aside-icon p-2 bg-indigo-subtle rounded-1">
                            <iconify-icon icon="solar:global-bold-duotone" class="fs-6"></iconify-icon>
                        </span>
                        <span class="hide-menu ps-1">Lihat Situs Publik</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>
