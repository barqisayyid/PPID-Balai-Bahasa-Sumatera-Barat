@extends('admin.layouts.app')

@section('title', 'Kelola Pengguna')

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="d-flex flex-wrap justify-content-between align-items-center gap-2 mb-4">
                <div>
                    <h4 class="card-title mb-1">Kelola Pengguna</h4>
                    <p class="text-muted mb-0">{{ $daftar->count() }} akun petugas.</p>
                </div>
                <a href="{{ route('pengguna.create') }}" class="btn btn-primary d-inline-flex align-items-center">
                    <iconify-icon icon="solar:add-circle-bold-duotone" class="fs-5 me-1"></iconify-icon>
                    Tambah Akun
                </a>
            </div>

            <div class="table-responsive">
                <table class="table table-striped align-middle w-100">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Peran</th>
                            <th>Dibuat</th>
                            <th class="text-end" style="width: 160px">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($daftar as $u)
                            <tr>
                                <td class="fw-semibold">
                                    {{ $u->name }}
                                    @if ($u->is(auth()->user()))
                                        <span class="badge bg-info-subtle text-info ms-1">Anda</span>
                                    @endif
                                </td>
                                <td>{{ $u->email }}</td>
                                <td>
                                    <span class="badge {{ $u->isAdmin() ? 'bg-primary-subtle text-primary' : 'bg-secondary-subtle text-secondary' }}">
                                        {{ $u->isAdmin() ? 'Admin' : 'Operator' }}
                                    </span>
                                </td>
                                <td class="text-nowrap">{{ $u->created_at?->format('d/m/Y') }}</td>
                                <td class="text-end text-nowrap">
                                    <a href="{{ route('pengguna.edit', $u) }}" class="btn btn-sm btn-outline-primary">Ubah</a>

                                    @unless ($u->is(auth()->user()))
                                        <form action="{{ route('pengguna.destroy', $u) }}" method="POST" class="d-inline"
                                            data-confirm="Hapus akun &quot;{{ $u->name }}&quot;? Pengguna ini tidak akan bisa login lagi.">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danger">Hapus</button>
                                        </form>
                                    @endunless
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection