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
            <button type="button" class="btn btn-primary d-inline-flex align-items-center" data-bs-toggle="modal" data-bs-target="#modalTambah">
                <iconify-icon icon="solar:add-circle-bold-duotone" class="fs-5 me-1"></iconify-icon> 
                Tambah Agenda
            </button>
        </div>

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
