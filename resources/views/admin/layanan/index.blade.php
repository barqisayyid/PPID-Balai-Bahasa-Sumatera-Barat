@extends('admin.layouts.app')

@section('title', $judul)

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="mb-4">
                <h4 class="card-title mb-1">{{ $judul }}</h4>
                <p class="text-muted mb-0">{{ $total }} masuk &middot; klik baris untuk membuka dan menanggapi.</p>
            </div>

            {{-- Saring berdasarkan status --}}
            <div class="d-flex flex-wrap gap-2 mb-4">
                <a href="{{ route($jenis . '.index') }}"
                    class="btn btn-sm {{ $statusAktif === null ? 'btn-primary' : 'btn-outline-primary' }}">
                    Semua <span class="badge bg-white text-dark ms-1">{{ $total }}</span>
                </a>
                @foreach ($statusList as $kode => $label)
                    <a href="{{ route($jenis . '.index', ['status' => $kode]) }}"
                        class="btn btn-sm {{ $statusAktif === $kode ? 'btn-primary' : 'btn-outline-primary' }}">
                        {{ $label }} <span class="badge bg-white text-dark ms-1">{{ $jumlah[$kode] ?? 0 }}</span>
                    </a>
                @endforeach
            </div>

            <div class="table-responsive">
                <table id="tabel-layanan" class="table table-striped align-middle w-100">
                    <thead>
                        <tr>
                            <th>No. Registrasi</th>
                            <th>Diterima</th>
                            <th>Nama</th>
                            <th>{{ $jenis === 'pengaduan' ? 'Subjek' : ($jenis === 'keberatan' ? 'Alasan' : 'Perihal') }}</th>
                            <th>Status</th>
                            <th class="text-end" style="width: 90px">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($daftar as $item)
                            <tr>
                                <td class="text-nowrap fw-semibold">{{ $item->no_registrasi }}</td>
                                <td class="text-nowrap" data-order="{{ $item->created_at->timestamp }}">
                                    {{ $item->created_at->format('d/m/Y H:i') }}
                                </td>
                                <td>{{ $item->nama }}</td>
                                <td style="min-width: 240px">{{ $ringkas($item) }}</td>
                                <td>
                                    <span class="badge bg-{{ $item->status_warna }}-subtle text-{{ $item->status_warna }}">
                                        {{ $item->status_label }}
                                    </span>
                                </td>
                                <td class="text-end">
                                    <a href="{{ route($jenis . '.show', $item->id) }}"
                                        class="btn btn-sm btn-outline-primary">Buka</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            {{-- Info jumlah record & navigasi halaman --}}
            <div class="d-flex justify-content-between align-items-center mt-3 flex-wrap gap-2">
                <small class="text-muted">
                    Menampilkan
                    <strong>{{ $daftar->firstItem() ?? 0 }}</strong>–<strong>{{ $daftar->lastItem() ?? 0 }}</strong>
                    dari <strong>{{ $daftar->total() }}</strong> data
                </small>

                <div>
                    {{ $daftar->withQueryString()->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(function () {
            $('#tabel-layanan').DataTable({
                order: [[1, 'desc']],            // yang terbaru di atas
                paging: false,                   // Paginasi ditangani oleh Server-Side Laravel
                info: false,                     // Keterangan jumlah data ditangani oleh Blade
                columnDefs: [{ orderable: false, targets: -1 }],
                language: {
                    search: 'Cari di halaman ini:',
                    zeroRecords: 'Tidak ada data yang cocok',
                    emptyTable: 'Belum ada data yang masuk.'
                }
            });
        });
    </script>
@endpush