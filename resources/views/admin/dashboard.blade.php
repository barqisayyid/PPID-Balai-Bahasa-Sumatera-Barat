@extends('admin.layouts.app')

@section('title', 'Dashboard')

@section('content')
    <div class="card bg-primary-subtle shadow-none mb-4 border-0">
        <div class="card-body d-flex flex-wrap justify-content-between align-items-center gap-3">
            <div>
                <h4 class="mb-1 text-primary">Selamat datang, {{ $user->name }}</h4>
                <p class="mb-0 text-muted">Panel pengelolaan PPID Balai Bahasa Provinsi Sumatera Barat.</p>
            </div>
            <div>
                <a href="{{ route('profile.edit') }}" class="btn btn-outline-primary btn-sm rounded-pill px-3">
                    <iconify-icon icon="solar:user-circle-bold-duotone" class="me-1"></iconify-icon> Edit Profil
                </a>
                <a href="{{ route('main') }}" target="_blank" rel="noopener" class="btn btn-primary btn-sm rounded-pill px-3 ms-1">
                    <iconify-icon icon="solar:global-bold-duotone" class="me-1"></iconify-icon> Lihat Situs
                </a>
            </div>
        </div>
    </div>

    <h6 class="text-uppercase text-muted fw-bold mb-3 ls-1">Layanan Masuk</h6>
    <div class="row">
        @foreach ($layanan as $kunci => $l)
            <div class="col-md-4 mb-4">
                <a href="{{ route($kunci . '.index') }}" class="text-decoration-none h-100 d-block">
                    <div class="card h-100 border-0 shadow-sm hover-elevate transition-all">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-start">
                                <div>
                                    <h2 class="mb-1 text-dark fw-bold">{{ number_format($l['total'], 0, ',', '.') }}</h2>
                                    <span class="text-muted fw-medium">{{ $l['judul'] }}</span>
                                </div>
                                @if ($l['baru'] > 0)
                                    <span class="badge bg-danger rounded-pill px-2 py-1">{{ $l['baru'] }} menunggu</span>
                                @else
                                    <span class="badge bg-success-subtle text-success rounded-pill px-2 py-1">Tertangani</span>
                                @endif
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>

    <h6 class="text-uppercase text-muted fw-bold mb-3 mt-2 ls-1">Konten Publikasi</h6>
    <div class="row">
        <div class="col-md-6 mb-4">
            <div class="card h-100 border-0 shadow-sm">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div class="d-flex align-items-center gap-3">
                        <div class="bg-primary-subtle text-primary rounded-circle p-3 d-flex align-items-center justify-content-center">
                            <iconify-icon icon="solar:document-text-bold-duotone" class="fs-4"></iconify-icon>
                        </div>
                        <div>
                            <h3 class="mb-0 fw-bold">{{ number_format($dokumen, 0, ',', '.') }}</h3>
                            <span class="text-muted small">Total Dokumen ({{ $tampil }} tampil di web)</span>
                        </div>
                    </div>
                    <a href="{{ route('informasi.index', 'berkala') }}" class="btn btn-light text-primary btn-sm stretched-link">Kelola</a>
                </div>
            </div>
        </div>

        <div class="col-md-6 mb-4">
            <div class="card h-100 border-0 shadow-sm">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div class="d-flex align-items-center gap-3">
                        <div class="bg-warning-subtle text-warning rounded-circle p-3 d-flex align-items-center justify-content-center">
                            <iconify-icon icon="solar:calendar-date-bold-duotone" class="fs-4"></iconify-icon>
                        </div>
                        <div>
                            <h3 class="mb-0 fw-bold">{{ number_format($agenda ?? 0, 0, ',', '.') }}</h3>
                            <span class="text-muted small">Total Agenda ({{ $agendaAktif ?? 0 }} belum selesai)</span>
                        </div>
                    </div>
                    <a href="{{ route('admin.agenda.index') }}" class="btn btn-light text-warning btn-sm stretched-link">Kelola</a>
                </div>
            </div>
        </div>
    </div>
@endsection
