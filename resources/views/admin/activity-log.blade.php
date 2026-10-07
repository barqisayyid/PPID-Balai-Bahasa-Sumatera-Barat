@extends('admin.layouts.app')

@section('title', 'Log Aktivitas')

@section('content')
<div class="card">
    <div class="card-body">
        <div class="d-flex flex-wrap justify-content-between align-items-center gap-2 mb-4">
            <div>
                <h4 class="card-title mb-1">Log Aktivitas Admin</h4>
                <p class="text-muted mb-0">Riwayat tindakan admin/operator di panel ini.</p>
            </div>
        </div>

        {{-- Filter --}}
        <form method="GET" class="row g-2 mb-3">
            <div class="col-md-4">
                <input type="text" name="cari" class="form-control form-control-sm"
                       placeholder="Cari keterangan..." value="{{ request('cari') }}">
            </div>
            <div class="col-md-3">
                <select name="aksi" class="form-select form-select-sm">
                    <option value="">-- Semua Aksi --</option>
                    @foreach (['create','update','update_status','toggle_tampil','delete'] as $aksi)
                        <option value="{{ $aksi }}" {{ request('aksi') === $aksi ? 'selected' : '' }}>
                            {{ ucfirst(str_replace('_', ' ', $aksi)) }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-auto">
                <button class="btn btn-sm btn-primary">Filter</button>
                <a href="{{ route('admin.activity-log') }}" class="btn btn-sm btn-outline-secondary">Reset</a>
            </div>
        </form>

        <div class="table-responsive">
            <table class="table table-sm table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th>Waktu</th>
                        <th>Admin</th>
                        <th>Aksi</th>
                        <th>Keterangan</th>
                        <th>IP</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($logs as $log)
                        <tr>
                            <td class="text-nowrap text-muted small">
                                {{ $log->created_at->format('d/m/Y H:i') }}
                            </td>
                            <td>{{ $log->user->name ?? '<sistem>' }}</td>
                            <td>
                                @php
                                    $badge = match($log->aksi) {
                                        'create'        => 'success',
                                        'delete'        => 'danger',
                                        'update_status' => 'warning',
                                        default         => 'secondary',
                                    };
                                @endphp
                                <span class="badge bg-{{ $badge }}">{{ $log->aksi }}</span>
                            </td>
                            <td>{{ $log->keterangan }}</td>
                            <td class="text-muted small">{{ $log->ip_address }}</td>
                        </tr>
                    @empty
                        <tr><td colspan="5" class="text-center text-muted">Belum ada log.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{ $logs->withQueryString()->links() }}
    </div>
</div>
@endsection