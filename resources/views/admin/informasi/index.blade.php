@extends('admin.layouts.app')

@section('title', $label)

@section('content')
    @php
        $pakaiJenis = in_array('jenis_informasi', $fields);
        $pakaiPj    = in_array('pj', $fields);
    @endphp

    <div class="card">
        <div class="card-body">
            <div class="d-flex flex-wrap justify-content-between align-items-center gap-2 mb-4">
                <div>
                    <h4 class="card-title mb-1">{{ $label }}</h4>
                    <p class="text-muted mb-0">
                        {{ $daftar->count() }} dokumen &middot;
                        {{ $daftar->where('tampil', true)->count() }} tampil di situs publik
                    </p>
                </div>
                <a href="{{ route('informasi.create', $kategori) }}" class="btn btn-primary d-inline-flex align-items-center">
                    <iconify-icon icon="solar:add-circle-bold-duotone" class="fs-5 me-1"></iconify-icon>
                    Tambah Dokumen
                </a>
            </div>

            <div class="table-responsive">
                <table id="tabel-informasi" class="table table-striped align-middle w-100">
                    <thead>
                        <tr>
                            <th style="width: 50px">#</th>
                            <th>Nama</th>
                            @if ($pakaiJenis) <th>{{ $labelJenis }}</th> @endif
                            <th>Tahun</th>
                            @if ($pakaiPj) <th>Penanggung Jawab</th> @endif
                            <th>Dokumen</th>
                            <th>Status</th>
                            <th class="text-end" style="width: 130px">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($daftar as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td style="min-width: 260px">{{ $item->nama }}</td>
                                @if ($pakaiJenis) <td>{{ $item->jenis_informasi ?? '-' }}</td> @endif
                                <td>{{ $item->tahun }}</td>
                                @if ($pakaiPj) <td>{{ $item->pj ?? '-' }}</td> @endif
                                <td>
                                                                        @if ($item->dokumen)
                                        <a href="{{ Storage::disk('public')->url($item->dokumen) }}" target="_blank" rel="noopener noreferrer">Buka</a>
                                    @else
                                        <span class="text-muted">Belum ada</span>
                                    @endif
                                </td>
                                <td data-order="{{ $item->tampil ? 1 : 0 }}">
                                    <form action="{{ route('informasi.toggle', ['kategori' => $kategori, 'informasi' => $item]) }}"
                                        method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit"
                                            class="badge border-0 {{ $item->tampil ? 'bg-success-subtle text-success' : 'bg-secondary-subtle text-secondary' }}"
                                            title="Klik untuk {{ $item->tampil ? 'menyembunyikan' : 'menampilkan' }}">
                                            {{ $item->tampil ? 'Tampil' : 'Disembunyikan' }}
                                        </button>
                                    </form>
                                </td>
                                <td class="text-end text-nowrap">
                                    <a href="{{ route('informasi.edit', ['kategori' => $kategori, 'informasi' => $item]) }}"
                                        class="btn btn-sm btn-outline-primary">Ubah</a>

                                    @if (auth()->user()->isAdmin())
                                        <form action="{{ route('informasi.destroy', ['kategori' => $kategori, 'informasi' => $item]) }}"
                                            method="POST" class="d-inline"
                                            data-confirm="Hapus dokumen &quot;{{ \Illuminate\Support\Str::limit($item->nama, 70) }}&quot;? Tindakan ini tidak dapat dibatalkan.">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danger">Hapus</button>
                                        </form>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(function () {
            $('#tabel-informasi').DataTable({
                order: [],                       // pertahankan urutan dari server (tahun terbaru dulu)
                pageLength: 25,
                columnDefs: [{ orderable: false, targets: -1 }],
                language: {
                    search: 'Cari:',
                    lengthMenu: 'Tampilkan _MENU_ data',
                    info: 'Menampilkan _START_–_END_ dari _TOTAL_ data',
                    infoEmpty: 'Tidak ada data',
                    infoFiltered: '(disaring dari _MAX_ data)',
                    zeroRecords: 'Tidak ada data yang cocok',
                    emptyTable: 'Belum ada dokumen. Klik "Tambah Dokumen" untuk memulai.',
                    paginate: { first: 'Awal', last: 'Akhir', next: 'Berikutnya', previous: 'Sebelumnya' }
                }
            });
        });
    </script>
@endpush