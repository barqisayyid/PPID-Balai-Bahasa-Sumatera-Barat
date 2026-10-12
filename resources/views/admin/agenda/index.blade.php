@extends('admin.layouts.app')

@section('title', 'Kelola Agenda Kegiatan')

@section('content')
<div class="card">
    <div class="card-body">
        <div class="d-flex flex-wrap justify-content-between align-items-center gap-2 mb-4">
            <div>
                <h4 class="card-title mb-1">Kelola Agenda Kegiatan</h4>
                <p class="text-muted mb-0">
                    {{ $agendas->count() }} agenda terdaftar
                </p>
            </div>
            <div class="d-flex flex-wrap align-items-center gap-2">
                <a href="{{ route('admin.agenda.template') }}" class="btn btn-outline-success d-inline-flex align-items-center" title="Unduh template Excel untuk input massal">
                    <iconify-icon icon="solar:file-download-bold-duotone" class="fs-5 me-1"></iconify-icon> 
                    Template Excel
                </a>
                <button type="button" class="btn btn-success d-inline-flex align-items-center text-white" data-bs-toggle="modal" data-bs-target="#modalImport">
                    <iconify-icon icon="solar:upload-track-bold-duotone" class="fs-5 me-1"></iconify-icon> 
                    Import Excel
                </button>
                <a href="{{ route('admin.agenda.export') }}" class="btn btn-outline-secondary d-inline-flex align-items-center" title="Export seluruh data agenda ke file Excel">
                    <iconify-icon icon="solar:export-bold-duotone" class="fs-5 me-1"></iconify-icon> 
                    Export
                </a>
                <button type="button" class="btn btn-primary d-inline-flex align-items-center" data-bs-toggle="modal" data-bs-target="#modalTambah">
                    <iconify-icon icon="solar:add-circle-bold-duotone" class="fs-5 me-1"></iconify-icon> 
                    Tambah Agenda
                </button>
            </div>
        </div>

        @if (session('import_errors') && count(session('import_errors')) > 0)
            <div class="alert alert-warning alert-dismissible fade show mb-4" role="alert">
                <div class="d-flex align-items-start">
                    <iconify-icon icon="solar:danger-triangle-bold-duotone" class="fs-4 me-2 text-warning flex-shrink-0 mt-1"></iconify-icon>
                    <div>
                        <strong>Catatan Import:</strong> Terdapat baris yang tidak dapat diproses:
                        <ul class="mb-0 mt-1 ps-3 small">
                            @foreach (session('import_errors') as $err)
                                <li>{{ $err }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="table-responsive">
            <table id="tabel-agenda" class="table table-striped align-middle w-100">
                <thead>
                    <tr>
                        <th style="width: 50px">No</th>
                        <th>Tanggal</th>
                        <th>Waktu</th>
                        <th>Kegiatan</th>
                        <th>Tempat</th>
                        <th>Status</th>
                        <th class="text-end" style="width: 130px">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($agendas as $agenda)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ \Carbon\Carbon::parse($agenda->tanggal)->locale('id')->isoFormat('D MMMM YYYY') }}</td>
                        <td>{{ $agenda->waktu ?? '-' }}</td>
                        <td class="fw-bold">{{ $agenda->kegiatan }}</td>
                        <td>{{ $agenda->tempat ?? '-' }}</td>
                        <td>
                            <span class="badge {{ $agenda->status == 'Selesai' ? 'bg-secondary' : 'bg-success' }}">
                                {{ $agenda->status }}
                            </span>
                        </td>
                        <td class="text-end text-nowrap">
                            <button type="button" class="btn btn-sm btn-outline-primary me-1" data-bs-toggle="modal" data-bs-target="#modalEdit{{ $agenda->id }}">Ubah</button>
                            <form action="{{ route('admin.agenda.destroy', $agenda->id) }}" method="POST" class="d-inline" data-confirm="Yakin ingin menghapus agenda ini?">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>

                    <!-- Modal Edit -->
                    <div class="modal fade" id="modalEdit{{ $agenda->id }}" tabindex="-1">
                        <div class="modal-dialog">
                            <form action="{{ route('admin.agenda.update', $agenda->id) }}" method="POST" class="modal-content text-start">
                                @csrf
                                @method('PUT')
                                <div class="modal-header">
                                    <h5 class="modal-title">Edit Agenda</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label class="form-label">Nama Kegiatan</label>
                                        <input type="text" name="kegiatan" class="form-control" value="{{ $agenda->kegiatan }}" required>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Tanggal</label>
                                            <input type="date" name="tanggal" class="form-control" value="{{ $agenda->tanggal }}" required>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Waktu</label>
                                            <input type="text" name="waktu" class="form-control" value="{{ $agenda->waktu }}" placeholder="Contoh: 08:00 - Selesai">
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Tempat</label>
                                        <input type="text" name="tempat" class="form-control" value="{{ $agenda->tempat }}">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Deskripsi</label>
                                        <textarea name="deskripsi" class="form-control" rows="3">{{ $agenda->deskripsi }}</textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Status</label>
                                        <select name="status" class="form-select" required>
                                            <option value="Akan Datang" {{ $agenda->status == 'Akan Datang' ? 'selected' : '' }}>Akan Datang</option>
                                            <option value="Selesai" {{ $agenda->status == 'Selesai' ? 'selected' : '' }}>Selesai</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Batal</button>
                                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center text-muted py-4">Belum ada data agenda.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal Tambah -->
<div class="modal fade" id="modalTambah" tabindex="-1">
    <div class="modal-dialog">
        <form action="{{ route('admin.agenda.store') }}" method="POST" class="modal-content">
            @csrf
            <div class="modal-header">
                <h5 class="modal-title">Tambah Agenda Baru</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label class="form-label">Nama Kegiatan <span class="text-danger">*</span></label>
                    <input type="text" name="kegiatan" class="form-control" required>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Tanggal <span class="text-danger">*</span></label>
                        <input type="date" name="tanggal" class="form-control" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Waktu</label>
                        <input type="text" name="waktu" class="form-control" placeholder="Contoh: 08:00 - Selesai">
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Tempat</label>
                    <input type="text" name="tempat" class="form-control">
                </div>
                <div class="mb-3">
                    <label class="form-label">Deskripsi</label>
                    <textarea name="deskripsi" class="form-control" rows="3"></textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label">Status <span class="text-danger">*</span></label>
                    <select name="status" class="form-select" required>
                        <option value="Akan Datang">Akan Datang</option>
                        <option value="Selesai">Selesai</option>
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Simpan Agenda</button>
            </div>
        </form>
    </div>
</div>

<!-- Modal Import Excel -->
<div class="modal fade" id="modalImport" tabindex="-1" aria-labelledby="modalImportLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="{{ route('admin.agenda.import') }}" method="POST" enctype="multipart/form-data" class="modal-content">
            @csrf
            <div class="modal-header">
                <h5 class="modal-title" id="modalImportLabel">Import Agenda dari File Excel</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="alert alert-light border d-flex align-items-start p-3 mb-3" role="alert">
                    <iconify-icon icon="solar:info-circle-bold-duotone" class="fs-4 text-primary me-2 flex-shrink-0 mt-1"></iconify-icon>
                    <div class="small">
                        <strong class="text-dark">Petunjuk Pengisian:</strong>
                        <ul class="mb-2 ps-3 mt-1 text-muted">
                            <li>Unduh dan gunakan format template resmi agar data terbaca dengan benar.</li>
                            <li>Kolom wajib: <strong>Nama Kegiatan</strong> dan <strong>Tanggal</strong>.</li>
                            <li>Format tanggal: <code>YYYY-MM-DD</code> (contoh: <code>2026-10-25</code>) atau format tanggal Excel.</li>
                            <li>Status dapat diisi <strong>Akan Datang</strong> atau <strong>Selesai</strong>.</li>
                        </ul>
                        <a href="{{ route('admin.agenda.template') }}" class="btn btn-sm btn-outline-success d-inline-flex align-items-center">
                            <iconify-icon icon="solar:file-download-bold-duotone" class="me-1"></iconify-icon>
                            Unduh Template Excel (.xlsx)
                        </a>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="file_excel" class="form-label fw-semibold">Pilih File Excel / CSV <span class="text-danger">*</span></label>
                    <input type="file" name="file" id="file_excel" class="form-control" accept=".xlsx,.xls,.csv" required>
                    <div class="form-text">Format yang didukung: <code>.xlsx</code>, <code>.xls</code>, atau <code>.csv</code> (Maks. 5 MB)</div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-success text-white d-inline-flex align-items-center">
                    <iconify-icon icon="solar:upload-track-bold-duotone" class="me-1"></iconify-icon>
                    Mulai Import Data
                </button>
            </div>
        </form>
    </div>
</div>
@endsection

@push('scripts')
    <script>
        $(function () {
            $('#tabel-agenda').DataTable({
                order: [],                       // pertahankan urutan dari server (tanggal terbaru dulu)
                pageLength: 25,
                columnDefs: [{ orderable: false, targets: -1 }],
                language: {
                    search: 'Cari:',
                    lengthMenu: 'Tampilkan _MENU_ data',
                    info: 'Menampilkan _START_–_END_ dari _TOTAL_ data',
                    infoEmpty: 'Tidak ada data',
                    infoFiltered: '(disaring dari _MAX_ data)',
                    zeroRecords: 'Tidak ada data yang cocok',
                    emptyTable: 'Belum ada agenda. Klik "Tambah Agenda" untuk memulai.',
                    paginate: { first: 'Awal', last: 'Akhir', next: 'Berikutnya', previous: 'Sebelumnya' }
                }
            });
        });
    </script>
@endpush
