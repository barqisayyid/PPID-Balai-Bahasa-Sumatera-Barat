@extends('admin.layouts.app')

@section('title', 'Dashboard')

@section('content')
    <div class="card bg-primary-subtle shadow-none mb-4">
        <div class="card-body">
            <h4 class="mb-1">Selamat datang, {{ $user->name }}</h4>
            <p class="mb-0 text-muted">Panel pengelolaan PPID Balai Bahasa Provinsi Sumatera Barat.</p>
        </div>
    </div>

    <h6 class="text-uppercase text-muted mb-3">Layanan masuk</h6>
    <div class="row">
        @foreach ($layanan as $kunci => $l)
            <div class="col-md-4">
                <a href="{{ route($kunci . '.index') }}" class="text-decoration-none">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-start">
                                <div>
                                    <h3 class="mb-0 text-dark">{{ number_format($l['total'], 0, ',', '.') }}</h3>
                                    <span class="text-muted">{{ $l['judul'] }}</span>
                                </div>
                                @if ($l['baru'] > 0)
                                    <span class="badge bg-danger">{{ $l['baru'] }} menunggu</span>
                                @else
                                    <span class="badge bg-success-subtle text-success">Tertangani</span>
                                @endif
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>

    <h6 class="text-uppercase text-muted mb-3">Informasi publik</h6>
    <div class="card">
        <div class="card-body d-flex flex-wrap justify-content-between align-items-center gap-3">
            <div>
                <h3 class="mb-0">{{ number_format($dokumen, 0, ',', '.') }}</h3>
                <span class="text-muted">dokumen &middot; {{ $tampil }} tampil di situs publik</span>
            </div>
            <div class="d-flex flex-wrap gap-2">
                <a href="{{ route('informasi.index', 'berkala') }}" class="btn btn-outline-primary">Kelola dokumen</a>
                <a href="{{ route('main') }}" target="_blank" rel="noopener" class="btn btn-outline-secondary">Lihat situs publik</a>
                <a href="{{ route('profile.edit') }}" class="btn btn-outline-secondary">Ubah profil / password</a>
            </div>
        </div>
    </div>
@endsection